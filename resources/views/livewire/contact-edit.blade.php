<div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"> <span class="btn btn-info btn-sm">Name</span> {{ $contact->name }}</li>
        <li class="list-group-item"> <span class="btn btn-info btn-sm">Email</span> {{ $contact->email }}</li>
        <li class="list-group-item"> <span class="btn btn-info btn-sm">Subject</span> {{ $contact->subject }}</li>
        <li class="list-group-item"> <span class="btn btn-info btn-sm">Replied</span>
            {{ $contact->is_replied ? 'Yes' : 'No' }}</li>
        <li class="list-group-item"> <span class="btn btn-info btn-sm">Message</span>
            <pre>{{ $contact->message }}</pre>
        </li>
    </ul>


    <div class="card p-4">
        <h4>Reply</h4>
        <form wire:submit.prevent="submit">
            <div class="">
                <div class="form-group">
                    <label for="subject">Subject <span class="badge badge-danger">required</span> </label>
                    <input type="text" class="form-control" id="name" placeholder="Enter reply subject"
                        wire:model="subject">
                    @error('subject')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="fom-group">
                    <label for="message">Email body <span class="badge badge-danger">required</span></label>
                    <div wire:ignore>
                        <textarea id="summernote" wire:model="message"></textarea>
                    </div>

                    @error('message')
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
                @this.set('message', contents)
            }, 250);


            $('#summernote').summernote({
                callbacks: {
                    onChange: function(contents, $editable) {
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
