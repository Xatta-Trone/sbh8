<x-admin-layout>
    <x-slot name="header">
        {{ __('Admins') }}
    </x-slot>
    <x-slot name="addLink">
        <a href="{{ route('admin.users.index')}}" class="btn btn-primary float-right">Back</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - users') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:user-table />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
