@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','User Edit')

@section('content')

<a href="{{url('admin/users')}}" class="btn btn-primary mb-3">Go to Back</a>

<form action="{{ url('admin/users/' .$data->id ) }}" method="POST" novalidate>

    @csrf
    @method('put')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name',$data->name) }}">
        @if ($errors->has('name'))
            <p class="text-danger mt-1">{{ $errors->first('name') }}</p>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email',$data->email) }}">
        @if ($errors->has('email'))
            <p class="text-danger mt-1">{{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>


</form>
@endsection

@section('script')
@endsection
