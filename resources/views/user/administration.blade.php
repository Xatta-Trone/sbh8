<x-user-layout>
    <x-slot name="title">
        {{ __('Current Administration') }}
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center my-5">
                    <h3>ADMINISTRATION</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="section-title text-center mb-3">
                    <h4>PROVOST</h4>
                </div>

                <div class="row text-center">
                    @foreach ($administration->where('type', App\Enums\AdministratorType::Provost) as $admin)
                        <div class="col-md-3 d-flex mx-auto">
                            <div class="card w-100">
                                <div class="img-custom rounded" style="background-image: url({{ $admin->image_path }})">
                                </div>
                                <div class="card-body py-3  px-1">
                                    <h5 class="mb-0 admin-name mt-2">{{ $admin->name }}</h5>
                                    <div class="admin-detail  mt-2" > <pre>{!! $admin->description !!}</pre> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="section-title text-center my-5">
                    <h4>ASSISTANT PROVOST</h4>
                </div>

                <div class="row justify-content-center text-center">
                    @foreach ($administration->where('type', App\Enums\AdministratorType::AssistantProvost) as $admin)
                        <div class="col-md-3 d-flex  mx-auto">
                            <div class="card w-100">
                                <div class="img-custom rounded" style="background-image: url({{ $admin->image_path }})">
                                </div>
                                <div class="card-body py-3 px-1">
                                    <h5 class="mb-0 admin-name">{{ $admin->name }}</h5>
                                    <div class="admin-designation mt-2">{{ $admin->designation }}</div>
                                    <div class="admin-detail mt-2" > <pre>{!! $admin->description !!}</pre> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="section-title text-center my-5">
                    <h4>STAFFS</h4>
                </div>

                <div class="row text-center ">
                    @foreach ($administration->where('type', App\Enums\AdministratorType::Staff)->sortBy('designation') as $admin)
                        <div class="col-md-3 d-flex">
                            <div class="card w-100 mb-3">
                                <div class="img-custom rounded" style="background-image: url({{ $admin->image_path }})">
                                </div>
                                <div class="card-body py-3 px-1">
                                    <h5 class="mb-0 admin-name">{{ $admin->name }}</h5>
                                    <div class="admin-designation mt-2">{{ $admin->designation }}</div>
                                    <div class="admin-detail mt-2" > <pre>{!! $admin->description !!}</pre> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>



        </div>
    </div>

    <style>
        .img-custom {
            height: 270px;
            width: auto;
            background-size: cover;
        }

        h4 {
            font-size: 25px;
            background-color: #7B0100;
            color: #fff;
            line-height: 1.5;
        }
    </style>




</x-user-layout>
