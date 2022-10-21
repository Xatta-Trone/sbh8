<x-user-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center my-5">
                    <h3>NOTICES</h3>
                </div>
            </div>
            <div class="col-md-12">

                <div class="accordion" id="accordionExample">

                    <ul class="list-group list-group-flush">



                        @foreach ($notices as $notice)
                            <li class="list-group-item"> <a href="{{ route('singleNotice', $notice->id) }}"
                                    rel="noopener noreferrer">[{{ $notice->formatted_date }}] {{ $notice->title }}</a>
                            </li>
                            {{-- <div class="card">
                            <div class="card-header" id="heading-{{ $notice->id }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#head-{{ $notice->id }}"
                                        aria-expanded="false" aria-controls="head-{{ $notice->id }}">
                                        [{{ $notice->formatted_date }}] {{ $notice->title }}
                                    </button>
                                </h2>
                            </div>

                            <div id="head-{{ $notice->id }}" class="collapse"
                                aria-labelledby="heading-{{ $notice->id }}" data-parent="#accordionExample">
                                <div class="card-body">

                                    @if ($notice->description != null)
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!! $notice->description !!}
                                            </div>
                                            <div class="col-md-6">
                                                <iframe src="{{ $notice->drive_link }}"
                                                    style="width:100%; height:600px; border:0;"></iframe>
                                                <a href="{{ $notice->url }}" target="_blank">{{ $notice->url }}</a>
                                            </div>
                                        </div>
                                    @else
                                        <iframe src="{{ $notice->drive_link }}"
                                            style="width:100%; height:600px; border:0;"></iframe>
                                        <a href="{{ $notice->url }}" target="_blank">{{ $notice->url }}</a>
                                    @endif







                                </div>
                            </div>
                        </div> --}}
                        @endforeach
                    </ul>

                </div>


                <div class="mx-auto">
                    {{ $notices->links() }}
                </div>




            </div>

        </div>
    </div>




</x-user-layout>
