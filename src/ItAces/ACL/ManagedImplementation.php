<?php
namespace ItAces\ACL;

use App\Model\EntityPermission;
use App\Model\Role;
use App\Model\RolePermission;
use App\Model\User;
use Doctrine\ORM\NoResultException;
use ItAces\Repositories\Repository;

/**
 * This is an implementation of Access Control interface with storing permissions in a database.
 *
 * @author Vitaliy Kovalenko vvk@kola.cloud
 *
 */
class ManagedImplementation extends DefaultImplementation
{
    
    /**
     * 
     * @var \ItAces\Repositories\Repository
     */
    protected $repository;
    
    /**
     * 
     * @param \ItAces\Repositories\Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Gets default user permissions as bitmask
     * 
     * @param int $userId
     * @return int
     */
    protected function getDefaultPermissions(int $userId = null) : int
    {
        $roles = $this->getUserRoles($userId);
        
        if (!$roles) {
            return config('itaces.perms.forbidden');
        }

        $alias = 'rolePermission';
        $permissions = $this->repository->getQuery(RolePermission::class, [
            'filter' => [
                [$alias.'.role', 'in', $roles]
            ]
        ], $alias)->getArrayResult();
        
        $permissions = array_column($permissions, 'permission');

        return $permissions ? array_sum($permissions) : config('itaces.perms.forbidden');
    }

    /**
     * Gets user permissions as bitmask for given entity
     * 
     * @param string $classUrlName
     * @param int $userId
     * @return int
     */
    protected function getEntityPermissions(string $classUrlName, int $userId = null) : int
    {
        $roles = $this->getUserRoles($userId);
        
        if (!$roles) {
            return 0;
        }
        
        $alias = 'entityPermission';
        $permissions = $this->repository->getQuery(EntityPermission::class, [
            'filter' => [
                [$alias.'.model', 'eq', $classUrlName],
                [$alias.'.role', 'in', $roles]
            ]
        ], $alias)->getResult();
        
        $permissions = array_column($permissions, 'permission');
        
        return $permissions ? array_sum($permissions) : 0;
    }

    private function getUserRoles(int $userId = null) : array
    {
        $roles = [];
        
        if (!$userId) {
            $alias = 'role';
            
            try {
                $guestRole = $this->repository->getQuery(Role::class, [
                    'filter' => [
                        [$alias.'code', 'eq', config('itaces.groups.guests', 'guests')]
                    ]
                ], $alias)->getSingleResult();
                
                $roles[] = $guestRole;
            } catch (NoResultException $e) {
            }
        } else {
            /**
             *
             * @var \App\Model\User $user
             */
            $user = $this->repository->findOrFail(User::class, $userId);
            $roles = array_column($user->getRoles()->getValues(), 'id');
        }
        
        return $roles;
    }

}
