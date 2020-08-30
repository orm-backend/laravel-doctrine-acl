<?php
namespace VVK\ACL\Entities;

use App\Model\Role;
use VVK\ORM\Entities\BaseEntity;

abstract class EntityPermission extends BaseEntity
{

    /**
     * @var int
     */
    protected $id;
    
    /**
     * 
     * @var integer
     */
    protected $permission;
    
    /**
     * 
     * @var \App\Model\Role
     */
    protected $role;
    
    /**
     * 
     * @var string
     */
    protected $model;
    
    /**
     * @return integer
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @return \App\Model\Role
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
     * @param \App\Model\Role $role
     */
    public function setRole(Role $role)
    {
        $this->role = $role;
    }
    
    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

}
