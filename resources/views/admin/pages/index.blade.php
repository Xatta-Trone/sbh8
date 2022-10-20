<x-admin-layout>
    <x-slot name="header">
        {{ __('Pages') }}
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Pages') }}
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
