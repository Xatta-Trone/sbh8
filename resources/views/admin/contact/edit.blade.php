<x-admin-layout>
    <x-slot name="header">
        {{ __('View Inquiry') }}
    </x-slot>
    <x-slot name="addLink">
        <a href="{{ route('admin.contacts.index')}}" class="btn btn-primary float-right">Back</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Inquiry') }}
    </x-slot>

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:contact-edit :contact="$contact"/>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
