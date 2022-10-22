<x-admin-layout>
    <x-slot name="header">
        {{ __('slider') }}
    </x-slot>
    <x-slot name="addLink">
       <a href="{{ route('admin.sliders.create')}}" class="btn btn-primary float-right">Add New</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - slider') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:slider-table />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
