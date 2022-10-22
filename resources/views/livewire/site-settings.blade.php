<ul class="list-group">
      <li class="list-group-item list-group-item-info mb-2" aria-current="true">For security purpose, you have update each item one by one.</li>

    @foreach ($settings as $settings)
        @if ($settings->key == 'logo')
            <form wire:submit.prevent="updateLogo">
                <div class="row">
                    @if ($newLogo)
                        <div class="col-md-6">
                            New photo:
                            <img src="{{ $newLogo->temporaryUrl() }}" height="150" width="auto">
                        </div>
                    @endif

                    @if ($settings->value)
                        <div class="col-md-6">
                            Current photo:
                            <img src="{{ url("uploads/$settings->value") }}" height="150" width="auto">
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="{{ $settings->key }}">{{ Str::of($settings->key)->snake()->replace('_', ' ')->title() }}
                        <span class="badge badge-danger">required</span> </label>
                    <input type="file" class="form-control" id="{{ $settings->key }}"
                        accept="image/png, image/gif, image/jpeg, image/jpg" wire:model="newLogo">
                    @error('newLogo')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </form>
        @elseif ($settings->key == 'og_image')
            <form wire:submit.prevent="updateOgImage">
                <div class="row">
                    @if ($newOgImage)
                        <div class="col-md-6">
                            New photo:
                            <img src="{{ $newOgImage->temporaryUrl() }}" height="150" width="auto">
                        </div>
                    @endif

                    @if ($settings->value)
                        <div class="col-md-6">
                            Current photo:
                            <img src="{{ url("uploads/$settings->value") }}" height="150" width="auto">
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="{{ $settings->key }}">{{ Str::of($settings->key)->snake()->replace('_', ' ')->title() }}
                        <span class="badge badge-danger">required</span> </label>
                    <input type="file" class="form-control" id="{{ $settings->key }}"
                        accept="image/png, image/gif, image/jpeg, image/jpg" wire:model="newOgImage">
                    @error('newOgImage')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </form>
        @elseif ($settings->key == 'scripts' || $settings->key == 'links' || $settings->key == 'description')
            <form wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="form-group">
                    <label
                        for="{{ $settings->key }}">{{ Str::of($settings->key)->snake()->replace('_', ' ')->title() }}</label>
                    <input type="hidden" name="key" value="{{ $settings->key }}" />
                    <textarea class="form-control" id="{{ $settings->key }}" name="value" placeholder="Enter {{ $settings->key }}">{{ $settings->value }}</textarea>

                </div>

                <button type="submit" class="btn btn-primary float-right">Update</button>
            </form>
        @else
            <form wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
                <div class="form-group">
                    <label
                        for="{{ $settings->key }}">{{ Str::of($settings->key)->snake()->replace('_', ' ')->title() }}
                        <span class="badge badge-danger">required</span> </label>
                    <input type="hidden" name="key" value="{{ $settings->key }}" />
                    <input type="text" class="form-control" id="{{ $settings->key }}" name="value"
                        placeholder="Enter {{ $settings->key }}" value="{{ $settings->value }}">
                    @error($settings->key)
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary float-right">Update</button>
            </form>
        @endif
    @endforeach



</ul>
