@php use App\Models\CitiesModel; @endphp
@extends("layout")


@section("pageTitle")
    Menage Cities
@endsection

@section("content")

    <div class="d-flex justify-content-center bg-img-2">

        <div class="col-10 d-flex justify-content-center align-items-center flex-column bg-card">

            <form class="col-12 d-flex justify-content-center m-5" method="POST" action="{{route("updateTemperature")}}" >
                {{csrf_field()}}

                <input class="" name="temperature" placeholder="Insert Temperature">
                <select class="" name="city_id">
                    @foreach(CitiesModel::all() as $city)
                        <option value="{{$city->id}}">{{$city->city}}</option>
                    @endforeach
                </select>
                <button class="btn border border-black border-custom">Insert</button>
            </form>


            @foreach(CitiesModel::all() as $city)
                <p>{{$city->city}} -> {{$city->current}} &#8451;</p>
            @endforeach


        </div>


    </div>

@endsection
