<x-user-layout>

    <x-slot name="title">
       {{$page->title ?? 'No page found'}}
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center my-5">
                    <h3>{{$page->title ?? 'No page found'}}</h3>
                </div>
            </div>
            <div class="col-md-12">

                {!! $page->content !!}
            </div>

        </div>
    </div>




</x-user-layout>
