@php use App\Models\CitiesModel; @endphp
@extends("layout")


@section("pageTitle")
    Menage Cities
@endsection

@section("content")

    <div class="d-flex justify-content-center bg-img-2">

        <div class="col-10 d-flex justify-content-center align-items-center flex-column bg-card gap-3">

            <form class="col-12 d-flex justify-content-center m-5 gap-3" method="POST" action="{{route("updateTemperature")}}" >
                {{csrf_field()}}

                <input class="border-custom" name="temperature" placeholder="Insert Temperature">
                <select class="border-custom" name="city_id">
                    @foreach(CitiesModel::all() as $city)
                        <option value="{{$city->id}}">{{$city->city}}</option>
                    @endforeach
                </select>
                <button class="btn border border-black border-custom">Insert</button>
            </form>


            @foreach(CitiesModel::all() as $city)
                <div class="col-2 bg-city border-custom d-flex justify-content-center align-items-center">
                    <p><b>{{$city->city}}</b> -> <b>{{$city->current}}</b> &#8451;</p>
                </div>

            @endforeach


        </div>


    </div>

@endsection
