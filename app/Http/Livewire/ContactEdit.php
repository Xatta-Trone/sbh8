<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\ContactReply;
use App\Models\Admin\Contact;
use Illuminate\Support\Facades\Mail;

class ContactEdit extends Component
{
    public Contact $contact;

    public $subject;
    public $message;




    protected $rules = [
        'subject' => 'required',
        'message' => 'required',
    ];

    public function mount($contact)
    {
        $this->contact = $contact;
        $this->subject = "Response to - " . $contact->subject;
    }



    public function submit()
    {
        $this->validate();


        Contact::find($this->contact->id)->update(['is_replied' => true]);

        Mail::to($this->contact->email)->send(new ContactReply($this->subject, $this->message));
        flash('Response sent')->success();
        return redirect()->route('admin.contacts.index');
    }

    public function render()
    {
        return view('livewire.contact-edit');
    }
}