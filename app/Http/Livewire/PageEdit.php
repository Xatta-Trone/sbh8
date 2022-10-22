<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Page;
use Illuminate\Support\Str;

class PageEdit extends Component
{
    public $title;
    public $slug;
    public $content_type;
    public $content;
    public $status;
    public $pageId;




    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
        'content_type' => 'required',
        'content' => 'required',
        'status' => 'required',
    ];

    public function mount($page)
    {
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->pageId = $page->id;
        $this->content_type = $page->content_type;
        $this->content = $page->content;
        $this->status = $page->status;
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }



    public function submit()
    {
        $this->validate();
        Page::find($this->pageId)->update($this->validate());
        flash('Page updated')->success();
        return redirect()->route('admin.pages.index');
    }


    public function render()
    {
        return view('livewire.page-edit');
    }
}
