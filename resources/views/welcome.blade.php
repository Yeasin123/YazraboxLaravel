<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <title>YazraBox Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
   
  </head>
  <body>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('addeditCategory')}}" class="btn btn-success">Category Add</a>
    </div>
  </div>
    <div class="row">

      <div class="col-md-12">
         <div class="card-body">
            <div class="table-responsiv">
                <table id="geniustable" class="table table-hover table-bordered text-center dt-responsive mt-2" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ __("Category Name") }}</th>
                            <th>{{ __("Main Shop") }}</th>
                            <th>{{ __("Image") }}</th>
                            <th>{{ __("Icon") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th>{{ __("Action") }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
         </div>
      </div>
    </div>  
 </div>     


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-2.2.4.min.js" ></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <script src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js" type="text/javascript"></script>


   <script type="text/javascript">
    var table = $('#geniustable').DataTable({
        ordering: false,
        processing: false,
        serverSide: true,
        ajax: '{{ route('category') }}',

        columns: [
                // { data: 'DT_RowIndex', name: 'index' , searchable: false, orderable: false},
                { data: 'name', name: 'name' },
                { data: 'mainshop_id', name: 'mainshop_id' },
                { data: 'image', name: 'image' ,
              
                render: function( data, type, full, meta ) {
                    return "<img src=\"{{asset('images/category/')}}"+'/' + data + "\" height=\"50\"/>";
                    }
                },
                { data: 'icon', name: 'icon',
              
              render: function( data, type, full, meta ) {
                    return "<img src=\"{{asset('images/category/')}}"+'/' + data + "\" height=\"50\"/>";
                    } 
                },
                { data: 'status', name: 'status' },
                { data: 'action', searchable: false, orderable: false }

              ],
        });

        function deleteId(e) {
          var url = '{{ route("ctgdelete", ":id") }}';
          url = url.replace(':id', e);
          console.log(url);
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              url    : url,
              type   : "POST",
              success: function(data) {
                  $('#geniustable').DataTable().ajax.reload();
              }
          })
      }
   </script>
  </body>
</html>