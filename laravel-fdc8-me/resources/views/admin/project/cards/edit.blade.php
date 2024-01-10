
@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title', 'Cards Edit')

@section('content')
    <a href="{{ url('/admin/cards') }}" class="btn btn-primary">Go to Back</a>
    <hr>
    <form action="{{ url('admin/cards/' . $cards->id) }}" method="post" novalidate ">
        @method('put')
        @csrf
        <input type="hidden" name="id" value="{{$cards->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name' , $cards->name) }}">
            @if ($errors->has('name'))
                <p class="text-danger mt-1">{{ $errors->first('name') }}</p>
            @endif
        </div>



        <div class="mb-3">
            <label class="form-label">price</label>
            <input type="text" class="form-control" name="price" value="{{ old('price' , $cards->price) }}">
            @if ($errors->has('price'))
                <p class="text-danger mt-1">{{ $errors->first('price') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" name="qty" value="{{ old('qty' , $cards->qty) }}">
            @if ($errors->has('qty'))
                <p class="text-danger mt-1">{{ $errors->first('qty') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">HP</label>
            <input type="number" class="form-control" name="hp" value="{{ old('hp' , $cards->hp) }}">
            @if ($errors->has('hp'))
                <p class="text-danger mt-1">{{ $errors->first('hp') }}</p>
            @endif
        </div>

         <div class="mb-3">
            <label class="form-lable"> Status</label>
            <select class="form-select" name="status">
                <option selected value="select">select</option>
                <option value="selected">selected</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-danger mt-1">{{ $errors->first('status') }}</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="">SuperType Name</label>
            <select class="form-select" name="superType_id">
                @foreach ($supertypes as $superType)
                    <option value="{{ $superType->id }}">
                        {{ old('superType_id', $cards->subperType_id) == $superType->id ? 'selected' : '' }}
                        {{ $superType->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label> SubType Name</label>
            <select class="form-select" name="subType_id">
                @foreach ($subtypes as $subType)
                    <option value="{{ $subType->id }}"{{ old('subType_id' , $cards->subType_id) == $subType->id ? 'selected' : '' }}>
                        {{ $subType->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label> Type Name</label>
            <select class="form-select" name="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"{{ old('type_id' , $cards->type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label> Resistance</label>
            <select class="form-select" name="resistance_id">
                @foreach ($resistances as $resistance)
                    <option value="{{ $resistance->id }}"
                        {{ old('resistance_id' , $cards->resistance_id) == $resistance->id ? 'selected' : '' }}>
                        {{ $resistance->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label> Weakness</label>
            <select class="form-select" name="weakness_id">
                @foreach ($weaknesses as $weakness)
                    <option value="{{ $weakness->id }}"
                        {{ old('weakness_id' , $cards->weakness_id) == $weakness->id ? 'selected' : '' }}>
                        {{ $weakness->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection

@section('script')
<script>
    $(document).ready(()=>{
        $('[name="name"]').focus();
    });
</script>
@endsection
