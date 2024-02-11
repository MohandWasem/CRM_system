@extends("layout.index")

@section("content")

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Parameters</h4>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                         {{Session::get('success')}}</div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-bordered table-responsive-sm table-hover ">
                      <thead>
                        <tr class="table-responsive-sm">
                          <th>  #  </th>
                          <th> Name </th>
                          <th> Value </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      
                          
                        <tr class="table-info table-responsive-sm">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
 
                       
                      </tbody>
                    </table>
                   </div>
                  </div>
                </div>
              </div>
@endsection