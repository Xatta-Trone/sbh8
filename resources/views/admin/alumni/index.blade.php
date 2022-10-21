<x-admin-layout>
    <x-slot name="header">
        {{ __('Alumni') }}
    </x-slot>
    <x-slot name="addLink">
       <a href="{{ route('admin.alumins.create')}}" class="btn btn-primary float-right">Add New</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Alumni') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:alumni-table />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
