<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\Admin\AlumniData;
use App\Trait\SummerNoteImageExtract;
use Intervention\Image\Facades\Image;

class FrontPageAdminForm extends Component
{
    use WithFileUploads, SummerNoteImageExtract;

    // public AlumniData $alumni;
    public $image;
    public $name;
    public $nick_name;
    public $department;
    public $gender;
    public $status = 2;
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

    public $isSubmitted = false;



    protected $rules = [
        'name' => 'required|string',
        'nick_name' => 'required|string',
        'department' => 'required|string',
        'gender' => 'required|string',
        'graduation_year' => 'required|numeric',
        'exam_session' => 'sometimes|nullable|string',
        'attachment' => 'required|string',
        'email' => 'required|email|unique:alumni_data',
        'birth_date' => 'sometimes|nullable|date',
        'hobby' => 'sometimes|nullable|string',
        'room_no' => 'required_if:attachment,resident',
        'hall_duration' => 'required_if:attachment,resident',
        'mobile_1' => 'required|string',
        'mobile_2' => 'sometimes|nullable|string',
        'occupation' => 'required|string',
        'position' => 'required|string',
        'organization' => 'sometimes|nullable|string',
        'blood_group' => 'sometimes|nullable|string',
        'image' => 'sometimes|nullable|image|max:1024',
        // 'status' => 'required',
        'present_address' => 'required|string',
        'postcode' => 'required|numeric',
    ];

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

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }



    public function submit()
    {

        $this->validate();

        $uniqueId = $this->unique_order_id();

        if ($this->image) {
            $this->fileName = 'alumni-data/' .  $uniqueId . '.' . $this->image->extension();
            // $this->image->storeAs('', $this->fileName);
            $public_path = public_path('/uploads/' . $this->fileName);
            $imgFile = Image::make($this->image->getRealPath());
            // $imgFile->orientate();
            $imgFile->resize(null, 300, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($public_path);
        }

        // set birthdate

        if ($this->birth_date || $this->birth_date != "") {
            $this->birth_date = Carbon::createFromFormat('d-m-Y', $this->birth_date);
        } else {
            $this->birth_date = null;
        }


        // $formattedDescription  = $this->description ? $this->extractImage($this->description) : $this->description;
        // status = 2 means needs approval
        AlumniData::create(array_merge($this->validate(), ['image' => $this->fileName, 'unique_id' => $uniqueId, 'status' => 2, 'birth_date' => $this->birth_date]));

        $this->isSubmitted = true;
    }


    public function render()
    {
        return view('livewire.front-page-admin-form');
    }
}