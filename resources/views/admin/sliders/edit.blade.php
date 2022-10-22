<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit slider') }}
    </x-slot>
    <x-slot name="addLink">
        <a href="{{ route('admin.sliders.index')}}" class="btn btn-primary float-right">Back</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - slider') }}
    </x-slot>

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:slider-edit :slider="$slider"/>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
