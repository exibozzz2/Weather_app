@extends("layout")

@section("pageTitle")
    Add Forecast
@endsection

@section("content")

    <div class="d-flex justify-content-center bg-img-2">
        <div class="col-10 d-flex flex-column align-items-center flex-column bg-card gap-3">

        <form method="POST" action="{{route("createForecast")}}">
            {{csrf_field()}}
            <select class="border-custom" name="city_id">
                @foreach(\App\Models\CitiesModel::all() as $city)
                    <option value="{{$city->id}}">{{$city->city}}</option>
                @endforeach
            </select>
            <input class="border-custom" name="temperature" placeholder="Insert temperature">
            <input type="date" class="border-custom date" name="forecast_date">
            <select class="border-custom" name="condition">
                @foreach(\App\Models\CitiesModel::CONDITIONS as $condition)
                    <option>{{$condition}}</option>
                @endforeach
            </select>
            <button class="btn">Create</button>
        </form>

            @if($errors->any())
                <p class="text-danger">Error: {{ $errors->first() }}</p>
            @endif


            @foreach(\App\Models\CitiesModel::all() as $singleCity)
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <p><b>{{$singleCity->city}}</b></p>
                    <ul>
                        @foreach($singleCity->forecasts as $forecast)
                            <li>{{$forecast->forecast_date}} -> {{$forecast->temperature}} &#8451;</li>

                        @endforeach

</ul>


</div>

@endforeach






</div>
</div>

@endsection
