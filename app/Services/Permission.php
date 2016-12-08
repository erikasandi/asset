<?php

namespace App\Service;

use Spatie\Permission\Models\Permission as PermissionModel;

class Permission
{
    protected $form;
    use DatatableParameters;

    /**
     * Permission constructor.
     */
    public function __construct()
    {
        $this->form = new FormGenerator();
    }

    protected $baseUrl = 'permission';

    public function datatableData()
    {
        $permissions = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($permissions))
            ->addActions($actions)
            ->generate();
    }

    public function all()
    {
        return PermissionModel::all();
    }

    public function store(array $inputs)
    {
        PermissionModel::create([
            'name' => $inputs['name']
        ]);
    }

    public function destroy($id)
    {
        PermissionModel::destroy($id);
    }

    public function getPermissionById($id)
    {
        return PermissionModel::find($id);
    }

    public function update($id, array $inputs)
    {
        $permission = PermissionModel::find($id);
        $permission->name = $inputs['name'];
        $permission->save();
    }

    public function getPermissions()
    {
        return PermissionModel::all();
    }

    public function permissionSelect($name, $defaultValue = null)
    {
        $permissions = $this->getPermissions();
        $fields = [
            'id' => 'name',
            'value' => 'name'
        ];
        if (!is_null($defaultValue)) {
            $fields['selected'] = $defaultValue;
        }
        return $this->form->dbSelect($permissions, $name, $fields, ['class' => 'form-control']);
    }
}