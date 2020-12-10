  @extends('layouts.admin.app')

@section('content')
<section class="content">
 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">user</h2>

                <div class="card-tools">
                 <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 1000px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <td >SL</td>
                      <td >Name</td>
              
                      <td >Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $p)
            <tr>
                <td>{{ $p->user_id }}</td>
                <td>
                    
                        
                        {{ $p->name }}
                </td>
                 
                
                <td>
                    <form action="{{ route('user.destroy' ) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="post">
                        <input type="hidden" name="id" value="{{$p->user_id}}">
                        <div class="btn-group">
                           <a href="{{ route('user.edit', $p->user_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </section>
        @endsection