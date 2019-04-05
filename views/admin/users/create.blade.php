@extends('oxygencms::admin.layout')

@section('title', 'Create User')

@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center mb-3">
            <h1>Create User</h1>
        </div>
    </div>

    <form action="{{ route('admin.user.store') }}" method="POST">
        {!! csrf_field() !!}

        @include('oxygencms::admin.users._form-fields')

        <button class="btn btn-primary" type="submit">Create</button>
    </form>

    <media-uploads class="mt-3"></media-uploads>

@endsection