<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Admin\Administrator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdministratorEdit extends Component
{
    use WithFileUploads;

    public $name;
    public $designation;
    public $type;
    public $image;
    public $description;
    public $status;
    public $fileName = null;
    public $adminId;
    public $oldImage;



    protected $rules = [
        'name' => 'required',
        'designation' => 'required',
        'type' => 'required',
        'image' => 'sometimes|nullable|image|max:1024',
        'description' => 'sometimes|nullable',
        'status' => 'required',
    ];

    public function mount($administrator)
    {
        $this->name = $administrator->name;
        $this->adminId = $administrator->id;
        $this->designation = $administrator->designation;
        $this->type = $administrator->type;
        $this->oldImage = $administrator->image;
        $this->description = $administrator->description;
        $this->status = $administrator->status;
    }



    public function submit()
    {
        $this->validate();

        // dd($this->validate(), $this->image != null);

        if ($this->image != null) {
            $this->fileName = 'photos/' . Str::slug($this->name) . '-' . time() . '.' . $this->image->extension();
            // $this->image->storeAs('', $this->fileName);
            $public_path = public_path('/uploads/' . $this->fileName);
            $imgFile = Image::make($this->image->getRealPath());
            $imgFile->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path);
            Storage::delete($this->oldImage);
        } else {
            $this->fileName = $this->oldImage;
        }

        Administrator::find($this->adminId)->update(array_merge($this->validate(), ['image' => $this->fileName]));
        flash('Administrator updated')->success();
        return redirect()->route('admin.administrator.index');
    }


    public function render()
    {
        return view('livewire.administrator-edit');
    }
}
