@extends("layout")

@section("pageTitle")
    Weather Cast
@endsection


@section("content")

    <div class="d-flex flex-column col-12 justify-content-center align-items-center bg-img" style="height: 30vh">

        <hr style="background-color: black;">
        <h2 class="text-white">{{date("F")}}, {{date("j")}} </h2>
        <h2 class="text-success">{{date("l")}}</h2>
        <h1 class="text-white mt-5">{{date("h:i:s")}}</h1>
    </div>

    <div class="col-10 d-flex justify-content-center align-items-center flex-wrap mt-5 bg-img-2" >

        <div class="d-flex justify-content-center align-items-center col-12 mb-5">
                <h1 class="text-white ">Europe</h1>
        </div>

        @foreach($cities as $city)
            <div class="card col-4 text-white bg-card mb-3 border-custom border-dark relative p-2 m-3"  data-tilt>
                <div class="d-flex justify-content align-items-center flex-wrap">
                    <h1 class="card-header">{{$city->city}}</h1>
                    <h4 class="card-header">{{$city->current}}&#8451; / &#8457;</h4>
                </div>

                @if($city->weather == "Sunny")
                    <img class="sun col-3 absolute" src="{{url('/images/sun.png')}}" alt="Image"/>
                @elseif($city->weather == "Fog")
                    <img class="fog col-3 absolute" src="{{url('/images/fog.png')}}" alt="Image"/>
                @elseif($city->weather == "Clear")
                    <img class="sun col-3 absolute" src="{{url('/images/sun.png')}}" alt="Image"/>
                @elseif($city->weather == "Sun")
                    <img class="sun col-3 absolute" src="{{url('/images/sun.png')}}" alt="Image"/>
                @elseif($city->weather == "Cloudy")
                    <img class="cloudy col-3 absolute" src="{{url('/images/cloudy.png')}}" alt="Image"/>
                @elseif($city->weather == "Snow")
                    <img class="snow col-2 absolute" src="{{url('/images/snow.png')}}" alt="Image"/>
                @elseif($city->weather == "Storm")
                    <img class="storm col-3 absolute" src="{{url('/images/storm.png')}}" alt="Image"/>
                @else
                    .
                @endif


                <div class="card-body ">
                    <h3 class="card-title">{{$city->weather}}</h3>
                    <p>{{$city->minimum}} / {{$city->maximum}} </p>
                </div>
                <div class="d-flex col-12 justify-content-between align-items-center flex-wrap text-white ">
                    <a href="{{route("editCity", ['city' => $city->id])}}" class="btn bg-custom-2 border-custom border-white text-white">Edit</a>
                    <a href="{{route("deleteCity", ['city' => $city->id])}}" class="btn bg-danger border-custom border-white text-white">Delete</a>
                </div>
            </div>
        @endforeach

    </div>



    <hr>
    <hr>
    <hr>


    <div class="container d-flex justify-content-center align-items-center flex-wrap">
        @foreach($cities as $city)
            <div class="d-flex flex-column justify-content-center align-items center col-3 h-card bg-info border rounded  border-black m-2">
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
