@extends("layout")

@section("pageTitle")

@endsection

@section("content")

    <div class="d-flex flex-wrap justify-content-center align-items-center bg-img-2">

                @foreach($singleCityForecasts as $singleCity)

                    @php
                    $url = App\Helpers\IconsHelper::getIconByCondition($singleCity->condition);
                    @endphp

                <div class="card-1 rgb col-8 m-3" data-tilt >
                    <div class="card-image d-flex justify-content-around align-items-center text-secondary">
                        <h1 class="text-secondary">{{$singleCity->forecast_date->setTimezone('Europe/Belgrade')->format('l')}}</h5></h1>
                        <img src="/Images/{{$url}}" class="col-3 h-70 card-image border-custom" alt="coverimg">
                    </div>

                    <div class="col-12 d-flex justify-content-around align-items-center">
                        <div class="card-text col-4">
                            <h2>{{$singleCity->city}}</h2>
                            <p>• Sunrise: {{$sunrise}}</p>
                            <p>• Sunset: {{$sunset}}</p>
                            <p>• Min temperature: {{$minTemperature}} &#8451;</p>
                            <p>• Max temperature: {{$maxTemperature}} &#8451;</p>
                        </div>
                        <div class="card-text d-flex justify-content-around align-items-center col-4 flex-wrap ">
                            <h3 class="">{{$singleCity->condition}}</h3>
                        </div>


                    </div>


                    <div class="card-stats">
                        <div class="stat">
                            <div class="type">City ID</div>
                            <div class="value">{{$singleCity->city_id}}<sup> </sup></div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center bg-custom-3 border">
                            <a href="/" class="btn text-white">{{$singleCity->forecast_date->setTimezone('Europe/Belgrade')->format('d,F')}}</a>
                        </div>
                        <div class="stat">
                            <div class="value">{{$singleCity->possibility}}%</div>
                            <div class="type">Will it Rain?</div>
                        </div>
                    </div>
                </div>
{{--                    <p>{{$sunrise}}</p>--}}
{{--                    <p>{{$sunset}}</p>--}}

{{--                    @php--}}
{{--                    $color = App\Helpers\ColorHelper::getColorByTemperature($singleCity->temperature);--}}
{{--                    @endphp--}}

{{--                    <div class="h-25 col-3 d-flex justify-content-center align-items-center gap-5 hover-card border-custom">--}}

{{--                        <h5>{{$singleCity->forecast_date->setTimezone('Europe/Belgrade')->format('F d l')}}</h5>--}}
{{--                        <h5 style="color: {{$color}}">{{$singleCity->temperature}} &#8451;</h5>--}}
{{--                    </div>--}}

                @endforeach

        </div>




@endsection
