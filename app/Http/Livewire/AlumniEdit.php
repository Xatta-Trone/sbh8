<?php

namespace App\Http\Livewire;

use App\Models\Admin\Alumni;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AlumniEdit extends Component
{
    use WithFileUploads;

    public $name;
    public $designation;
    public $image;
    public $description;
    public $status;
    public $fileName = null;
    public $adminId;
    public $oldImage;



    protected $rules = [
        'name' => 'required',
        'designation' => 'sometimes|nullable',
        'image' => 'sometimes|nullable|image|max:1024',
        'description' => 'sometimes|nullable',
        'status' => 'required',
    ];

    public function mount($alumni)
    {
        $this->name = $alumni->name;
        $this->adminId = $alumni->id;
        $this->designation = $alumni->designation;
        $this->oldImage = $alumni->image;
        $this->description = $alumni->description;
        $this->status = $alumni->status;
    }



    public function submit()
    {
        $this->validate();

        // dd($this->validate(), $this->image != null);

        if ($this->image != null) {
            $this->fileName = 'alumni/' . Str::slug($this->name) . '-' . time() . '.' . $this->image->extension();
            $this->image->storeAs('', $this->fileName);
            Storage::delete($this->oldImage);
        } else {
            $this->fileName = $this->oldImage;
        }

        Alumni::find($this->adminId)->update(array_merge($this->validate(), ['image' => $this->fileName]));
        flash('Alumni updated')->success();
        return redirect()->route('admin.alumins.index');
    }

    public function render()
    {
        return view('livewire.alumni-edit');
    }
}