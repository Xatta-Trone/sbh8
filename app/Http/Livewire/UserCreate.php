<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\AdminLoginDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $password = Str::random(10);
        $user =  User::create(array_merge($this->validate(), ['password' => Hash::make($password)]));

        $user->password = $password;

        Mail::to($user->email)->send(new AdminLoginDetails($user));
        flash('User created')->success();
        return redirect()->route('admin.users.index');
    }






    public function render()
    {
        return view('livewire.user-create');
    }
}