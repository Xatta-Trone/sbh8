<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit Page') }}
    </x-slot>
    <x-slot name="addLink">
        <a href="{{ route('admin.pages.index')}}" class="btn btn-primary float-right">Back</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Pages') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:page-edit :page="$page"/>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
