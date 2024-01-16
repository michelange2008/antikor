<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $roles;
    public $id = '';
    #[Rule('required', message: "Ce champs ne peut être vide")]
    public $name = '';
    public bool $updateMode = false;

    function mount()
    {
        $this->roles = Role::all();
    }

    function edit($role_id)
    {
        $role = Role::find($role_id);
        $this->updateMode = true;
        $this->name = $role->name;
        $this->id = $role_id;
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
        Role::create(['name' => $this->name]);
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
    }

    public function render()
    {
        return view('livewire.roles');
    }
}
