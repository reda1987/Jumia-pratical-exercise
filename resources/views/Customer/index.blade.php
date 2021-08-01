@extends('layout.default')

@section('styles')
  <link href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Based on JS</h3><br/>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                      <label>Country</label>
                      <select class="form-control" id="sCountry" onchange="filter()">
                        <option value="">SELECT Country</option>   
                        @foreach($country as $value)
                          <option>{{$value}}</option>                        
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group" >
                      <label>valid Phone Number</label>
                      <select class="form-control" id="sState" onchange="filter()">
                        <option value="">SELECT</option>   
                        @foreach($state as $value)
                          <option>{{$value}}</option>                        
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="exampleindex" class="table table-bordered table-striped">
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
                    <tr class="trrow" data-state="{{$value->state}}" data-country="{{$value->country}}">
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
                <div id="nav"></div>
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
@section('scripts')
<script>
  
  function filter() {
      
      $('.trrow').each(function(){        
        let country = $('#sCountry').val();
        let state   = $('#sState').val();        
        if(($(this).attr('data-country') == country || country == '') && ($(this).attr('data-state') == state || state == '')  ){
          $(this).show();
        }else{
          $(this).hide();
        }
        
      });
      pagnum(numPages);
  }
  

</script>
@endsection
@endsection
