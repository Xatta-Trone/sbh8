<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Enums\ContentType;
use App\Models\Admin\Page;
use Illuminate\Support\Str;

class PageCreate extends Component
{
    public $title;
    public $slug;
    public $content_type;
    public $content;
    public $status;



    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
        'content_type' => 'required',
        'content' => 'required',
        'status' => 'required',
    ];

    public function mount()
    {
        $this->content_type = ContentType::Page;
    }

    public function updatedTitle($value)
    {

        $this->slug = Str::slug($value);
    }



    public function submit()
    {
        $this->validate();

        Page::create(array_merge($this->validate(), []));
        flash('Page created')->success();
        return redirect()->route('admin.pages.index');
    }



    public function render()
    {
        return view('livewire.page-create');
    }
}