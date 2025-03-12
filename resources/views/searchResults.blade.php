@extends("layout")

@section("content")

    <div class="bg-img-2 d-flex justify-content-center align-items-center col-12">

        <div class="bg-card col-8 d-flex justify-content-center align-items-center flex-wrap gap-2 border-custom">
            <div class="col-12 d-flex justify-content-center align-items-center text-white mb-5">
                <h3>Search Results &#8675; &#8675; &#8675;</h3>
            </div>

            <!--Session flash-->
            @if(Illuminate\Support\Facades\Session::has('error'))
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <p class="text-danger">{{Illuminate\Support\Facades\Session::get('error')}}</p>
                </div>
            @endif


            @foreach($cities as $city)

                <div class="col-5 d-flex justify-content-center align-items-center">
                    <a class="col-2 btn d-flex justify-content-center align-items-center p-2" href="{{route('favourites', ['city' => $city->id])}}">
                        <img class="img-fluid" src="images/fav.png" alt="Favourite button"/>
                    </a>

                    <a class="d-flex col-10 justify-content-center align-items-center flex-column text-decoration-none " href="{{route("singleCityForecast", ['city' => $city->city])}}">
                        @php
                            $url = \App\Helpers\IconsHelper::getIconByCondition($city->todayForecast->condition);
                            $color = App\Helpers\ColorHelper::getColorByTemperature($city->temperature);
                        @endphp

                        <div
                            class="d-flex col-12 justify-content-center align-items-center flex-column border border-white border-custom m-2 relative">
                            <h4 class="text-white m-2">{{$city->city}}</h4>
                            <p style="color: {{$color}}">{{$city->current}}&#8451;</p>
                            @if($url)
                                <img class="search-weather-icon col-2 absolute" src="{{ $url }}" alt="Weather Icon"/>
                            @endif
                        </div>
                    </a>


                </div>

            @endforeach
        </div>
    </div>

@endsection
