<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">Only change the contents of this page; other options should not be changed; specially the title and the slug.</div>
    </div>
    <div class="col-md-12">
        <form wire:submit.prevent="submit">
            <div class="">
                <div class="form-group">
                    <label for="name">Page title <span class="badge badge-danger">required</span> </label>
                    <input type="text" class="form-control" id="name" placeholder="Enter page title"
                        wire:model="title">
                    @error('title')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Page slug (auto filled for you)  <span class="badge badge-danger">required</span> </label>
                    <input type="text" class="form-control" id="name" placeholder="Enter page slug"
                        wire:model="slug">
                    @error('slug')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleSelectRounded0">Page type  <span
                            class="badge badge-danger">required</span></label>
                    <select class="custom-select rounded-0" id="exampleSelectRounded0" wire:model="content_type">
                       <option value="" selected>Select an option</option>
                        <option value="{{ App\Enums\ContentType::Page }}">Whole page</option>
                        <option value="{{ App\Enums\ContentType::Content }}">Section of a page</option>
                    </select>
                    @error('content_type')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="fom-group">
                    <label for="content">Content  <span class="badge badge-danger">required</span> </label>
                    <div wire:ignore>
                        <textarea id="summernote" wire:model="content"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Page conent goes here....</small>
                    </div>

                    @error('content')
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
                @this.set('content', contents)
            }, 250);

            // Summernote
            $('#summernote').summernote({
                callbacks: {
                    onChange: function(contents, $editable) {
                        // console.log('onChange:', contents,contents == '<br>');
                        // @this.set('content', contents)
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
