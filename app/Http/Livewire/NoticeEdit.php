<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Notice;
use App\Trait\SummerNoteImageExtract;

class NoticeEdit extends Component
{
    use SummerNoteImageExtract;

    public $title;
    public $description;
    public $url;
    public $status;
    public $noticeId;
    public $show_in_ns;




    protected function rules()
    {
        return [
            'title' => 'required',
            'url' => 'required_without:description',
            'description' => 'required_without:url',
            'status' => 'required|integer',
            'show_in_ns' => 'required|integer'
        ];
    }

    public function mount($notice)
    {
        $this->title = $notice->title;
        $this->description = $notice->description;
        $this->url = $notice->url;
        $this->status = $notice->status;
        $this->show_in_ns = $notice->show_in_ns;
        $this->noticeId = $notice->id;
    }



    public function submit()
    {
        $this->validate();
        // $formattedDescription  = $this->description ? $this->extractImage($this->description) : $this->description;
        $user =  Notice::find($this->noticeId)->update(array_merge($this->validate(), []));
        flash('Notice updated')->success();
        return redirect()->route('admin.notices.index');
    }


    public function render()
    {
        return view('livewire.notice-edit');
    }
}
