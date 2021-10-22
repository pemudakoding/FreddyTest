@extends('layouts.auth')

@section('content')
  <main class="row justify-content-center mt-5 py-5">
    <div class="col-7">
      <div class="card">
        <div class="card-header py-3">
          Login
        </div>
        <div class="card-body">
          <form action="/login" method="post">
            @csrf

            <div class="row mb-3 ">
              <label for="email" class="col-sm-4 col-form-label">Email/Username</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email">
                @error('email')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-sm-4 col-form-label">Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberme" name="remember_me">
                  <label class="form-check-label" for="rememberme">
                    Remember Me
                  </label>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
