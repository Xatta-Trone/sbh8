<x-admin-layout>
    <x-slot name="header">
        {{ __('Website Settings') }}
    </x-slot>

    <x-slot name="title">
        {{ __('Admin - Website Settings') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:site-settings />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
