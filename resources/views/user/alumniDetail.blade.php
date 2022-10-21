<x-user-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center my-5">
                    <h3>ALUMNI DETAIL</h3>
                </div>
            </div>
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card w-100">
                            <div class="img rounded" style="background-image: url({{ $alumni->image_path }})">
                            </div>
                            <div class="card-body py-3 text-dark">
                                <h5 class="mb-0">{{ $alumni->name }}</h5>
                                <span>{{ $alumni->designation }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        {!! $alumni->description !!}

                        <p class="mt-4">Last updated: {{ $alumni->updated_at->toDateString() }}</p>
                    </div>

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
