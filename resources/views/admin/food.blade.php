@extends('admin.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Food Menu</div>
        <div class="card-body">
            <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="mb-3">
                        <label for="desp" class="form-label">Despcription</label>
                        <textarea name="desp" id="desp" cols="30" rows="10" class="form-control"></textarea>
                       </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            User List
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <tr>
                    @foreach ($foods as $food)
                    <tr>
                        <td>{{ $food->id }}</td>
                        <td>{{ $food->title }}</td>
                        <td>{{ $food->description }}</td>
                        <td>{{ $food->price }}</td>
                        <td>
                           <img src="{{ asset('upload/food/') }}/{{ $food->image }}" alt="">
                        </td>
                        <td><a href="" class="btn btn-danger">Delete</a></td>

                    </tr>

                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
