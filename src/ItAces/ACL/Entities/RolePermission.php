<?php
namespace ItAces\ACL\Entities;

use ItAces\ORM\Entities\EntityBase;
use ItAces\ORM\Entities\Role;

abstract class RolePermission extends EntityBase
{
    
    /**
     * 
     * @var integer
     */
    protected $permission;
    
    /**
     * 
     * @var \ItAces\ORM\Entities\Role
     */
    protected $role;
    
    /**
     * @return integer
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @return \ItAces\ORM\Entities\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param integer $permission
     */
    public function setPermission(int $permission)
    {
        $this->permission = $permission;
    }

    /**
     * @param \ItAces\ORM\Entities\Role $role
     */
    public function setRole(Role $role)
    {
        $this->role = $role;
    }

}
