<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="submit">
            <div class="">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span class="badge badge-danger">required</span> </label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                wire:model.lazy="name">
                            @error('name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nick_name">Nick name <span class="badge badge-danger">required</span> </label>
                            <input type="text" class="form-control" id="nick_name" placeholder="Enter nickName"
                                wire:model.lazy="nick_name">
                            @error('nick_name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Department <span
                                    class="badge badge-danger">required</span></label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0" wire:model="department">
                                <option value="" selected="">Select Dept.</option>
                                <option value="ARCH">Architecture</option>
                                <option value="BME">Bio Medical Engineering</option>
                                <option value="CE">Civil Engineering</option>
                                <option value="CHE">Chemical Engineering</option>
                                <option value="CSE">Computer Science &amp; Engineering</option>
                                <option value="EEE">Electrical &amp; Electronics Engineering</option>
                                <option value="IPE">Industrial &amp; Production Engineering</option>
                                <option value="ME">Mechanical Engineering</option>
                                <option value="MME">Materials &amp; Metallurgical Engineering</option>
                                <option value="NAME">Naval Architect &amp; Marine Engineering</option>
                                <option value="URP">Urban &amp; Regional Planning</option>
                                <option value="WRE">Water Resources Engineering</option>
                                <option value="OTHER">Not in the list here</option>
                            </select>
                            @error('department')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Gender<span
                                    class="badge badge-danger">required</span></label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0" wire:model="gender">
                                <option value="" selected="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Graduation year <span class="badge badge-danger">required</span>
                            </label>
                            <input type="text" class="form-control" id="name"
                                placeholder="Enter Graduation year" wire:model.lazy="graduation_year">
                            @error('graduation_year')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Exam session</label>
                            <input type="text" class="form-control" id="nickName" placeholder="Enter exam_session"
                                wire:model.lazy="exam_session">
                            @error('exam_session')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="attachment">Attachment <span class="badge badge-danger">required</span></label>
                            <select class="custom-select rounded-0" id="attachment" wire:model="attachment">
                                <option value="" selected="">Select option</option>
                                <option value="resident">Resident</option>
                                <option value="attached">Attached</option>
                            </select>
                            @error('attachment')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nickemail">Email <span class="badge badge-danger">required</span></label>
                            <input type="email" class="form-control" id="nickemail"
                                placeholder="Enter email address" wire:model.lazy="email">
                            @error('email')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="room_no">Room no <span class="badge badge-info">required if resident</span>
                            </label>
                            <input type="text" class="form-control" id="room_no"
                                placeholder="Enter administrator room_no" wire:model.lazy="room_no">
                            @error('room_no')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hall_duration">Hall duration <span class="badge badge-info">required if
                                    resident</span> </label>
                            <input type="text" class="form-control" id="hall_duration"
                                placeholder="Enter administrator hall_duration" wire:model.lazy="hall_duration">
                            @error('hall_duration')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="attachment">Birth Date (dd-mm-yyyy) </label>
                            <input type="text" wire:ignore wire.model="birth_date" class="form-control"
                                id="datemask" data-inputmask-alias="datetime"
                                data-inputmask-inputformat="dd-mm-yyyy" data-mask value="{{ $birth_date }}" />
                            @error('birth_date')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hobby">Hobby </label>
                            <input type="text" class="form-control" id="hobby" placeholder="Enter hobby"
                                wire:model.lazy="hobby">
                            @error('hobby')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                 <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="present_address">Present address <span class="badge badge-danger">required</span>
                            </label>
                            <input type="text" class="form-control" id="present_address"
                                placeholder="Enter present address" wire:model.lazy="present_address">
                            @error('present_address')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="postcode">Post Code <span class="badge badge-danger">required</span>
                            </label></label>
                            <input type="text" class="form-control" id="postcode" placeholder="Enter postcode"
                                wire:model.lazy="postcode">
                            @error('postcode')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>



                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile_1">Phone number <span class="badge badge-danger">required</span>
                            </label></label>
                            <input type="text" class="form-control" id="mobile_1" placeholder="Enter mobile_1"
                                wire:model.lazy="mobile_1">
                            @error('mobile_1')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="mobile_2">Phone number 2 </label>
                            <input type="text" class="form-control" id="mobile_2" placeholder="Enter mobile_2"
                                wire:model.lazy="mobile_2">
                            @error('mobile_2')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="occupation">Occupation (last position if retired) <span class="badge badge-danger">required</span>
                            </label></label>
                            <input type="text" class="form-control" id="occupation" placeholder="Enter occupation"
                                wire:model.lazy="occupation">
                            @error('occupation')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="position">Position <span class="badge badge-danger">required</span> </label>
                            <input type="text" class="form-control" id="position" placeholder="Enter position"
                                wire:model.lazy="position">
                            @error('position')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-row">
                     <div class="col-md-6">
                         <div class="form-group">
                            <label for="organization">Organization </label>
                            <input type="text" class="form-control" id="organization" placeholder="Enter organization"
                                wire:model.lazy="organization">
                            @error('organization')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="attachment">Blood group</label>
                            <select class="custom-select rounded-0" id="attachment" wire:model="blood_group">
                                <option value="" selected="">Select Blood group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                            @error('blood_group')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>



                <div class="form-group">

                    <div class="row">
                        @if ($image)
                            <div class="col-md-6">
                                New photo:
                                <img src="{{ $image->temporaryUrl() }}" height="250" width="auto">
                            </div>
                        @endif

                        @if ($oldImage)
                            <div class="col-md-6">
                                Old photo:
                                <img src="{{ url("uploads/$oldImage") }}" height="250" width="auto">
                            </div>
                        @endif

                    </div>




                    <div>
                        <label for="description">Image (max file size 1MB)</label>
                        <input type="file" wire:model="image" class="form-control"
                            accept="image/png,image/jpeg, image/jpg">
                        <small class="text-danger">Please wait until you see the image here.</small>
                    </div>

                    @error('image')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelectRounded0">Publish status <span
                            class="badge badge-danger">required</span></label>
                    <select class="custom-select rounded-0" id="exampleSelectRounded0" wire:model="status">
                        <option value="" selected>Select an option</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublish</option>
                        <option value="2">Pending approval</option>
                    </select>
                    @error('status')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>

</div>
@push('scripts')
    <script src="{{ asset('admin_assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        $(function() {

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd-mm/-yyyy', {
                'placeholder': 'dd-mm-yyyy'
            });

            $('#datemask').on('change keyup blur mouseleave', function(e) {
                console.log(e.target.value);
                @this.set('birth_date', e.target.value)
            });




        });
    </script>
@endpush
