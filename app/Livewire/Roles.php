<?php

namespace App\Livewire;

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
    
    public bool $updateMode = false;

    function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    function edit($role_id)
    {
        $role = Role::find($role_id);
        $this->updateMode = true;
        $this->name = $role->name;
        $this->id = $role_id;
        $this->listePerms = $role->permissions()->pluck('id')->toArray();
    }

    function update()
    {
        $this->validate();

        $role = Role::find($this->id);
        $role->name= $this->name;
        $role->save();
        $role->permissions()->sync($this->listePerms);
        $this->raz();
    }

    function create()
    {
        $this->validate();
        $role = Role::create(['name' => $this->name]);
        $role->permissions()->attach($this->listePerms);
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

    function togglePerm($permission_id)
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
