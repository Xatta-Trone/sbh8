<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Admin\Alumni;
use App\Trait\SummerNoteImageExtract;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class AlumniCreate extends Component
{
    use WithFileUploads, SummerNoteImageExtract;

    public $name;
    public $designation;
    public $image;
    public $description;
    public $status;
    public $fileName = null;



    protected $rules = [
        'name' => 'required',
        'designation' => 'sometimes|nullable',
        'image' => 'sometimes|nullable|image|max:1024',
        'description' => 'sometimes|nullable',
        'status' => 'required',
    ];



    public function submit()
    {
        $this->validate();

        if ($this->image) {
            $this->fileName = 'alumni/' . Str::slug($this->name) . '-' . time() . '.' . $this->image->extension();
            // $this->image->storeAs('', $this->fileName);
            $public_path = public_path('/uploads/' . $this->fileName);
            $imgFile = Image::make($this->image->getRealPath());
            $imgFile->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path);
        }

        $formattedDescription  = $this->description ? $this->extractImage($this->description) : $this->description;

        Alumni::create(array_merge($this->validate(), ['image' => $this->fileName, 'description' => ($formattedDescription == '<br>' ? null : $formattedDescription)]));
        flash('Alumni created')->success();
        return redirect()->route('admin.alumins.index');
    }


    public function render()
    {
        return view('livewire.alumni-create');
    }
}
