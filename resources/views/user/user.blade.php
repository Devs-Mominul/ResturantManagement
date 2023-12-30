@extends('admin.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            User List
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->user_type==1)
                            <a href="" class="btn btn-info">Not Available</a>
                            @else
                            <a href="{{ route('user.remove',$user->id) }}" class="btn btn-danger">Delete</a>


                            @endif
                        </td>

                    </tr>

                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
