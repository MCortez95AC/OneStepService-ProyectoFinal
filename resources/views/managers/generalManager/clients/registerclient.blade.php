@extends('managers.layout')

@section('content')
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</div>
                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("/client/create") }}' aria-label="{{ __('Register') }}">
                    @endisset

                <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                    <strong> Client created seccessfully.</strong>
                </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                {{-- error throw laravel and show ajax --}}
                                    <span id="msj-error-name" class="text-danger" role="alert" style="display:none">
                                        <strong id="msj-name"></strong>
                                    </span>
                                {{-- Error throw laravel --}}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="msj"></strong>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Room Number</label>
                            <div class="col-md-6">
                                <input id="roomNumber" class="form-control" placeholder="Choose in the right panel" name="roomNumber" value="{{ old('roomNumber') }}" disabled>
                                    <span id="msj-error-roomNumber" class="text-danger" role="alert" style="display:none">
                                        <strong id="msj-roomNumber"></strong>
                                    </span>
                            </div>
                            <div class="col-md-1">
                                <i class="fas fa-arrow-right"></i>
                            </div>

                        </div> 
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Optional">
                                {{-- error throw laravel and show ajax --}}
                                    <span id="msj-error-email" class="text-danger" role="alert" style="display:none">
                                        <strong id="msj-email"></strong>
                                    </span>
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
                                {{-- error throw laravel and show ajax --}}
                                    <span id="msj-error-username" class="text-danger" role="alert" style="display:none">
                                        <strong id="msj-username"></strong>
                                    </span>
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
                            <br>
                            <div class="input-group ">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password ') }}</label>
                                <input id="password" type="text" class="col-md-6 form-control @error('password') is-invalid @enderror" name="password" disabled >
                                <input type="hidden" id="password-confirm" class="col-md-6 form-control" name="password_confirmation" disabled >
                                <span class="input-group-btn">
                                    <button id="gen-button-pass" class="btn btn-default" type="button"><i class="fas fa-redo-alt"></i></button>
                                </span>
                            </div>
                        </div>


                        {{-- buttons --}}
                        <div class="form-group row mt-3 mb-3">
                            <div class="col-md-10 offset-md-4">
                                <button type="button" id="register" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button> 
                                <a href="{{ asset('/admin/clients') }}" class="btn btn-warning">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="button" id="print" href="#{{-- {{ asset('/admin/super/clients') }} --}}" class="btn btn-success" disabled>
                                    {{ __('Print Credentials') }} <i class="fas fa-print"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- Hotel Rooms panel asign --}}
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header bg-table-headers">{{ __('Hotel Rooms') }}</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($rooms as $room)
                                @if($room->available === 1)
                                    <div data-id="{{$room->id}}" class="col-sm-2 roomNumberDiv  border border-dark text-center bg-available " onClick="getRoom(event)">{{$room->room_number}}</div>
                                @else
                                    <div data-id="{{$room->id}}" class="col-sm-2 roomNumberDiv  border border-dark text-center bg-unavailable" onClick="getRoom(event)">{{$room->room_number}}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection