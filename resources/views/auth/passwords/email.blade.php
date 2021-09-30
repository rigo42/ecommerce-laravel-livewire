@extends('client.layouts.main')

@section('title', 'Recuperar contraseña')

@section('content')

<div class="page-content">
    <div class="video-banner video-banner-bg bg-image text-center" style="background-image: url(https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)">
        <div class="container">
            <h3 class="video-banner-title h1 text-white"><span>Recuperación de contraseña</span><strong></strong></h3>
        </div>
    </div>
</div><!-- End .page-content -->

<div class="login-page pb-8 pb-md-12 pt-lg-4" >
    <div class="container">
        <div class="form-box">
            <div class="form-tab">
                <ul class="nav nav-pills nav-fill" >
                    <li class="nav-item">
                        <span class="nav-link">¿Contraseña olvidada?</span>
                    </li>
                </ul>
                <div class="tab-content">
                    <form action="{{ route('password.email') }}" method="post" class="pt-4">
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
                    </form>
                    <div class="form-choice">
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <a href="#" class="btn btn-g btn-outline-primary btn-round">
                                    Enviar correo
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-6 -->
                        </div><!-- End .row -->
                        
                    </div><!-- End .form-choice -->
                   
                </div><!-- End .tab-content -->
            </div><!-- End .form-tab -->
        </div><!-- End .form-box -->
    </div><!-- End .container -->
</div><!-- End .login-page section-bg -->

@endsection
