<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="submit">
            <div class="">
                <div class="form-group">
                    <label for="exampleInputEmailName">Title   <span class="badge badge-danger">required</span> </label>
                    <input type="text" class="form-control" id="exampleInputEmailName" placeholder="Enter notice title"
                        wire:model="title">
                    @error('title')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="alert alert-info alert-sm">At least one of the<span class="badge badge-light"> Google Drive
                        link </span> or <span class="badge badge-light"> Additional information </span> field should be
                    filled.</div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Google Drive link</label>
                    <input type="url" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter Google Drive url" wire:model="url">
                    @error('url')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="fom-group">

                    <label for="description">Additional information (optional if google drive link is given)</label>
                    <div wire:ignore>
                        <textarea id="summernote" wire:model="description"></textarea>
                    </div>

                    @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleSelectRounded0">Publish status   <span class="badge badge-danger">required</span> </label>
                    <select class="custom-select rounded-0" id="exampleSelectRounded0" wire:model="status">
                        <option value="" selected>Select an option</option>
                        <option value="{{ App\Enums\NoticeStatus::Published }}">Published</option>
                        <option value="{{ App\Enums\NoticeStatus::Unpublished }}">Unpublish</option>
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

            // Summernote
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
