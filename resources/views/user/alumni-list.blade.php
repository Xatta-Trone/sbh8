<x-user-layout>
    <x-slot name="title">
        {{ __('Alumni list') }}
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center my-5">
                    <h3>LIST OF REGISTERED ALUMNI</h3>
                </div>
            </div>
            <div class="col-md-12">

                <livewire:alumni-table-front />
            </div>

        </div>
    </div>


    <style>
        .page-item.active {
            background: #7B0100 !important;
        }

        .page-item.active .page-link {
            background-color: #7B0100;
            border-color: #7B0100;
        }
        .page-link {

           color: #7B0100;
        }
    </style>





</x-user-layout>
