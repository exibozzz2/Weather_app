@extends("layout")

@section("content")

    <div class="bg-img-2 d-flex justify-content-center align-items-center col-12">

        <div class="bg-card col-8 d-flex justify-content-center align-items-center flex-wrap gap-2 border-custom">
            <div class="col-12 d-flex justify-content-center align-items-center text-white mb-5">
                <h1>Search Results &#8675; &#8675; &#8675;</h1>
            </div>

            @foreach($cities as $city)
                <a>
                    <div class="d-flex justify-content-center align-items-center flex-column border border-white border-custom m-2">
                        <h2 class="text-white m-2">{{$city->city}}</h2>
                        <p>{{$city->current}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
