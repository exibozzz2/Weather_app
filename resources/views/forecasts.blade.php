@extends("layout")

@section("pageTitle")
    5 days
@endsection


@section("content")



    <div class="col-12 d-flex justify-content-center align-items-center flex-wrap flex-column bg-img-2" >


            <h1 class="text-white mt-1 m-5">Next 5 days</h1>


        @foreach($forecasts as $singleForecast)

            @php
                $url = \App\Helpers\IconsHelper::getIconByCondition($singleForecast->condition);
            @endphp
            <div class="card col-4 text-white bg-card mb-3 border-custom border-dark relative p-2 m-3"  data-tilt>
                <div class="col-12 d-flex justify-content-around align-items-center">
                    <h1 class="card-header">{{$singleForecast->city}}</h1>
                    <h3 class="card-title">{{$singleForecast->temperature}} &#8451;</h3>
                </div>

                @if($url)
                    <img class="icon col-2 absolute" src="{{ $url }}" alt="Weather Icon"/>
                @endif
                <hr>
                <div class="card-body col-12 d-flex justify-content-center ">
                    <h4 class="card-header">{{$singleForecast->forecast_date}}</h4>
                </div>

            </div>
        @endforeach

    </div>

@endsection
