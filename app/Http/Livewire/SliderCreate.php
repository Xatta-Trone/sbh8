<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Admin\Slider;
use Livewire\WithFileUploads;

class SliderCreate extends Component
{
    use WithFileUploads;

    public $header_text;
    public $content_text;
    public $url;
    public $image;
    public $status;
    public $fileName = null;



    protected $rules = [
        'header_text' => 'sometimes|nullable|max:255',
        'content_text' => 'sometimes|nullable|max:500',
        'image' => 'required|image|max:1024',
        'url' => 'sometimes|nullable',
        'status' => 'required',
    ];



    public function submit()
    {
        $this->validate();
        if ($this->image) {
            $this->fileName = 'sliders/' . Str::random(12) . '-' . time() . '.' . $this->image->extension();
            $this->image->storeAs('', $this->fileName);
        }

        Slider::create(array_merge($this->validate(), ['image' => $this->fileName]));
        flash('Slider created')->success();
        return redirect()->route('admin.sliders.index');
    }


    public function render()
    {
        return view('livewire.slider-create');
    }
}
