@extends('admin.parent')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('admin.updateUser', $user->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">User Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="password">User Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter user password">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control select2">
                                    <option value="admin">Admin</option>
                                    <option value="author">Author</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                            <a href="{{route('admin.viewUsers')}}" class="btn btn-info">Go To index</a>
                            <button type="submit" class="btn btn-primary">Store</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection