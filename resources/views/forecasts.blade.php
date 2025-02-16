@extends("layout")

@section("pageTitle")
    5 days
@endsection


@section("content")



    <div class="col-12 d-flex justify-content-center align-items-center flex-wrap flex-column bg-img-2" >

        <div class=" col-12 mb-5">
            <h1 class="text-white mt-1">Next 5 days</h1>
        </div>

        @foreach($forecasts as $singleForecast)
            <div class="card col-4 text-white bg-card mb-3 border-custom border-dark relative p-2 m-3"  data-tilt>
                <div class="col-12 d-flex justify-content-around align-items-center">
                    <h1 class="card-header">{{$singleForecast->city_id}}</h1>
                    <h3 class="card-title">{{$singleForecast->temperature}} &#8451;</h3>
                </div>


                <hr>

                @if($singleForecast->weather == "Sunny")
                    <img class="icon col-2 absolute" src="{{url('/images/sun.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Sun")
                    <img class="icon col-2 absolute" src="{{url('/images/sun.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Clear")
                    <img class="icon col-2 absolute" src="{{url('/images/sun.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Fog")
                    <img class="icon col-2 absolute" src="{{url('/images/fog.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Cloudy")
                    <img class="icon col-2 absolute" src="{{url('/images/cloudy.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Cloud")
                    <img class="icon col-2 absolute" src="{{url('/images/cloud.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Rain")
                    <img class="icon col-2 absolute" src="{{url('/images/rain.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Rainy")
                    <img class="icon col-2 absolute" src="{{url('/images/rainy.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Snow")
                    <img class="icon col-2 absolute" src="{{url('/images/snow.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Wind")
                    <img class="icon col-2 absolute" src="{{url('/images/wind.png')}}" alt="Image"/>
                @elseif($singleForecast->weather == "Storm")
                    <img class="icon col-2 absolute" src="{{url('/images/storm.png')}}" alt="Image"/>
                @endif




                <div class="card-body col-12 d-flex justify-content-center ">
                    <h4 class="card-header">{{$singleForecast->forecast_date}}</h4>
                </div>

            </div>
        @endforeach

    </div>

@endsection
