@extends('client.layouts.main')

@section('title', 'login')

@section('content')

<div class="page-content">
    <div class="video-banner video-banner-bg bg-image text-center" style="background-image: url(https://images.pexels.com/photos/1090977/pexels-photo-1090977.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)">
        <div class="container">
            <h3 class="video-banner-title h1 text-white"><span>Registro</span><strong></strong></h3>
        </div>
    </div>
</div><!-- End .page-content -->

<div class="login-page pb-8 pb-md-12 pt-lg-4" >
    <div class="container">
        <div class="form-box">
            <div class="form-tab">
                <ul class="nav nav-pills nav-fill" >
                    <li class="nav-item">
                        <span class="nav-link">Resgitro</span>
                    </li>
                </ul>
                <div class="tab-content">
                    <form action="{{ route('register') }}" method="post" class="pt-4">
                        @csrf
                        <div class="form-group">
                            <label for="singin-name-2">Nombre *</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" id="singin-name-2" name="name" required>
                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- End .form-group -->

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

                        <div class="form-group">
                            <label for="singin-password-2">Confirmar contraseña *</label>
                            <input type="password" class="form-control" id="singin-password-2" name="password_confirmation" required>
                            @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- End .form-group -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>Registrarse</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                            
                            <a href="{{ route('login') }}" class="forgot-link">Ir al login</a>
                          
                        </div><!-- End .form-footer -->
                    </form>
                   
                </div><!-- End .tab-content -->
            </div><!-- End .form-tab -->
        </div><!-- End .form-box -->
    </div><!-- End .container -->
</div><!-- End .login-page section-bg -->

@endsection


