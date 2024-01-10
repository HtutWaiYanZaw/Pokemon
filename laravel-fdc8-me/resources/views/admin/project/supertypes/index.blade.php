@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title', 'Super Types')

@section('content')
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $superType)
            <tr>
                <td> {{$superType->name}} </td>
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
