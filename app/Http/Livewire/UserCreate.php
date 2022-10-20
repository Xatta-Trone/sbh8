<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{

    public $name;
    public $email;



    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users',
    ];



    public function submit()
    {
        $this->validate();

        // password
        $password = 'secret';
        $user =  User::create(array_merge($this->validate(), ['password' => Hash::make($password)]));
        flash('User created')->success();
        return redirect()->route('admin.users.index');
    }






    public function render()
    {
        return view('livewire.user-create');
    }
}