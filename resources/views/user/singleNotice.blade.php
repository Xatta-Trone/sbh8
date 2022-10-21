<x-user-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center my-5">
                    <h3>NOTICE</h3>
                </div>
            </div>
            <div class="col-md-12">
                 <h5 class="mb-3">[{{ $notice->formatted_date }}] {{ $notice->title }}</h5>
                <div class="row mb-2">

                   @if ($notice->description != null && $notice->url != null)
                        <div class="col-md-6">
                            {!! $notice->description !!}
                        </div>
                        <div class="col-md-6">
                            <a href="{{ $notice->url }}" target="_blank" class="mb-2">{{ $notice->url }}</a>
                            <iframe src="{{ $notice->drive_link }}"
                                style="width:100%; height:600px; border:0;"></iframe>

                        </div>
                    @elseif ($notice->url == null)
                        <div class="col-md-12 mx-auto">
                            {!! $notice->description !!}
                        </div>
                    @else
                        <div class="col-md-12 mx-auto">
                            <a href="{{ $notice->url }}" target="_blank" class="mb-2">{{ $notice->url }}</a>
                            <iframe src="{{ $notice->drive_link }}"
                                style="width:100%; height:600px; border:0;"></iframe>
                        </div>
                    @endif
                </div>




            </div>

        </div>
    </div>




</x-user-layout>
