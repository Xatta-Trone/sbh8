<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="submit">
            <div class="">
                <div class="form-group">
                    <label for="name">Name <span class="badge badge-danger">required</span> </label>
                    <input type="text" class="form-control" id="name"
                        placeholder="Enter administrator name" wire:model="name">
                    @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="admintype">Administrator type <span class="badge badge-danger">required</span></label>
                    <select class="custom-select rounded-0" id="admintype" wire:model="type">
                        <option value="" selected>Select an option</option>
                        <option value="{{ App\Enums\AdministratorType::Provost }}">Provost</option>
                        <option value="{{ App\Enums\AdministratorType::AssistantProvost }}">Assistant Provost</option>
                        <option value="{{ App\Enums\AdministratorType::Staff }}">Staff</option>
                    </select>
                    @error('type')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Designation">Designation <span class="badge badge-danger">required</span></label>
                    <input type="text" class="form-control" id="Designation"
                        placeholder="Enter administrator designation" wire:model="designation">
                    <small id="emailHelp" class="form-text text-muted">Example: Provost, Assistant provost, tresarary,
                        sick boy</small>
                    @error('designation')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="fom-group">

                    <label for="description">Contact information</label>
                    <div>
                        <textarea wire:model="description" class="form-control"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Example: Email:monzurul.ce.buet@gmail.com;
                            Phone: 01521112102</small>
                    </div>

                    @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    @if ($image)
                        Photo Preview:
                        <img src="{{ $image->temporaryUrl() }}" height="250" width="auto">
                    @endif
                    <div>
                        <label for="description">Image (max file size 1MB)</label>
                        <input type="file" wire:model="image" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
                    </div>

                    @error('image')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleSelectRounded0">Publish status <span class="badge badge-danger">required</span></label>
                    <select class="custom-select rounded-0" id="exampleSelectRounded0" wire:model="status">
                        <option value="" selected>Select an option</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublish</option>
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
