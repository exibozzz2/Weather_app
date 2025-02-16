@extends("layout")

@section("pageTitle")
    Add City
@endsection

@section("content")

    <div class="col-12 d-flex justify-content-center align-items-center bg-img">
        <form class="mb-3 mt-3 col-12 d-flex justify-content-center align-items-center flex-column border-radius rounded text-white " method="POST" action="{{ route("addNewCity") }}">

            {{ csrf_field() }}
            @if($errors->any())
                <p class="bg-danger">Error: {{ $errors->first() }}</p>
            @endif

            <h1>Add new City </h1>
            <div class="form-group mb-1 col-5 ">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control col-lg-10 border-dark" id="city" aria-describedby="Enter city name " placeholder="Enter city name" value="{{old("city")}}" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="weather">Current Weather</label>
                <input type="text" name="weather" class="form-control border-dark" id="weather" aria-describedby="Enter current weather" placeholder="Enter current weather" value="{{old("weather")}}" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="current">Current temperature</label>
                <input type="number" name="current" class="form-control border-dark" id="current" aria-describedby="Enter current temperature" placeholder="Enter current temperature" value="{{old("current")}}" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="minimum">Minimal temperature</label>
                <input type="number" name="minimum" class="form-control border-dark" id="minimum" aria-describedby="Enter minimum temperature " placeholder="Enter minimum temperature" value="{{old("minimum")}}" required>
            </div>

            <div class="form-group mb-1 col-5">
                <label for="maximum">Maximum temperature</label>
                <input type="number" name="maximum" class="form-control border-dark" id="maximum" aria-describedby="Enter maximum temperature " placeholder="Enter maximum temperature" value="{{old("maximum")}}" required>
            </div>

            <button type="submit" class="btn btn-primary m-3">Add City</button>
        </form>
    </div>



@endsection
