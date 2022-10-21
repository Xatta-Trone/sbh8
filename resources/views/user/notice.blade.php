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
                            <li class="list-group-item notice-title"> <a
                                    href="{{ route('singleNotice', $notice->slug) }}">
                                    <span class="notice-date px-2">{{ $notice->formatted_date }}</span>{{ $notice->title }}</a>
                            </li>
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
