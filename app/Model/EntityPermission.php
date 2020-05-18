<?php
namespace App\Model;

use ItAces\UnderAdminControl;


class EntityPermission extends \ItAces\ACL\Entities\EntityPermission implements UnderAdminControl
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
            'model' => ['required', 'string', 'max:255'],
            'role' => ['required', 'unique:App\Model\EntityPermission,role,'.$this->getId().',id,model,'.$this->getModel()]
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
