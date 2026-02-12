@extends('admin.parent')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.storeBrand') }}" >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Brand Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter brand name">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    
                  <a href="{{ route('admin.viewBrands') }}" class="btn btn-info">Go To index</a>
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