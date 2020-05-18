<?php
namespace App\Model;

use ItAces\UnderAdminControl;


class RolePermission extends \ItAces\ACL\Entities\RolePermission implements UnderAdminControl
{
    /**
     *
     * {@inheritDoc}
     * @see \ItAces\ORM\Entities\EntityBase::getModelValidationRules()
     */
    public function getModelValidationRules()
    {
        return [
            'permission' => ['required', 'integer', 'min:1'],
            'role' => ['required', 'unique:App\Model\RolePermission,role_id,'.$this->getId()]
        ];
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \ItAces\ORM\Entities\EntityBase::getRequestValidationRules()
     */
    static public function getRequestValidationRules()
    {
        return [
            'role' => ['sometimes', 'required', 'integer', 'min:1', 'exists:App\Model\Role,id'],
        ];
    }

}
