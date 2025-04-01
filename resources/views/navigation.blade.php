@php use Illuminate\Support\Facades\Auth; @endphp


<div class="d-flex justify-content-around align-items-center bg-nav p-2 border-bottom-white nav-rounded">
    <div class="col-3">
        <a href="{{route("getAllCities")}}" class="text-decoration-none text-white"><h3>T O P | W E A T H E R</h3></a>
    </div>
    <a href="{{ route("getAllCities") }}" class="text-decoration-none text-white">All Cities</a>
    <a href="{{ route("forecasts") }}" class="text-decoration-none text-white">Forecasts</a>
    <a href="{{ route("todayForecast") }}" class="text-decoration-none text-white">Current</a>
    <a href="{{ route("addCity") }}" class="text-decoration-none text-white">Add City</a>
    <a href="{{ route("addForecast") }}" class="text-decoration-none text-white">Add Forecast</a>
    <a href="{{ route("menageCities") }}" class="text-decoration-none text-white">Menage Cities</a>
    <a href="{{ route("searchCities") }}" class="text-decoration-none text-white">Search</a>

    <div class="dropdown">
        <button class="btn bg-card dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
        </button>
        <ul class="dropdown-menu">
            @if(Auth::check())
                <li class=""><a href="{{route("login")}}" class="text-decoration-none"><button class="dropdown-item nav-choice border-custom">Logout</button></a></li>
            @else
                <li><a href="{{route("login")}}" class="text-decoration-none"><button class="dropdown-item nav-choice border-custom">Login</button></a></li>
            @endif

                <li><a href="{{route("dashboard")}}" class="text-decoration-none"><button class="dropdown-item nav-choice border-custom">Dashboard</button></a></li>

        </ul>
    </div>

</div>
