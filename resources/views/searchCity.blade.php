@extends("layout")

@section("pageTitle")
    Search
@endsection

@section("content")

    <div class="col-12 d-flex justify-content-center align-items-center flex-column bg-img">
        <form class="mb-3 mt-3 col-8 d-flex justify-content-center align-items-center flex-column border-radius rounded text-white bg-card h-25 relative" method="GET" action="{{route("searchCitiesGet")}}" >



            <h1>Search City</h1>

            <!--Session flash-->
            @if(\Illuminate\Support\Facades\Session::has("error"))
                <p class="text-danger">{{\Illuminate\Support\Facades\Session::get("error")}}</p>
            @endif

            <!--Validation Check-->
            @if($errors->any())
                <p class="bg-danger">Error: {{ $errors->first() }}</p>
            @endif

            <div class="form-group mb-1 col-5">
                <label for="city">Search</label>
                <input type="text" name="search" class="form-control col-lg-10 border-dark mb-2" id="city" aria-describedby="Enter city name " placeholder="Enter city name" value="{{old("search")}}" required>
                <button class="btn search-button col-12 border border-black">Search</button>
            </div>
            <img class="icon col-2 absolute search-icon-right" src="images/home.png" alt="Weather Icon"/>
            <img class="icon col-2 absolute search-icon-left" src="images/home.png" alt="Weather Icon"/>
        </form>

        <div class="col-5 d-flex justify-content-center align-items-center flex-column border-radius rounded text-white bg-card ">
            <h3>Favourites</h3>
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">City</th>
                    <th scope="col">Temperature</th>
                    <th scope="col">Weather</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userFavourites as $userFavourite)
                    <tr>
                        <td>{{$userFavourite->city_id}}</td>
                        <td>{{$userFavourite->relationToCities->city}}</td>
                        <td>{{$userFavourite->relationToCities->todayForecast->temperature}}&#8451;</td>
                        <td>{{$userFavourite->relationToCities->todayForecast->condition}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>


        </div>
    </div>




@endsection
