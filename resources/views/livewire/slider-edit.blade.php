<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="submit">
            <div class="">

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
                                Current photo:
                                <img src="{{ url("uploads/$oldImage") }}" height="250" width="auto">
                            </div>
                        @endif

                    </div>

                    <div>
                        <label for="description">Image (max file size 1MB) <span
                                class="badge badge-danger">required</span></label>
                        <input type="file" wire:model="image" class="form-control"
                            accept="image/png, image/jpeg, image/jpg">
                        <small>The image will be converted to standard size after upload</small>
                    </div>

                    @error('image')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="name">Header text </label>
                    <input type="text" class="form-control" id="name" placeholder="Enter header text"
                        wire:model="header_text">
                    @error('header_text')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="fom-group">
                    <label for="description">Content description</label>
                    <div>
                        <textarea wire:model="content_text" class="form-control" rows="8"></textarea>
                    </div>

                    @error('content_text')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="url" class="form-control" id="url" placeholder="Enter url" wire:model="url">
                    @error('url')
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
                    </select>
                    @error('status')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

        <div class="col-md-12 mt-2">
            <img src="{{ url('uploads/slider-example.png') }}" alt="Slider exmple" height="500">
        </div>


    </div>

</div>
