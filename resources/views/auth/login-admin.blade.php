@extends('layouts.generics')
@section('content')
    <div class="row m-2 justify-content-center">
        <div class="col-5 mt-5">
            <div class="content-box-sign border p-5 border-dark rounded shadow" style="background-color:#f6f7ff">
                <h1 class="fw-bold pb-3 text-center" style="font-size:35px" >Admin Login</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="pb-3">
                        <label for="username" class="form-label text-secondary">Username</label>
                        <input type="text" class="form-control id="username" name="username" aria-describedby="usernameHelp" required>
                    </div>
                    <div class="pb-3">
                        <label for="password" class="form-label text-secondary">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="pb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label text-secondary" for="remember">Remember me</label>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger me-3 pb-0">
                            <p class="text-center">Incorrect Username or Password</p>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary w-100 fw-medium pb-2">Login</button>
                </form>
                <div class="mt-1 text-secondary">
                    Don't have an account? <a href="{{ route('tampilkan.register') }}" style="color: #f75600;">Register here</a>
                </div>
            </div>
        </div>
        <!-- IMAGE -->
        <div class="col-4 ms-1">
            <img src="/assets/img/UniShare-with-Text-2.png" class="img-fluid p-0" alt="s" style="transform:scale(0.7) ">
        </div>
    </div>
@endsection
