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
    <a href="{{ url('/admin/cards/create') }}" class="btn btn-primary">Create</a>
    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Action</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Qty</th>
                <th>HP</th>
                <th>Status</th>
                <th>Super Type</th>
                <th>Sub Type</th>
                <th>Type</th>
                <th>Resistance</th>
                <th>Weakness</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $card)
                <tr>
                    <td>
                        <a href="{{ url('admin/cards/' . $card->id . '/edit') }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ url('admin/cards/' . $card->id) }}" class="btn btn-success">Show</a>
                        <button class="btn btn-danger" id="delete" data-id="{{ $card->id }}"="">Delete</button>
                    </td>
                    <td>{{ $card->name }}</td>
                    <td><img src="{{ asset('storage/' . $card->photo)}}" width="100px" height="100px" alt=""></td>
                    <td>{{ $card->price }}</td>
                    <td>{{ $card->qty }}</td>
                    <td>{{ $card->hp }}</td>
                    <td>{{ $card->status }}</td>
                    <td>{{ $card->super_type_name }}</td>
                    <td>{{ $card->sub_type_name }}</td>
                    <td>{{ $card->type_name }}</td>
                    <td>{{ $card->resistance_name }}</td>
                    <td>{{ $card->weakness_name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">No cards found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('script')
    <script>
      $(document).ready(()=>{
            showFlashMessage();
            $('#example').DataTable();

            $(document).on('click','#delete',(event)=>{
                let deleteButton = $(event.currentTarget);
                console.log(deleteButton);
                let id = deleteButton.data('id');
                let row = deleteButton.parent().parent();

                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // console.log(result);
                    if (result.isConfirmed) {
                        row.remove();
                        deleteRecord(id);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    }
                })
            });

            function deleteRecord(id){
                $.ajax({
                    type: "DELETE",
                    url: "/admin/cards/" + id,
                    data: {
                        "_token" : "{{ csrf_token() }}"
                    },
                    success: (data)=>{
                        console.log(data);
                    },
                    error: (error)=>{
                        console.log(error);
                    }

                });
            }

            function showFlashMessage(){
                let message = "{{ session()->get('message') }}";
                if(message){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    </script>
@endsection
