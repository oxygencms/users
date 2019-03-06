@extends('oxygencms::admin.layout')

@section('title', 'Edit User')

@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center mb-3">
            <h1>Edit User</h1>
        </div>
    </div>

    <form action="{{ route('admin.user.update', $user) }}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('patch') !!}

        @include('oxygencms::admin.users._form-fields')

        <button class="btn btn-primary" type="submit">Update</button>
    </form>

    <media-uploads mediable_type="{{ get_class($user) }}"
                   mediable_id="{{ $user->id }}"
                   :media="{{ $user->media }}"
                   class="mt-3"
    ></media-uploads>

@endsection