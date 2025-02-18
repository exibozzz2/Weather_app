@extends("layout")

@section("pageTitle")
    Error
@endsection

@section("content")

    <div class="bg-img d-flex align-items-center justify-content-center">

        <div class="error-container bg-card" data-tilt>
            <div class="error-code">403</div>
            <div class="error-message">Access Denied</div>
            <p class="text-muted">You do not have permission to view this page.</p>
            <a href="{{ url('/') }}" class="btn btn-info border-custom">Go to Homepage</a>
            <a href="{{ url('/login') }}" class="btn btn-danger border-custom">Admin?</a>

        </div>

    </div>

@endsection
