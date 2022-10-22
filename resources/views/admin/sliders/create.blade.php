<x-admin-layout>
    <x-slot name="header">
        {{ __('Create slider') }}
    </x-slot>
    <x-slot name="addLink">
        <a href="{{ route('admin.sliders.index')}}" class="btn btn-primary float-right">Back</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - sliders') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:slider-create />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
