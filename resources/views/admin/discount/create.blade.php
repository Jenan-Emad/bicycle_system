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
              <form method="POST" action="{{ route('admin.storeDiscount') }}" >
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="percentage">Discount Percentage</label>
                    <input type="number" class="form-control" id="percentage" name="percentage" placeholder="Enter percentage"> %
                  </div>
                  <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" >
                  </div>
                  <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    
                  <a href="{{ route('admin.viewDiscounts') }}" class="btn btn-info">Go To index</a>
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