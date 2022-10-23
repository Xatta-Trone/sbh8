<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Admin\Slider;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SliderEdit extends Component
{
    use WithFileUploads;

    public $header_text;
    public $content_text;
    public $url;
    public $image = null;
    public $status;
    public $fileName = null;
    public $oldImage = null;
    public $fileId;



    protected $rules = [
        'header_text' => 'sometimes|nullable|max:255',
        'content_text' => 'sometimes|nullable|max:500',
        'image' => 'sometimes|nullable|image|max:1024',
        'url' => 'sometimes|nullable',
        'status' => 'required',
    ];

    public function mount($slider)
    {
        $this->header_text = $slider->header_text;
        $this->content_text = $slider->content_text;
        $this->url = $slider->url;
        $this->oldImage = $slider->image;
        $this->status = $slider->status;
        $this->fileId = $slider->id;
    }



    public function submit()
    {
        if ($this->image != null) {
            $this->fileName = 'sliders/' . Str::random(12)  . '-' . time() . '.' . $this->image->extension();
            // $this->image->storeAs('', $this->fileName);
            $public_path = public_path('/uploads/' . $this->fileName);
            $imgFile = Image::make($this->image->getRealPath());
            $imgFile->resize(null, 760, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path);
            Storage::delete($this->oldImage);
        } else {
            $this->fileName = $this->oldImage;
        }

        Slider::find($this->fileId)->update(array_merge($this->validate(), ['image' => $this->fileName]));
        flash('Slider updated')->success();
        return redirect()->route('admin.sliders.index');
    }

    public function render()
    {
        return view('livewire.slider-edit');
    }
}