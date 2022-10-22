<x-user-layout>
     <x-slot name="title">
       {{ $notice->title ?? 'No page found'}}
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center my-5">
                    <h3>NOTICE</h3>
                </div>
            </div>
            <div class="col-md-12">
                 <h5 class="mb-3"><span class="notice-date px-2">{{ $notice->formatted_date }}</span>{{ $notice->title }}</h5>
                <div class="row mt-5">

                   @if ($notice->description != null && $notice->url != null)
                        <div class="col-md-6 notice-description mb-2">
                            {!! $notice->description !!}
                        </div>
                        <div class="col-md-6 notice-description">
                            <a href="{{ $notice->url }}" target="_blank" class="mb-2">{{ $notice->url }}</a>
                            <iframe src="{{ $notice->drive_link }}"
                                style="width:100%; height:600px; border:0;"></iframe>

                        </div>
                    @elseif ($notice->url == null)
                        <div class="col-md-12 mx-auto notice-description">
                            {!! $notice->description !!}
                        </div>
                    @else
                        <div class="col-md-12 mx-auto notice-description">
                            <a href="{{ $notice->url }}" target="_blank" class="mb-2">{{ $notice->url }}</a>
                            <iframe src="{{ $notice->drive_link }}"
                                style="width:100%; height:600px; border:0;"></iframe>
                        </div>
                    @endif
                </div>
                <p class="mt-4">Last updated: {{ $notice->updated_at->toDateString() }}</p>




            </div>

        </div>
    </div>




</x-user-layout>
