<x-admin-layout>
    <x-slot name="header">
        {{ __('Notices') }}
    </x-slot>
    <x-slot name="addLink">
       <a href="{{ route('admin.notices.create')}}" class="btn btn-primary float-right">Add New</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Notices') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:notice-table />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
