<?php
namespace ItAces\ACL\Entities;

use App\Model\Role;
use App\Model\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Illuminate\Support\Facades\Auth;

abstract class EntityPermission
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
     * @var \Carbon\Carbon
     */
    protected $createdAt;
    
    /**
     * @var \Carbon\Carbon|null
     */
    protected $updatedAt;
    
    /**
     * @var \Carbon\Carbon|null
     */
    protected $deletedAt;
    
    /**
     * @var \App\Model\User
     */
    protected $createdBy;
    
    /**
     * @var \App\Model\User
     */
    protected $updatedBy;
    
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

    /**
     * Set createdAt.
     *
     * @param \Carbon\Carbon $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    
    /**
     * Get createdAt.
     *
     * @return \Carbon\Carbon
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Set updatedAt.
     *
     * @param \Carbon\Carbon|null $updatedAt
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }
    
    /**
     * Set createdBy.
     *
     * @param \App\Model\User $createdBy
     */
    public function setCreatedBy(User $createdBy)
    {
        $this->createdBy = $createdBy;
    }
    
    /**
     * Get createdBy.
     *
     * @return \App\Model\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
    
    /**
     *
     * @param \Doctrine\Common\Persistence\Event\LifecycleEventArgs $event
     */
    public function onBeforeAdd(LifecycleEventArgs $event)
    {
        $this->createdAt = now();
        
        if (Auth::id()) {
            $this->createdBy = Auth::user();
        }
        
        $this->validate();
    }
    
    /**
     *
     * @param \Doctrine\Common\Persistence\Event\LifecycleEventArgs $event
     */
    public function onAfterAdd(LifecycleEventArgs $event)
    {
        // Add your code here
    }
    
    /**
     *
     * @param \Doctrine\Common\Persistence\Event\LifecycleEventArgs $event
     */
    public function onBeforeUpdate(LifecycleEventArgs $event)
    {
        $this->updatedAt = now();
        
        if (Auth::id()) {
            $this->updatedBy = Auth::user();
        }
        
        $this->validate();
    }
    
    /**
     *
     * @param \Doctrine\Common\Persistence\Event\LifecycleEventArgs $event
     */
    public function onAfterUpdate(LifecycleEventArgs $event)
    {
        // Add your code here
    }
    
    /**
     *
     * @param \Doctrine\Common\Persistence\Event\LifecycleEventArgs $event
     */
    public function onBeforeDelete(LifecycleEventArgs $event)
    {
        // Add your code here
    }
    
    /**
     *
     * @param \Doctrine\Common\Persistence\Event\LifecycleEventArgs $event
     */
    public function onAfterDelete(LifecycleEventArgs $event)
    {
        // Add your code here
    }
}
