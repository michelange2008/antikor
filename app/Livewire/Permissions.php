<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    public $permissions;
    public $id = '';
    #[Rule('required', message: "Ce champs ne peut être vide")]
    public $name = '';
    public bool $updateMode = false;

    function mount()
    {
        $this->permissions = Permission::all();    
    }

    function edit($permission_id)
    {
        $permission = Permission::find($permission_id);
        $this->updateMode = true;
        $this->name = $permission->name;
        $this->id = $permission_id;
    }

    function update()
    {
        $this->validate();

        $permission = Permission::find($this->id);
        $permission->name= $this->name;
        $permission->save();
        $this->raz();
    }

    function save()
    {
        $this->validate();
        Permission::create(['name' => $this->name]);
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
    }

    public function render()
    {
        return view('livewire.permissions');
    }
}
