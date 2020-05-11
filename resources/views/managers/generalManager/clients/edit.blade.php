@extends('managers.layout')

@section('content')
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers">Update</div>
                <div class="card-body">
                    <form  action="{{ route('client.update', $client->id) }}"  method="POST"  aria-label="{{ __('Update') }}">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $client->name }}" required autocomplete="name" autofocus>
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('LastName*') }}</label>
                        <div class="col-md-6">
                            <input id="lastname" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $client->lastname }}" required autocomplete="name" autofocus>
                            <span id="msj-error-lastName" class="text-danger" role="alert" style="display:none">
                                <strong id="msj-lastName"></strong>
                            </span>
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Room Number</label>
                            <div class="col-md-6">
                                <input id="roomNumber" class="form-control" placeholder="Choose in the right panel" name="roomNumber" value="{{ $historic->room_id }}" disabled>
                                <span class="text-danger">{{$errors->first('roomNumber')}}</span>
                            </div>
                            <div class="col-md-1">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <input type="hidden" name="oldRoom" value="{{ $historic->room_id  }}">
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $client->email }}" autocomplete="email" placeholder="Optional">
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                        </div>

                        {{-- buttons --}}
                        <div class="form-group row mt-3 mb-3">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ asset('/admin/clients') }}" class="btn btn-warning">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Hotel Rooms panel asign --}}
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers">{{ __('Hotel Rooms') }}</div>
                <span class="text-danger mt-2 ml-3">{{$errors->first('room')}}</span>
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
