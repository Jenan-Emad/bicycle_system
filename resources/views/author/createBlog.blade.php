@extends('author.parent')

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
                    <form method="POST" action="{{route('author.storeBlog')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Blog Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter blog title">
                            </div>
                            <div class="form-group">
                                <label for="description">Blog description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Enter blog description">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" name="category"
                                    placeholder="Enter category">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                            <a href="{{route('author.viewBlogs')}}" class="btn btn-info">Go To index</a>
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
