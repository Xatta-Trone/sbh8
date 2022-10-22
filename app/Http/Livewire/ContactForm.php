<?php

namespace App\Http\Livewire;

use App\Models\Admin\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $isSubmitted = false;


    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        Contact::create(array_merge($this->validate(), []));
        $this->isSubmitted = true;
        $this->fill([
            'name' => '',
            'email' => '',
            'subject' => '',
            'message' => '',
        ]);
    }

    public function reshow()
    {
        $this->isSubmitted = false;
    }



    public function render()
    {
        return view('livewire.contact-form');
    }
}