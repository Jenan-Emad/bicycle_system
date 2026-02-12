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
              <form method="POST" action="{{ route('admin.updateFAQ', $faq->id) }}" >
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}"> 
                  </div>
                  <div class="form-group">
                    <label for="answer">Answer</label>
                    <input type="text" class="form-control" id="answer" name="answer" value="{{ $faq->answer }}">
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2" id="category" name="category" width: 50%;>
                        <option value="personal_dep">Personal Department</option>
                        <option value="business_dep">Business Department</option>
                        <option value="support_dep">Support Department</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="count">Count</label>
                    <input type="number" class="form-control" id="count" name="count" value="{{ $faq->count }}" >
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    
                  <a href="{{ route('admin.viewFAQs') }}" class="btn btn-info">Go To index</a>
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