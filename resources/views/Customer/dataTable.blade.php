@extends('layout.default')

@section('styles')
  <link href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')

<div class="wrapper">
  
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Country</th>
                    <th>state</th>
                    <th>Country code</th>
                    <th>Phone num.</th>                
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($customer as $value)
                    <tr>
                      <td>{{$value->country}}</td>
                      <td>{{$value->state}}</td>
                      <td>{{$value->countryCode}}</td>
                      <td>{{$value->phoneNum}}</td>                      
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Country</th>
                    <th>state</th>
                    <th>Country code</th>
                    <th>Phone num.</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  <footer class="main-footer">    
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@section('mainscripts')
  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}" type="text/javascript"></script>


@endsection

<!-- DataTables  & Plugins -->


@section('scripts')
<script>
  $(document).ready(function() {
      $('#example1').DataTable( {
        "iDisplayLength": 5,      
        "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],      
          initComplete: function () {
            
                this.api().columns().every( function (e) {
                      var column = this;                    
                      filter = [0,1];
                      if(filter.includes(e)){
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
        
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        });

                      }
                    
                } );
            
          }
      } );
  } );
</script>
@endsection
@endsection
