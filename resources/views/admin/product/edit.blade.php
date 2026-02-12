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
                <h3 class="card-title">Product Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.updateProduct', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                  </div>
                  <div class="form-group">
                    <label for="img_url">Product Image</label>
                    <input type="file" class="form-control" id="img_url" name="img_url" value="{{ $product->img_url }}">
                  </div>
                  <div class="form-group">
                    <label for="description">Product Stock</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
                  </div>
                  <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                  </div>
                  <div class="form-group">
                    <label for="stock">Product Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
                  </div>
                  <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" id="category_id" name="category_id" width: 100%;>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Discount percentage</label>
                  <select class="form-control select2" id="discount_id" name="discount_id" width: 100%;>
                    @foreach($discounts as $discount)
                    <option value="{{ $discount->id }}">{{ $discount->percentage }}%</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Brand </label>
                  <select class="form-control select2" id="brand_id" name="brand_id" width: 100%;>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Store</button>
                  <a href="{{ route('admin.viewProducts') }}" class="btn btn-info">Go To Index</a>
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