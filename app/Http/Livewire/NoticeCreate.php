<?php

namespace App\Http\Livewire;

use App\Enums\NoticeStatus;
use App\Models\Admin\Notice;
use Livewire\Component;

class NoticeCreate extends Component
{
    public $title;
    public $description;
    public $url;
    public $status;



    protected $rules = [
        'title' => 'required',
        'url' => 'required_without:description',
        'description' => 'required_without:url',
        'status' => 'required|integer'
    ];



    public function submit()
    {
        $this->validate();
        Notice::create(array_merge($this->validate(), []));
        flash('Notice created')->success();
        return redirect()->route('admin.notices.index');
    }


    public function render()
    {
        // dd(NoticeStatus::Published);

        return view('livewire.notice-create');
    }
}