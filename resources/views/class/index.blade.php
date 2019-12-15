@extends('layouts.app')
@section('title','Department')

@section('content')

<div class="card-body text-center">
    <h2>Class List || <a href="{{ url('class/create') }}">Add Class</a></h2>
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
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->title }}</td>
            <td>
                <div class="btn btn-group">
                <a href="{{ url('class/create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i>&nbsp;Add</a>
                <a href="{{ url('class/edit',$data->id) }}" class="btn btn-success"><i class="far fa-edit"></i>&nbsp;Edit</a>
                <form id="delete-form-{{ $data->id }}" method="post" action="{{ url('class/delete',$data->id) }}">
                    @csrf
                </form>
                <a href="" onclick="
                    if (confirm('Are you sure, You want to Delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$data->id}}').submit();
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
@endsection