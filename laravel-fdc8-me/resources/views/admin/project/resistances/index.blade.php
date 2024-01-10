@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title', 'Resistance')

@section('content')
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $resistance)
            <tr>
                <td> {{$resistance->name}} </td>
                <td><img src="{{ asset('storage/' . $resistance->photo)}}" width="100px" height="100px" alt=""></td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            new DataTable('#example');
        });
    </script>
@endsection
