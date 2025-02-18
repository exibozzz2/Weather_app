@extends("layout")

@section("pageTitle")

@endsection

@section("content")

    <div class="container d-flex justify-content-center align-items-center bg-img">


        <div class="col-8 d-flex justify-content-center align-items-center h-50 bg-card flex-wrap border-custom gap-5" data-tilt>

                @foreach($singleCityForecasts as $singleCity)
                    <div class="h-25 d-flex justify-content-center align-items-center gap-5">
                        <h5>Forecast for: {{$singleCity->forecast_date}} -> </h5>
                        <h5>{{$singleCity->temperature}} &#8451;</h5>
                    </div>

                @endforeach

        </div>

    </div>



@endsection
