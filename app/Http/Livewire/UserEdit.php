<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UserEdit extends Component
{
    public $postId;
    public $email;
    public $name;


    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->postId),]
        ];
    }

    public function mount($user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->postId = $user->id;
    }



    public function submit()
    {
        $this->validate();
        $user =  User::find($this->postId)->update($this->validate());
        flash('User updated')->success();
        return redirect()->route('admin.users.index');
    }



    public function render()
    {
        return view('livewire.user-edit');
    }
}