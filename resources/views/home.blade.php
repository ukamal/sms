@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Welcome to our School Project</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        </div>
    </div>
@endsection
