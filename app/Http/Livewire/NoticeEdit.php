<?php

namespace App\Http\Livewire;

use App\Models\Admin\Notice;
use Livewire\Component;

class NoticeEdit extends Component
{
    public $title;
    public $description;
    public $url;
    public $status;
    public $noticeId;




    protected function rules()
    {
        return [
            'title' => 'required',
            'url' => 'required_without:description',
            'description' => 'required_without:url',
            'status' => 'required|integer'
        ];
    }

    public function mount($notice)
    {
        $this->title = $notice->title;
        $this->description = $notice->description;
        $this->url = $notice->url;
        $this->status = $notice->status;
        $this->noticeId = $notice->id;
    }



    public function submit()
    {
        $this->validate();
        $user =  Notice::find($this->noticeId)->update($this->validate());
        flash('Notice updated')->success();
        return redirect()->route('admin.notices.index');
    }


    public function render()
    {
        return view('livewire.notice-edit');
    }
}