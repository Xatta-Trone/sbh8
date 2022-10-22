<x-admin-layout>
    <x-slot name="header">
        {{ __('Inquiry') }}
    </x-slot>

    <x-slot name="title">
        {{ __('Admin - Inquiry') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:contact-table />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
