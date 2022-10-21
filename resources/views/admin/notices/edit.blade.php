<x-admin-layout>
    <x-slot name="header">
        {{ __('Edit notice') }}
    </x-slot>
    <x-slot name="addLink">
        <a href="{{ route('admin.notices.index')}}" class="btn btn-primary float-right">Back</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - notices') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:notice-edit :notice="$notice"/>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
