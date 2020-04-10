@extends('layouts.app')

@section('content')
    <main class="login">
        <!-- Carousel -->
    <section class="login__left">
        <div id="loginCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="hover">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#loginCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#loginCarousel" data-slide-to="1"></li>
            <li data-target="#loginCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
            <div class="background-overlay"></div>
            <div class="slide" style="background-image:url({{asset("/images/login-carousel/national-museum-of-art-of-catalunya.jpg")}});background-size:cover;"> </div>
            <div class="carousel-caption">
                <h1 class="slide__title">National Museum</h1>
                <p class="slide__text">The quality or state of being active.</p>
                <a href="#" class="slide__button">Read More</a>
            </div>
            </div>
            <div class="carousel-item">
            <div class="background-overlay"></div>
            <div class="slide" style="background-image:url({{asset("/images/login-carousel/sagrada-familia.jpg")}});background-size:cover;"></div>
            <div class="carousel-caption">
                <h1 class="slide__title">Sagrada Familia</h1>
                <p class="slide__text">Oral exchange of sentiments, observations, opinions, or ideas </p>
                <a href="#" class="slide__button">Read More</a>
            </div>
            </div>
            <div class="carousel-item">
            <div class="background-overlay"></div>
            <div class="slide" style="background-image:url({{asset("/images/login-carousel/arc-de-triumf.jpg")}});background-size:cover;"></div>
            <div class="carousel-caption">
                <h1 class="slide__title">Arc De Triomf</h1>
                <p class="slide__text">A specified task or amount of work assigned or undertaken.</p>
                <a href="#" class="slide__button">Read More</a>
            </div>
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#loginCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
                            </a>
        <a class="carousel-control-next" href="#loginCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
                            </a>
        </div>
    </section>
    <!-- Login -->
    <section class="login__right">
        <div class="panel">
        <article class="panel__header">
            <div class="header__brand">
                <h2 href="" class="brand-link">
                    <img src="{{ asset('./images/logo/logo2.png') }}" width="100" height="auto" alt="1StepService Logo" class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-light">1StepService</span>
                </h2>
            </div>
        </article>
        <!-- Fomulario de login -->
        @isset($url)
            <form method="POST" class="panel__body" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
        @else
            <form method="POST" class="panel__body" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @endisset
            @csrf
            <div class="sign text-center">
            <h4 class="sign__input">{{ isset($url) ? ucwords($url) : ""}}</h4>
            <div class="form-group">
                <input type="text"placeholder="Enter your username" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="option">
                <div class="option__item">
                    <button type="submit" class="button">Continue</button>
                </div>
                <div class="option__item">
                    @if (Route::has('password.request'))
                        <a class="link-text" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="account text-center">
            <p>Don't have an account?</p>
            <a href="#" class="link-text">I want an account</a>
            </div>
        </form>
        <!-- fin -->
        <article class="panel__footer">
            <p class="small">©2019 1StepService</p>
            <ul class="list-unstyle list-inline">
            <li class="list-inline-item small"><a href="#">Privacy Policy</a></li>
            <li class="list-inline-item small"><a href="#">Terms</a></li>
            <li class="list-inline-item small"><a href="#">Help</a></li>
            </ul>
            
        </article>
        </div>
    </section>
    </main>
@endsection