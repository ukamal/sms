@extends('layouts.app')
@section('title','Student List')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card-body text-center">
                    <h2>Student List || <a href="{{ url('student/create') }}">Add Student</a></h2>
                </div>
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                @endif
                <table id="example" class=" table-striped table-bordered" style="width:100%;text-align: center">
                    <thead>
                    <tr>

                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Image</th>
                        <th scope="col">phone number</th>
                        <th scope="col">email</th>
                        <th scope="col">roll</th>
                        <th scope="col">reg: id</th>
                        <th scope="col">department id</th>
                        <th scope="col">class id</th>
                        <th scope="col">father name</th>
                        <th scope="col">mother name</th>
                        <th scope="col">present address</th>
                        <th scope="col">permanent address</th>
                        <th scope="col">home number</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td><img style="width: 100%" src="{{url('image/student/'.$data->image)}}" alt=""></td>
                            <td>{{ $data->phone_number }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->roll }}</td>
                            <td>{{ $data->reg_id }}</td>
                            <td>{{ $data->department->title }}</td>
                            <td>{{ $data->class->title }}</td>
                            <td>{{ $data->father_name }}</td>
                            <td>{{ $data->mother_name }}</td>
                            <td>{{ $data->present_address }}</td>
                            <td>{{ $data->permanent_address }}</td>
                            <td>{{ $data->home_number }}</td>
                            <td>
                                <div class="btn btn-group">
                                <a href="{{ url('student/create') }}" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i>&nbsp;Add</a>
                                <a href="{{ url('student/edit',$data->id) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i>&nbsp;Edit</a>

                                <form id="delete-form-{{ $data->id }}" method="post" action="{{ url('student/delete',$data->id) }}">
                                    @csrf
                                </form>
                                <a href="" onclick="
                                        if (confirm('Are you sure, You want to Delete this?')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$data->id}}').submit();
                                        } else {
                                        event.preventDefault();
                                        }
                                        " class="btn btn-warning btn-sm"><i class="far fa-trash-alt"></i>&nbsp;Delete</a>
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