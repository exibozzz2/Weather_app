@extends("layout")

@section("pageTitle")
    Weather Cast
@endsection


@section("content")

    <div class="d-flex flex-column col-12 justify-content-center align-items-center bg-img">
        <h1 class="text-white">{{date("h:i:s")}}</h1>
        <hr style="background-color: white;">
        <h2 class="text-white">{{date("F")}}, {{date("j")}} </h2>
        <h2 class="text-success">{{date("l")}}</h2>
    </div>

    <div class="d-flex justify-content-center align-items-center flex-wrap mt-5 bg-img-2">

        <div class="d-flex  col-12">
                <h2 class="text-white ">Europe</h2>
        </div>

        @foreach($cities as $city)
            <div class="card col-md-3 text-white bg-success mb-3 border-custom border-white relative p-2 m-1" style="max-width: 20rem;">
                <div class="d-flex justify-content align-items-center flex-wrap">
                    <p class="card-header">{{$city->city}}</p>
                    <p class="card-header">{{$city->current}}&#8451; / &#8457;</p>
                </div>
                <img class="sun col-2 absolute" src="{{url('/images/sun.png')}}" alt="Image"/>
                <div class="card-body bg-custom-2">
                    <h4 class="card-title">{{$city->weather}}</h4>
                    <p>{{$city->minimum}} / {{$city->maximum}} </p>
                </div>
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <a href="{{route("editCity", ['city' => $city->id])}}" class="btn bg-info border-custom border-white">Edit</a>
                    <a href="{{route("deleteCity", ['city' => $city->id])}}" class="btn bg-danger border-custom border-white">Delete</a>
                </div>
            </div>
        @endforeach

    </div>

    </div>

    <hr>
    <hr>
    <hr>


    <div class="container d-flex justify-content-center align-items-center flex-wrap">
        @foreach($cities as $city)
            <div class="d-flex flex-column justify-content-center align-items center col-2 h-card bg-info border rounded  border-black m-2">
                <div class="d-flex flex-column justify-content-center align-items-center bg-nav">
                    <h3> {{ $city->city }}</h3>
                    <p>{{ $city->current }}</p>
                </div>
                <p>min: {{ $city->minimum }} </p>
                <p>max: {{ $city->maximum }}</p>
                <div>
                    <a class="button">Edit</a>
                    <a class="button">Delete</a>
                </div>
            </div>
        @endforeach

    </div>


@endsection
