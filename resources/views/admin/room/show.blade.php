@extends('admin.layouts.app',['panel' => 'Room','page' => 'Detail'])

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <tr>
                    <th>Room No. </th>
                    <td>{{ $data['row']->roomNo }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $data['row']->room_category->category }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $data['row']->price }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $data['row']->status }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <img src="{{ asset('images/' . $data['row']->image) }}"
                            class="img-fluid" width="100px">
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $data['row']->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $data['row']->updated_at }}</td>
                </tr>
            </table>
        </div>
        <!-- /.col -->
    </div>
@endsection
