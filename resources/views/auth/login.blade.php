@extends('client.layouts.main')

@section('title', 'login')

@section('content')

<div class="page-content">
    <div class="video-banner video-banner-bg bg-image text-center" style="background-image: url(https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)">
        <div class="container">
            <h3 class="video-banner-title h1 text-white"><span>Inicia sesión</span><strong>Ahorra tiempo después</strong></h3>
        </div>
    </div>
</div><!-- End .page-content -->

<div class="login-page pb-8 pb-md-12 pt-lg-4" >
    <div class="container">
        <div class="form-box">
            <div class="form-tab">
                <ul class="nav nav-pills nav-fill" >
                    <li class="nav-item">
                        <span class="nav-link">Identificate</span>
                    </li>
                </ul>
                <div class="tab-content">
                    <form action="{{ route('login') }}" method="post" class="pt-4">
                        @csrf
                        <div class="form-group">
                            <label for="singin-email-2">Correo *</label>
                            <input type="text" value="{{ old('email') }}" class="form-control" id="singin-email-2" name="email" required>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="singin-password-2">Contraseña *</label>
                            <input type="password" value="{{ old('password') }}" class="form-control" id="singin-password-2" name="password" required>
                            @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>Iniciar sesión</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}  class="custom-control-input" id="signin-remember-2">
                                <label class="custom-control-label" for="signin-remember-2">Recordar</label>
                            </div>
                            
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-link">¿Contraseña olvidada?</a>
                            @endif
                        </div><!-- End .form-footer -->
                    </form>
                    <div class="form-choice">
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <a href="#" class="btn btn-g btn-outline-primary btn-round">
                                    Continuar como invitado
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-6 -->
                        </div><!-- End .row -->
                        <p class="text-center pt-5"><a href="{{ route('register') }}">Registrarme</a></p>
                    </div><!-- End .form-choice -->
                   
                </div><!-- End .tab-content -->
            </div><!-- End .form-tab -->
        </div><!-- End .form-box -->
    </div><!-- End .container -->
</div><!-- End .login-page section-bg -->

@endsection


