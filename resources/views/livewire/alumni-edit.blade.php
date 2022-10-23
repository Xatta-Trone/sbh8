<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="submit">
            <div class="">
                <div class="form-group">
                    <label for="name">Name <span class="badge badge-danger">required</span> </label>
                    <input type="text" class="form-control" id="name" placeholder="Enter administrator name"
                        wire:model="name">
                    @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="Designation">Designation</label>
                    <input type="text" class="form-control" id="Designation"
                        placeholder="Enter administrator designation" wire:model="designation">
                    <small id="emailHelp" class="form-text text-muted">Example: CEO of a company</small>
                    @error('designation')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="fom-group">

                    <label for="description">Detail information</label>
                    <div wire:ignore>
                        <textarea id="summernote" wire:model="description"></textarea>
                        <small id="emailHelp" class="form-text text-muted">More details about the alumni....</small>
                    </div>

                    @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
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
    <script>
        function debounce(func, timeout = 300) {
            let timer;
            return (...args) => {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    func.apply(this, args);
                }, timeout);
            };
        }


        $(function() {
            var deb = debounce(function(contents) {
                @this.set('description', contents)
            }, 250);


            $('#summernote').summernote({
                callbacks: {
                    onChange: function(contents, $editable) {
                        // console.log('onChange:', contents,contents == '<br>');
                        // @this.set('description', contents)
                        const content = contents == '<br>' ? null : contents;
                        // console.log(content)
                        deb(content);
                    },
                    onInit: function() {
                        console.log('Summernote is launched');
                    }
                }
            });
        });
    </script>
@endpush
