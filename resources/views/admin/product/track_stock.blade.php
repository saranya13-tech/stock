@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
       
            <div class="box">
                <div class="box-body">
                      <h2> <i class="fa fa-file"></i> Report</h2>
                      <bR>
                      <form action="{{ route('track') }}" method="post" class="form" >
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group row">
                             <label class="col-md-4 col-form-label">Date From</label>
                              <div class="col-md-8">
                                @if($date)
                             
                              
                               
                               <input type="date" class="form-control dpd1" name="date_from" id="from"  placeholder="<?php echo 'Date To'; ?>" value="{{$date['date1']}}" required>
                              
                              @endif
                               @if(!$date)
                                 <input type="date" class="form-control dpd1" name="date_from" id="from"  placeholder="<?php echo 'Date To'; ?>"  required>
                                @endif
                               
                              </div>
                             </div>
                            </div>
                            <div class="col-md-3">
                             <div class="form-group row">
                             <label class="col-md-4 col-form-label">Date To</label>
                              <div class="col-md-8">
                                 @if($date)
                                
                                <input type="date" class="form-control dpd2" name="date_to" id="to" placeholder="<?php echo "Date to" ?>" value="{{$date['date2']}}"  required>
                               
                                @endif
                                @if(!$date)
                                <input type="date" class="form-control dpd2" name="date_to" id="to" placeholder="<?php echo "Date to" ?>"   required>
                                @endif

                              </div>
                             </div>
                            </div>
                            
                        <div class="col-md-2">
                               <button type="submit" style="margin-left:30px;"  id="show" name="submit" class="btn btn-info range_submit align-right">Show</button>
                        
                            </div>

                      </div>
                      
                        </form>

 <p style="margin-left: 20px;text-align:  right;"><button class="btn btn-success btn-sm" id='download'>Export as CSV</button></p>
                     @if($report)
                     <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Date</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($report as $new)
                        <tr>
                            <td>{{$new->item_id}}</td>
                            <td>{{$new->item_name}}</td>
                            <td>{{$new->type}}</td>
                            <td>{{$new->quantity}}</td>
                            <td>{{$new->created_at}}</td>
                           
                            
                        </tr>                    
                        @endforeach
                       
                                          
                                         
                        
                    </tbody>
                </table> 
                       
                </div>
                  
                
            </div>
            {{$report->links()}}
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
    <script>
document.getElementById('download').onclick = function () {
var test_array =<?php echo json_encode($report)?>;
var jsonObject = JSON.stringify(test_array);

            // Display JSON
            $('#json').text(jsonObject);

            // Convert JSON to CSV & Display CSV
      
   


           var csv = ConvertToCSV(jsonObject);  



    $(document.body).append('<a id="download-link" download="data.csv" href=' + URL.createObjectURL(new Blob(["\ufeff",(csv)], {
      type: "data:application/csv;charset=utf-8,"
    })) + '/>');


    $('#download-link')[0].click();
    $('#download-link').remove();
}
 function ConvertToCSV(objArray) {
            var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
            var str = '';

            for (var i = 0; i < array.length; i++) {
                var line = '';
                for (var index in array[i]) {
                    if (line != '') line += ','

                    line += array[i][index];
                }

                str += line + '\r\n';
            }

            return str;
        }

     
</script>
@endsection