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
                <h3 class="card-title">Discount Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.storeService') }}" >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Service Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"> 
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" >
                  </div>
                  <div class="form-group">
                    <label for="price">price</label>
                    <input type="number" class="form-control" id="price" name="price">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    
                  <a href="{{ route('admin.viewServices') }}" class="btn btn-info">Go To index</a>
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