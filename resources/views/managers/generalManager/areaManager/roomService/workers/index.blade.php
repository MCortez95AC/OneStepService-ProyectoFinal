@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers">
                    <h3 class="card-title">Room Service Workers</h3>
                    <a href="{{ route('worker.rs.create') }}" type="button" class="btn bg-newOjbect float-right">New Worker</a>
                </div>
                {{-- Created product message --}}
                @if(session('info'))
                    <br>
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                @endif
                <div class="card-body  table-responsive">
                    <table id="targetPersonal" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th>LastName </th>
                            <th>DNI</th>
                            <th>Email</th>
                            <th>Is Admin</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($workers as $worker)
                                <tr>
                                    <td>{{$worker->name}}</td>
                                    <td>{{$worker->lastname}}</td>
                                    <td>{{$worker->dni}}</td>
                                    <td>{{$worker->email}}</td>
                                    @if($worker->is_admin == 0)
                                        <td>No</td>
                                    @else
                                        <td>Yes</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('worker.rs.edit',$worker->id) }}" class="btn btn-success btn-sm" type="submit">Edit</a>
                                        <a href="javascript:document.getElementById('delete-{{$worker->id}}').submit()" class="btn btn-danger btn-sm"rol="button" type="submit">Delete</a>
                                        <form id="delete-{{$worker->id}}" action="{{ route('worker.rs.destroy',$worker->id) }}" method="post">
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