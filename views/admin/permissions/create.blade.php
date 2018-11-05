@extends('oxygencms::admin.layout')

@section('title', 'Create Permission')

@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center mb-3">
            <h1>Create Permission</h1>
        </div>
    </div>

    <form action="{{ route('admin.permission.store') }}" method="POST">
        {!! csrf_field() !!}

        @include('oxygencms::admin.permissions._form-fields')

        <button class="btn btn-primary" type="submit">Save</button>
    </form>

@endsection