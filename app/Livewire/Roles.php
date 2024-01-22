<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $roles;

    public $id = '';
    #[Rule('required', message: "Ce champs ne peut être vide")]
    public $name = '';
    public $permissions;
    public $listePerms = [];
    public $users;
    
    public bool $updateMode = false;

    function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
        $this->users = User::all();
    }

    function edit($role_id)
    {
        $role = Role::find($role_id);
        $this->updateMode = true;
        $this->name = $role->name;
        $this->id = $role_id;
        $this->listePerms = $role->permissions()->pluck('id')->toArray();
    }

    function cancel()
    {
        $this->updateMode = false;
        $this->listePerms = [];
        $this->name = '';    
    }

    function update()
    {
        $this->validate();

        $role = Role::find($this->id);
        $role->name= $this->name;
        $role->save();
        $permissions = Permission::find($this->listePerms);
        $role->syncPermissions($permissions);
        $this->raz();
    }

    function create()
    {
        $this->validate();
        $role = Role::create(['name' => $this->name]);
        $permissions = Permission::find($this->listePerms);
        $role->givePermissionTo($permissions);
        $this->raz();
    }
    function delete($role_id)
    {
        Role::destroy($role_id);
        $this->raz();
    }

    function raz()
    {
        $this->name = '';
        $this->id = '';
        $this->roles = Role::all();
        $this->updateMode = false;
        $this->permissions = Permission::all();
        $this->listePerms = [];
    }

    function toggleListe($permission_id)
    {
        if (in_array($permission_id, $this->listePerms)) {
            $key = array_search($permission_id, $this->listePerms);
            array_splice($this->listePerms, $key, 1);
        } else {

            $this->listePerms[] = $permission_id;
        }

    }

    public function render()
    {
        return view('livewire.roles');
    }
}
