@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title', 'Cards')

@section('content')

    <table id="example" class="display" style="width:100%">
        <tbody>

                <tr>
                    <td>Name</td>
                    <td>{{ $card->name }}</td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><img src="{{ asset('storage/' . $card->photo) }}" width="100px" height="100px" alt=""></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>{{ $card->price }}</td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>{{ $card->qty }}</td>
                </tr>
                <tr>
                    <td>Hp</td>
                    <td>{{ $card->hp }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $card->status }}</td>
                </tr>
                <tr>
                    <td>Super Type</td>
                    <td>{{ $card->super_type_name }}</td>
                </tr>
                <tr>
                    <td>Sub Type</td>
                    <td>{{ $card->sub_type_name }}</td>
                </tr>
                <tr>
                    <td>Type Name</td>
                    <td>{{ $card->type_name }}</td>
                </tr>
                <tr>
                    <td>Resistance</td>
                    <td>{{ $card->resistance_name }}</td>
                </tr>
                <tr>
                    <td>Weakness</td>
                    <td>{{ $card->weakness_name }}</td>
                </tr>
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
