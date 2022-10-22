<form class="comment-form --contact" wire:submit.prevent="submit">
    <div class="row">
        <div class="col-12">
            @if ($isSubmitted)
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Thank you!</strong> Your inquiry has been received successfully.<br>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click="reshow">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="col-lg-4">
            <input type="text" placeholder="Your Name" wire:model="name">
            @error('name')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-4">
            <input type="email" placeholder="Your Email" wire:model="email">
            @error('email')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-4">
            <input type="text" placeholder="Subject" wire:model="subject">
            @error('subject')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-12">
            <textarea placeholder="Message" wire:model="message"></textarea>
            @error('message')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <div class="text-center">
                <button class="site-btn" type="submit">SUBMIT</button>
            </div>
        </div>
    </div>

</form>
