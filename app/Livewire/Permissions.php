<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{
    public $permissions;

    public $id = '';
    #[Rule('required', message: "Ce champs ne peut être vide")]
    public $name = '';
    public $roles;
    public $listeRoles = [];

    public bool $updateMode = false;

    function mount()
    {
        $this->permissions = Permission::all();
        $this->roles = Role::all();
    }

    function edit($permission_id)
    {
        $permission = Permission::find($permission_id);
        $this->updateMode = true;
        $this->name = $permission->name;
        $this->id = $permission_id;
        $this->listeRoles = $permission->roles()->pluck('id')->toArray();
    }

    function cancel()
    {
        $this->updateMode = false;
        $this->listeRoles = [];
    }

    function update()
    {
        $this->validate();

        $permission = Permission::find($this->id);
        $permission->name = $this->name;
        $permission->save();
        $permission->roles()->sync($this->listeRoles);
        $this->raz();
    }

    function create()
    {
        $this->validate();
        $permission = Permission::create(['name' => $this->name]);
        $permission->roles()->attach($this->listeRoles);
        $this->raz();
    }
    function delete($permission_id)
    {
        Permission::destroy($permission_id);
        $this->raz();
    }

    function raz()
    {
        $this->name = '';
        $this->id = '';
        $this->permissions = Permission::all();
        $this->updateMode = false;
        $this->listeRoles = [];
    }

    function toggleListe($role_id)
    {
        if (in_array($role_id, $this->listeRoles)) {
            $key = array_search($role_id, $this->listeRoles);
            array_splice($this->listeRoles, $key, 1);
        } else {

            $this->listeRoles[] = $role_id;
        }
    }

    public function render()
    {
        return view('livewire.permissions');
    }
}
