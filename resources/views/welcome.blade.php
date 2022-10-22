<x-user-layout>

    <x-slot name="title">
        {{ __('Home') }}
    </x-slot>

    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">

            @foreach ($sliders as $slider)
                <div class="hs-item set-bg" data-setbg="{{ url('uploads/' . $slider->image) }}">
                    <div class="hs-text">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">

                                    @if ($slider->header_text)
                                        <h2 class="hs-title">{{ $slider->header_text }}</h2>
                                        <br>
                                    @endif

                                    @if ($slider->content_text)
                                        <span class="hs-des">{{ $slider->content_text }}</span>
                                        <br>
                                    @endif

                                    @if ($slider->url)
                                        <a href="{{ $slider->url }}" target="_blank" class="site-btn">Browse</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Hero section end -->


    <!-- Counter section  -->
    <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <marquee behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();">
                        @forelse ($notices as $notice)
                            <a href="{{ route('singleNotice', $notice->slug) }}"
                                target="_blank">{{ $notice->title }}</a>
                        @empty
                        @endforelse
                    </marquee>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter section end -->


    <!-- Services section -->
    <section class="service-section spad ">
        <div class="container">
            <div class="section-title text-center">
                <h3>MESSAGE FROM THE PROVOST</h3>

            </div>

            <div class="row">
                @if ($provost)
                    <div class="col-md-4">
                        <div class="d-flex mx-auto">
                            <div class="card w-100">
                                <div class="img-custom"
                                    style="background-image: url({{ $provost->image_path }}); height:350px;"></div>
                                <div class="card-body py-3">
                                    <h5 class="mb-0 py-2">{{ $provost->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-8 provost-msg">
                    {!! $welcome_message->content !!}
                </div>
            </div>



        </div>
    </section>
    <!-- Services section end -->




    <!-- Courses section -->
    <section class="spad notice-section" style="background-image: url({{ asset('user_assets/bg/cream-pixels.png') }})">
        <div class="container">
            <div class="section-title text-center">
                <h3>RECENT NOTICES</h3>

            </div>
            <div class="row">

                <div class="col-md-12">
                    <ul class="list-group list-group-flush">
                        @foreach ($notices as $notice)
                            <li class="list-group-item notice-title"> <a
                                    href="{{ route('singleNotice', $notice->slug) }}">
                                    <span
                                        class="notice-date px-2">{{ $notice->formatted_date }}</span>{{ $notice->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-12 text-center mt-4">
                    <a href="{{ route('notice') }}" class="btn custom-red-bg notice-btn">All notices</a>
                </div>

            </div>
        </div>
    </section>
    <!-- Courses section end-->


</x-user-layout>
