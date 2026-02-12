@extends('admin.parent')

@section('content')
 <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-footer">
                  <a href="{{ route('admin.createFAQ') }}" class="btn btn-primary">create</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Department</th>
                      <th>Count</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($faqs as $faq)
                        <td>{{ $faq->id }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>{{ $faq->department }}</td>
                        <td>{{ $faq->count }}</td>
                        <td>
                            <a href="{{ route('admin.editFAQ', $faq->id) }}" type="button" class="btn btn-info">Edit</a>
                            <form action="{{ route('admin.deleteFAQ', $faq->id) }}" method="POST"
                                        style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
@endsection