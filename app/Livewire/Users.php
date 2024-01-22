<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public $users;
    public $roles;
    public User $user;

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $rolesUser = [];

    public $updateMode = false;

    function mount()
    {
        $this->users = User::all();    
        $this->roles = Role::all();
    }

    function edit(User $user)
    {
        $this->user = $user;
        $this->updateMode = true;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->rolesUser = $user->roles->pluck('id')->toArray();
    }
    
    function create()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $newUser = new User();
        $newUser->name = $this->name;
        $newUser->email = $this->email;
        $newUser->password = Hash::make($this->password);
        $newUser->save();
        $roles = Role::find($this->rolesUser);
        $newUser->roles()->attach($roles);    
        $this->maj();
    }

    function update()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        User::where('id', $this->user->id)
            ->update(['name' => $this->name]); 

        $this->user->roles()->sync($this->rolesUser);
        
        $this->maj();
    }

    function cancel()
    {
        $this->maj();    
    }

    function delete($user_id)
    {
            User::destroy($user_id);
            $this->maj();
    }

    function toggleListe($id)
    {
        if (in_array($id, $this->rolesUser)) {
            array_splice($this->rolesUser, array_search($id, $this->rolesUser), 1);
        } else {
            array_push($this->rolesUser, $id);
        }
            
    }

    function maj()
    {
        $this->name='';
        $this->email = '';
        $this->updateMode = false;
        $this->rolesUser = [];    
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.users');
    }
}
