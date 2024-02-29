@extends("layout.index")

@section("content")
<a href="{{route('request/add')}}" class="btn btn-gradient-info btn-fw">Add Request</a>

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Requsets</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th> Serial_Request </th>
                      <th> Client Name </th>
                      <th> Shipment Direction </th>
                      <th> Shipment Type </th>
                      <th> From_port </th>
                      <th> To_port </th>
                      <th> Container </th>
                      <th> commodities </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($Request as $Req )
                      
                    <tr class="table-responsive-sm">
                      <td>{{$Req->serial_number}}</td>
                      <td>{{$Req->client_name}}</td>
                      <td>{{$Req->shipment_direction==1?"Import":"Export"}}</td>
                      <td>{{$Req->type->type}}</td>
                      <td>{{$Req->from_port}}</td>
                      <td>{{$Req->to_port}}</td>
                      <td>{{$Req->container_id}}</td>
                      <td>{{$Req->commodities->commodity_name}}</td>
                      <td>
                      <form action="{{route('request/edit',$Req->id)}}" method="post">
                          @csrf
                          <input type="submit" class="btn btn-info" value="edit">

                        </form>

                        <form action="{{route('request/delete',$Req->id)}}" method="post">
                          @csrf
                        <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                      </td>
                    @empty
                      
                    @endforelse
                  
                    
                  </tbody>
      
                  </table>
                </div>
              </div>
            </div>
          </div>

@endsection