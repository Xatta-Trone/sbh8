<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Admin\Administrator;

class AdministratorCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $designation;
    public $type;
    public $image;
    public $description;
    public $status;
    public $fileName = null;



    protected $rules = [
        'name' => 'required',
        'designation' => 'required',
        'type' => 'required',
        'image' => 'sometimes|nullable|image|max:1024',
        'description' => 'sometimes|nullable',
        'status' => 'required',
    ];



    public function submit()
    {
        $this->validate();

        if ($this->image) {
            $this->fileName = 'photos/' . Str::slug($this->name) . '-' . time() . '.' . $this->image->extension();
            $this->image->storeAs('', $this->fileName);
        }

        Administrator::create(array_merge($this->validate(), ['image' => $this->fileName]));
        flash('Administrator created')->success();
        return redirect()->route('admin.administrator.index');
    }


    public function render()
    {
        return view('livewire.administrator-create');
    }
}