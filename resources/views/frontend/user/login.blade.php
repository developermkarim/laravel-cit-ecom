@extends('layouts.frontendapp')

@section('frontend-content')

<div class="contrainer">
    <div class="row">
        <section class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                      <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                      <button style="background-color:#3b5998" type="button" class="btn btn-floating mx-1">
                        <i style="font-size:20px;color:white" class="fab fa-facebook-f"></i>
                      </button>

                      <a href="{{ route('google.login') }}"><button style="background-color:#dc4e41" type="button" class="btn btn-floating mx-1">
                        <i style="font-size:20px;color:white" class="fa fa-google-plus-official"></i>
                      </button></a>

                      <button style="background-color: #00405d" type="button" class="btn  btn-floating mx-1">
                        <i style="font-size:20px;color:white" class="fa fa-github"></i>
                      </button>

                      <button style="background-color: #0077b5" type="button" class="btn btn-primary btn-floating mx-1">
                        <i style="font-size:20px;color:white" class="fab fa-linkedin-in"></i>
                      </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                      <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" id="form3Example3" class="form-control form-control-lg"
                      name="email" placeholder="Email">
                      @error('email')
                      <span style="color:red;font-size:17px;margin-top:5px">{{$message}}</span>
                      @enderror
                      <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                      <input type="password" id="form3Example4" class="form-control form-control-lg"
                      name="password" placeholder="Password">
                                @error('password')
                                 <span style="color:red;font-size:17px;margin-top:5px">{{$message}}</span>
                                @enderror
                      <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                      <!-- Checkbox -->
                     {{--  <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                        <label class="form-check-label" for="form2Example3">
                          Remember me
                        </label>
                      </div> --}}
                      <a href="#!" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="submit" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                      <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                          class="link-danger">Register</a></p>
                    </div>

                  </form>
                </div>
              </div>
            </div>

              <!-- Right -->
            </div>
          </section>

    </div>
</div>

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 74578dd66ecbd120ba1d50728d3596c64d76ce47
