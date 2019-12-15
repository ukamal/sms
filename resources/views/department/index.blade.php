@extends('layouts.app')
@section('title','Department')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body text-center">
                    <h2>Department List</h2>
                </div>
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                @endif
                <table id="example" class="table table-striped table-bordered" style="width:100%;text-align: center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->title }}</td>
                            <td>
                                <div class="btn btn-group">
                                <a href="{{ url('department/create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i>&nbsp;Add</a>
                                <a href="{{ url('department/edit',$department->id) }}" class="btn btn-success"><i class="far fa-edit"></i>&nbsp;Edit</a>
                                <form id="delete-form-{{ $department->id }}" method="post" action="{{ url('department/delete',$department->id) }}">
                                    @csrf
                                </form>
                                <a href="" onclick="
                                        if (confirm('Are you sure, You want to Delete this?')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$department->id}}').submit();
                                        } else {
                                        event.preventDefault();
                                        }
                                        " class="btn btn-danger"><i class="far fa-trash-alt"></i>&nbsp;Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection