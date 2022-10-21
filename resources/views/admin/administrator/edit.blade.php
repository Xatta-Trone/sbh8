<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit administrator') }}
    </x-slot>
    <x-slot name="addLink">
        <a href="{{ route('admin.administrator.index')}}" class="btn btn-primary float-right">Back</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - administrator') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:administrator-edit :administrator="$administrator"/>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
