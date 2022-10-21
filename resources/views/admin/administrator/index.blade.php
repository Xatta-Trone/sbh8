<x-admin-layout>
    <x-slot name="header">
        {{ __('Administrator') }}
    </x-slot>
    <x-slot name="addLink">
       <a href="{{ route('admin.administrator.create')}}" class="btn btn-primary float-right">Add New</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Administrator') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:administrator-table />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
