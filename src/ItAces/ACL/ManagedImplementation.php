<?php
namespace ItAces\ACL;

use App\Model\EntityPermission;
use Doctrine\DBAL\Connection;

/**
 * This is an implementation of Access Control interface with storing permissions in a database.
 *
 * @author Vitaliy Kovalenko vvk@kola.cloud
 *
 */
class ManagedImplementation extends DefaultImplementation
{

    /**
     * Gets user permissions as bitmask for given entity
     * 
     * @param string $classUrlName
     * @param int $userId
     * @return int
     */
    protected function getEntityPermissions(string $classUrlName, int $userId = null) : int
    {
        $permissions = 0;
        $ids = [];
        $roles = $this->getUserRoles($userId);

        if (!$roles) {
            return 0;
        }
        
        foreach ($roles as $role) {
            $ids[] = $role->getId();
        }

        /**
         * We select user permissions for all entities with one query and cache them.
         * 
         * @var \Doctrine\ORM\Query $query
         */
        $query = $this->em->createQueryBuilder()
            ->select('e')
            ->from(EntityPermission::class, 'e')
            //->where('e.model = :model')
            ->where('e.role IN (:ids)')
            //->setParameter('model', $classUrlName)
            ->setParameter('ids', $ids, Connection::PARAM_INT_ARRAY)
            ->getQuery()
            ->setCacheable( config('itaces.caches.enabled', true) );
        
        /**
         *
         * @var \App\Model\EntityPermission[] $entityPermissions
         */
        $entityPermissions = $query->getResult();
        
        foreach ($entityPermissions as $entityPermission) {
            if ($entityPermission->getModel() == $classUrlName) {
                $permissions = $permissions | $entityPermission->getPermission();
                break;
            }
        }
        
        return $permissions;
    }

}
