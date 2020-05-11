@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers">
                    <h3 class="card-title">Hotel Clients</h3>
                    <a href="{{ route('client.create') }}" class="btn bg-newOjbect float-right">New Client</a>
                </div>
                @if(session('info'))
                    <br>
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                @endif
                <div class="card-body table-responsive">
                    <table id="targetPersonal" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th>LastName </th>
                            <th>UserName</th>
                            <th>E-mail</th>
                            <th>Hotel Account</th>
                            <th>Acction</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->lastname}}</td>
                                    <td>{{$client->username}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->hotel_account}}</td>
                                    <td>
                                        <a href="{{ route('client.edit',$client->id) }}" class="btn btn-success btn-sm" type="submit">Edit</a>
                                        <a href="javascript:document.getElementById('delete-{{$client->id}}').submit()" class="btn btn-danger btn-sm" rol="button" type="submit">Delete</a>
                                        <form id="delete-{{$client->id}}" action="{{ route('client.destroy',$client->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>
    </div>
@endsection