  @extends('layouts.admin.app')

@section('content')
<section class="content">
 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">branch</h2>

                <div class="card-tools">
                 <a href="{{ route('branch.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <td >SL</td>
                      <td >Name</td>
              
                      <td >Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($branchs as $p)
            <tr>
                <td>{{ $p->branch_id }}</td>
                <td>
                    
                        
                        {{ $p->branchname }}
                </td>
                 
                
                <td>
                    <form action="{{ route('branch.destroy' ) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="post">
                        <input type="hidden" name="id" value="{{$p->branch_id}}">
                        <div class="btn-group">
                           <a href="{{ route('branch.edit', $p->branch_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
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