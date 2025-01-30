@extends("layout")

@section("pageTitle")
    5 days
@endsection


@section("content")



    <div class="col-10 d-flex justify-content-center align-items-center flex-wrap flex-column mt-5 bg-img-2" >

        <div class=" col-12 mb-5">
            <h1 class="text-white mt-1">Next 5 days</h1>
        </div>

        @foreach($forecasts as $singleForecast)
            <div class="card col-4 text-white bg-card mb-3 border-custom border-dark relative p-2 m-3"  data-tilt>
                <div class="d-flex justify-content align-items-center">
                    <h1 class="card-header">City id ->{{$singleForecast->city_id}}</h1>
                    <h3 class="card-title">{{$singleForecast->temperature}} &#8451; / &#8457;</h3>

                </div>
                <hr>



                <div class="card-body ">
                    <h4 class="card-header">{{$singleForecast->forecast_date}}</h4>

                </div>

            </div>
        @endforeach

    </div>

@endsection
