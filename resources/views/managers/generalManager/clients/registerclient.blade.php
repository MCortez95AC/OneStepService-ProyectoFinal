@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header bg-gradient-blue"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</div>
                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("register/client") }}' aria-label="{{ __('Register') }}">
                    @endisset

                    <div id="client-created" class="alert alert-success alert-dismissible d-none" role="alert" >
                        <strong> Client created successfuly </strong>
                    </div>
                    
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="sel1" class="col-md-4 col-form-label text-md-right">Room Number</label>
                            <div class="col-md-6">
                                <select class="form-control" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Optional">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        {{-- Autogenerate username and password inputs --}}
                        <div class="row">
                            <div class="input-group ">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                <input id="username" type="username" class="col-md-6 form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" disabled >
                                <span class="input-group-btn">
                                    <button id="gen-button-usr" class="btn btn-default" type="button"><i class="fas fa-redo-alt"></i></button>
                                </span>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group ">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password ') }}</label>
                                <input id="password" type="text" class="col-md-6 form-control @error('password') is-invalid @enderror" name="password" disabled >
                                <span class="input-group-btn">
                                    <button id="gen-button-pass" class="btn btn-default" type="button"><i class="fas fa-redo-alt"></i></button>
                                </span>
                            </div>
                        </div>
                                <input type="hidden" id="password-confirm" class="col-md-6 form-control" name="password_confirmation" disabled >
                        {{-- buttons --}}
                        <div class="form-group row mt-3 mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="register" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button> 
                                <a href="{{ asset('/admin/super/clients') }}" class="btn btn-warning">
                                    {{ __('Cancel') }}
                                </a>
                                <a href="#{{-- {{ asset('/admin/super/clients') }} --}}" class="btn btn-success">
                                    {{ __('Print Credentials') }} <i class="fas fa-print"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection