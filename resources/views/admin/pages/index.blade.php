<x-admin-layout>
    <x-slot name="header">
        {{ __('Pages') }}
    </x-slot>
    <x-slot name="addLink">
       <a href="{{ route('admin.pages.create')}}" class="btn btn-primary float-right">Add New</a>
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Pages') }}
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">You should not delete any pages! It may break the website, because the pages are hardcoded. If something is not working, please contact <a target="_blank" href="https://www.facebook.com/monzurul.islam1112/">Monzurul Islam</a> Immediately.</div>
            <div class="card">
                <div class="card-body">
                    <livewire:page-table />
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
