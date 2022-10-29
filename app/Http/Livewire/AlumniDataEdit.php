<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Admin\AlumniData;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class AlumniDataEdit extends Component
{
    use WithFileUploads;
    public $image;
    public $name;
    public $nick_name;
    public $department;
    public $gender;
    public $status;
    public $graduation_year;
    public $exam_session;
    public $attachment;
    public $room_no;
    public $hall_duration;
    public $email;
    public $birth_date;
    public $hobby;
    public $present_address;
    public $postcode;
    public $mobile_1;
    public $mobile_2;
    public $occupation;
    public $position;
    public $organization;
    public $blood_group;
    public $fileName = null;
    public $alumniId;
    public $oldImage = null;
    public $uniqueId = null;


    protected function rules()
    {
        return [
            'name' => 'required|string',
            'nick_name' => 'required|string',
            'department' => 'required|string',
            'gender' => 'required|string',
            'graduation_year' => 'required|numeric',
            'exam_session' => 'sometimes|nullable|string',
            'attachment' => 'required|string',
            'birth_date' => 'sometimes|nullable|date',
            'hobby' => 'sometimes|nullable|string',
            'room_no' => 'sometimes|nullable|string',
            'hall_duration' => 'sometimes|nullable|string',
            'mobile_1' => 'required|string',
            'mobile_2' => 'sometimes|nullable|string',
            'occupation' => 'required|string',
            'position' => 'required|string',
            'organization' => 'sometimes|nullable|string',
            'blood_group' => 'sometimes|nullable|string',
            'image' => 'sometimes|nullable|image|max:1024',
            'status' => 'required',
            'present_address' => 'required|string',
            'postcode' => 'required|numeric',
            'email' => ['required', 'email', Rule::unique('alumni_data')->ignore($this->alumniId),]
        ];
    }

    public function mount($alumni)
    {
        $this->name = $alumni->name;
        $this->email = $alumni->email;
        $this->alumniId = $alumni->id;
        $this->nick_name = $alumni->nick_name;
        $this->department = $alumni->department;
        $this->gender = $alumni->gender;
        $this->graduation_year = $alumni->graduation_year;
        $this->exam_session = $alumni->exam_session;
        $this->attachment = $alumni->attachment;
        $this->birth_date = $alumni->birth_date;
        $this->hobby = $alumni->hobby;
        $this->room_no = $alumni->room_no;
        $this->hall_duration = $alumni->hall_duration;
        $this->mobile_1 = $alumni->mobile_1;
        $this->mobile_2 = $alumni->mobile_2;
        $this->occupation = $alumni->occupation;
        $this->position = $alumni->position;
        $this->organization = $alumni->organization;
        $this->blood_group = $alumni->blood_group;
        $this->oldImage = $alumni->image;
        $this->status = $alumni->status;
        $this->present_address = $alumni->present_address;
        $this->postcode = $alumni->postcode;
        $this->email = $alumni->email;
        $this->uniqueId = $alumni->unique_id;
    }

    public function unique_order_id()
    {
        $prefix = 'SBH';
        $rand = strtoupper(substr(uniqid(sha1(time())), 0, 8));
        //return $temp = $prefix.$rand;
        //generates the order id
        $tr_code = $prefix . $rand;
        //$tr_code = 'SBH9BCE6C48';
        //check the order id with existing order ids
        $registration_form = AlumniData::where('unique_id', $tr_code)->count();
        //return $tr_code.' '.$results;
        // run the loop again if the order id matches with database otherwise just return the order id just created
        // $results > 0 ? 'Found' : 'Not found'
        if ($registration_form > 0) {
            $this->unique_order_id();
        }
        return $tr_code;
    }


    public function submit()
    {
        $this->validate();

        // dd($this->validate());

        if ($this->image) {
            if ($this->oldImage) {
                Storage::delete($this->oldImage);
            }

            $this->fileName = 'alumni-data/' .  $this->uniqueId . '.' . $this->image->extension();
            // $this->image->storeAs('', $this->fileName);
            $public_path = public_path('/uploads/' . $this->fileName);
            $imgFile = Image::make($this->image->getRealPath());
            $imgFile->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path);
        } else {
            $this->fileName = $this->oldImage;
        }

        // $formattedDescription  = $this->description ? $this->extractImage($this->description, $this->oldDescription) : $this->description;

        AlumniData::find($this->alumniId)->update(array_merge($this->validate(), ['image' => $this->fileName,]));
        flash('Alumni updated')->success();
        return redirect()->route('admin.alumni-data.index');
    }




    public function render()
    {
        return view('livewire.alumni-data-edit');
    }
}