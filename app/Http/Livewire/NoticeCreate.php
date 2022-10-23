<?php

namespace App\Http\Livewire;

use App\Enums\NoticeStatus;
use App\Models\Admin\Notice;
use App\Trait\SummerNoteImageExtract;
use Livewire\Component;

class NoticeCreate extends Component
{
    use SummerNoteImageExtract;


    public $title;
    public $description;
    public $url;
    public $status;
    public $show_in_ns;



    protected $rules = [
        'title' => 'required',
        'url' => 'required_without:description',
        'description' => 'required_without:url',
        'status' => 'required|integer',
        'show_in_ns' => 'required|integer'
    ];



    public function submit()
    {
        $this->validate();
        $formattedDescription  = $this->description ? $this->extractImage($this->description) : $this->description;

        Notice::create(array_merge($this->validate(), ['description' => ($formattedDescription == '<br>' ? null : $formattedDescription)]));
        flash('Notice created')->success();
        return redirect()->route('admin.notices.index');
    }


    public function render()
    {
        // dd(NoticeStatus::Published);

        return view('livewire.notice-create');
    }
}
