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
                      <th> # </th>
                      <th> Serial_Request </th>
                      <th> Company Name </th>
                      <th> Shipment Direction </th>
                      <th> Shipment Type </th>
                      <th> from_Port </th>
                      <th> to_port </th>
                      <th> Container </th>
                      <th> Number of Boxes </th>
                      <th> Weight </th>
                      <th> Dimensions by CM </th>
                      <th> vcweight </th>
                      <th> grossweight </th>
                      <th> commodities </th>
                      <th> Remarks </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($Requests as $request )
                      
                    <tr class="table-responsive-sm">
                      <td></td>
                      <td>{{$request->serial_number}}</td>
                      <td>{{$request->clients->comapny_name}}</td>
                      <td>{{$request->shipment_direction==1?"Import":"Export"}}</td>
                      <td>{{$request->radio_type}}</td>
                      <td>{{$request->from_port}}</td>
                      <td>{{$request->to_port}}</td>
                      <td>{{$request->container_id}}</td>
                      <td>{{$request->numberBoxe}}</td>
                      <td>{{$request->weight}}</td>
                      <td>{{$request->length}} - {{$request->weight_cm}} - {{$request->height}} </td>
                      <td>{{$request->vcweight}}</td>
                      <td>{{$request->grossweight}}</td>
                      <td>{{$request->commodities->commodity_name}}</td>
                      <td>{{$request->remarks}}</td>
                      <td>
                      <form action="{{route('request/edit',$request->id)}}" method="post">
                          @csrf
                          <input type="submit" class="btn btn-info" value="edit">

                        </form>

                        <form action="{{route('request/delete',$request->id)}}" method="post">
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