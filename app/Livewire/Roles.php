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
    public $new_perms = [];
    
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
        $this->new_perms = $role->permissions()->pluck('id')->toArray();
    }

    function update()
    {
        $this->validate();

        $role = Role::find($this->id);
        $role->name= $this->name;
        $role->save();
        $this->raz();
    }

    function save()
    {
        $this->validate();
        $role = Role::create(['name' => $this->name]);
        $role->permissions()->attach($this->new_perms);
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
        $this->new_perms = [];
    }

    function togglePerm($permission_id)
    {
        if (in_array($permission_id, $this->new_perms)) {
            $key = array_search($permission_id, $this->new_perms);
            array_splice($this->new_perms, $key, 1);
        } else {

            $this->new_perms[] = $permission_id;
        }

    }

    public function render()
    {
        return view('livewire.roles');
    }
}
