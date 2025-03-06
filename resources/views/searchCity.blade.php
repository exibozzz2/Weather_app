@extends("layout")

@section("pageTitle")
    Search
@endsection

@section("content")

    <div class="col-12 d-flex justify-content-center align-items-center bg-img">
        <form class="mb-3 mt-3 col-8 d-flex justify-content-center align-items-center flex-column border-radius rounded text-white bg-card h-25 relative" method="GET" action="{{route("searchCitiesGet")}}" >

            {{ csrf_field() }}

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
    </div>



@endsection
