<x-admin-layout>
    <x-slot name="header">
        {{ __('Pending Alumni Data') }}
    </x-slot>
    <x-slot name="addLink">
       <a href="{{ route('admin.alumni-data.create')}}" class="btn btn-primary float-right">Add New Alumni</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Pending Alumni Data') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:pending-alumni-data-table />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
