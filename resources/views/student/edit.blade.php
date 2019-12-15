@extends('layouts.app')
@section('title','Update Student')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Student {{ $data->id }}</div>

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ url('student/update',$data->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $data->name }}" required autocomplete="name" autofocus>
                                    @error('edit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                           value="{{ $data->phone_number  }}" required autocomplete="phone_number" autofocus>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $data->email }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="roll" class="col-md-4 col-form-label text-md-right">Roll</label>
                                <div class="col-md-6">
                                    <input id="roll" type="text" class="form-control @error('roll') is-invalid @enderror" name="roll"
                                           value="{{ $data->roll }}" required autocomplete="roll" autofocus>
                                    @error('roll')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reg_id" class="col-md-4 col-form-label text-md-right">Registration</label>

                                <div class="col-md-6">
                                    <input id="reg_id" type="text" class="form-control @error('reg_id') is-invalid @enderror" name="reg_id"
                                           value="{{ $data->reg_id }}" required autocomplete="reg_id" readonly autofocus>

                                    @error('reg_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label>

                                <div class="col-md-6">
                                    <select name="department_id" id="department_id" class="form-control{{ $errors->has('department_id') ? 'is-invalid' : '' }}" required>
                                        <option value="">Select One</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}"{{$data->department_id == $department->id ? 'selected' : ''}}>{{$department->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('department_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="class_id" class="col-md-4 col-form-label text-md-right">Class</label>

                                <div class="col-md-6">
                                    <select name="class_id" id="class_id" class="form-control{{ $errors->has('class_id') ? 'is-invalid' : '' }}" required>
                                        <option value="">Select One</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" {{$data->class_id == $class->id ? 'selected' : ''}}>
                                                {{$class->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('class_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('class_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="father_name" class="col-md-4 col-form-label text-md-right">Father's Name</label>

                                <div class="col-md-6">
                                    <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name"
                                           value="{{ $data->father_name  }}" required autocomplete="father_name" autofocus>

                                    @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mother_name" class="col-md-4 col-form-label text-md-right">Mother's Name</label>

                                <div class="col-md-6">
                                    <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name"
                                           value="{{ $data->mother_name }}" required autocomplete="mother_name" autofocus>

                                    @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="present_address" class="col-md-4 col-form-label text-md-right">Present Address</label>
                                <div class="col-md-6">
                                    <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address"
                                           value="{{ $data->present_address }}" required autocomplete="present_address" autofocus>
                                    @error('present_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Permanent Address</label>

                                <div class="col-md-6">
                                    <input id="permanent_address" type="text" class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address"
                                           value="{{ $data->permanent_address }}" required autocomplete="permanent_address" autofocus>

                                    @error('permanent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="home_number" class="col-md-4 col-form-label text-md-right">Home Number</label>

                                <div class="col-md-6">
                                    <input id="home_number" type="text" class="form-control @error('home_number') is-invalid @enderror" name="home_number"
                                           value="{{ $data->home_number }}" required autocomplete="home_number" autofocus>

                                    @error('home_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                <div class="col-md-6">
                                    <input type="file">
                                    <a href="{{ url('studentImg/edit/',$data->id) }}">Image</a>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection