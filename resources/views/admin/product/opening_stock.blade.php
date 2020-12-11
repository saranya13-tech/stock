@extends('layouts.admin.app')

@section('content')

<script src="https://bossanova.uk/jexcel/v4/jexcel.js"></script>
<link rel="stylesheet" href="https://bossanova.uk/jexcel/v4/jexcel.css" type="text/css" />
<script src="{{ asset('firebase.js') }}"></script>

<script src="{{ asset('suite.js') }}"></script>
<link rel="stylesheet" href="{{ asset('suite.css') }}" type="text/css" /> 

 <section class="content "  id="spreadsheet" style="width: 100%">
        @include('layouts.errors-and-messages')
       
                    {{ csrf_field() }}
                   
                       <h2>Stock</h2>
                       
                       
                        
       
      
  
                  
                
</section>

 <p style="margin-left: 20px"><button class="btn btn-success btn-sm" id='download'>Export  as CSV</button></p>
 <br>
  <script>
       var changed = function(instance, cell, x, y, value) {
       var token= document.querySelector('input[name=_token]').value;  
       var cellName = jexcel.getColumnNameFromId([x,y]);
       var cellName1 = jexcel.getColumnNameFromId([x-1,y]);
       var v= table1.getRowData(y);

        var item = v[0];
         
       var stock  = v[2];
        

            
            $.ajax({
              type: "POST",
              url: "{{ route('update2') }}",
              data: {
                        "_token": token,
                        "item": item,
                        "stock": stock,
                          
                        },
                   
                    success: function (data) {
                        
                   
              location.reload();
                       
                    }

            });
          
     }
   data= <?php echo  json_encode($products)?>;
   console.log(data);
var table1= jexcel(document.getElementById('spreadsheet'), {
    minDimensions: [3,10],
    data:data,
    tableWidth: "100%",
    search:true,
    pagination:25,
      tableOverflow: true,
        tableHeight: "700px",
    paginationOptions:[25,50,100,200,500,1000,3000],
    columns: [
    {
            type: 'numer',
            title:'ID',
            width:40,
             readOnly:true,

        },
        {
            type: 'text',
            title:'Product',
            width:250,
             readOnly:true,
        },
        
        {
            type: 'number',
            title:'opening stock',
            width:90,
            
        },
      
     ],
       style: {
        id:'background-color: orange;',
        B:'background-color: orange;',
    },
    filters: true,
      columnSorting:true,
     allowComments:true,
    onchange: changed,

    
});


var all = document.getElementsByClassName('jexcel_search');
for (var i = 0; i < all.length; i++) {
  all[i].style.width = '850px';
}
</script>
<script>
document.getElementById('download').onclick = function () {

  var data = "";
    var tableData = [];
    var rows = $(".jexcel tr");
    rows.each(function(index, row) {
      var rowData = [];
      $(row).find("th, td").each(function(index, column) {
        rowData.push(column.innerText);
      });
      tableData.push(rowData.join(","));
    });
    data += tableData.join("\n");
    $(document.body).append('<a id="download-link" download="data.csv" href=' + URL.createObjectURL(new Blob(["\ufeff",(data)], {
      type: "data:application/csv;charset=utf-8,"
    })) + '/>');


    $('#download-link')[0].click();
    $('#download-link').remove();
}
</script>
<style>
.jexcel  {
  width:100% !important;
}
</style>
@endsection
