<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="submit">
            <div class="">
                <div class="form-group">
                    <label for="exampleInputEmailName">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmailName" placeholder="Enter name"
                        wire:model="name">
                    @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                        wire:model="email">
                    @error('email')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
</div>
