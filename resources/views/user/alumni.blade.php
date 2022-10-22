<x-user-layout>
     <x-slot name="title">
        {{ __('Alumins') }}
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center my-5">
                    <h3>NOTABLE ALUMNI</h3>
                </div>
            </div>
            <div class="col-md-12">

                <div class="row">
                    @foreach ($alumins as $alumni)
                        <div class="col-md-3 d-flex mb-4">
                            <div class="card w-100">
                                <div class="img rounded" style="background-image: url({{ $alumni->image_path }})">
                                </div>
                                <a class="card-body py-3 text-dark stretched-link"
                                    href="{{ route('alumniDetail', $alumni->slug) }}">
                                    <h5 class="mb-0">{{ $alumni->name }}</h5>
                                    <span>{{ $alumni->designation }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mx-auto">
                    {{ $alumins->links() }}
                </div>
            </div>

        </div>
    </div>


    <style>
        .img {
            height: 270px;
            width: auto;
            background-size: cover;
        }
    </style>





</x-user-layout>
