@extends('admin.layout.template2')

@section('content')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-medium-emphasis">Masuk ke dalam dashboard</p>
				  <form method="POST" action="{{ route('login') }}">
				  @csrf
                  <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                      </svg></span>
                    <input class="form-control" type="text" name="email" placeholder="Email">
                  </div>
                  <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                      </svg></span>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <div class="col-6 text-end">
                      <!--button class="btn btn-link px-0" type="button">Lupa password?</button-->
                    </div>
                  </div>
				  </form>
                </div>
              </div>
              <!--div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                  <div>
                    <h2>Sign up</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <button class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</button>
                  </div>
                </div>
              </div-->
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
