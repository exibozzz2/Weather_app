@extends("layout")

@section("pageTitle")

@endsection

@section("content")

    <div class="d-flex justify-content-center align-items-center bg-img">


        <div class="col-8 d-flex justify-content-center align-items-center h-50 bg-card flex-wrap border-custom gap-5" data-tilt>
            <h1 class="col-12 text-center text-white">Next 5 days</h1>
                @foreach($singleCityForecasts as $singleCity)

                    @php
                    $color = App\Helpers\ColorHelper::getColorByTemperature($singleCity->temperature);
                    @endphp

                    <div class="h-25 col-3 d-flex justify-content-center align-items-center gap-5 hover-card border-custom">

                        <h5>{{$singleCity->forecast_date->setTimezone('Europe/Belgrade')->format('F d l')}}</h5>
                        <h5 style="color: {{$color}}">{{$singleCity->temperature}} &#8451;</h5>
                    </div>

                @endforeach

        </div>

    </div>



@endsection
