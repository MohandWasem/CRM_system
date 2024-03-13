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
                      <th> shippingType </th>
                      <th> number of Boxes_shippingType </th>
                      <th> weight_shippingType </th>
                      <th> lenght_shippingType </th>
                      <th> weight_cm_shippingType </th>
                      <th> height_shippingType </th>
                      <th> CBM </th>
                      <th> grossweight_shippingType </th>
                      <th> quantity </th>
                      <th> Container </th>
                      <th> Number of Boxes </th>
                      <th> Weight </th>
                      <th> Dimensions by CM </th>
                      <th> vcweight </th>
                      <th> grossweight </th>
                      <th> File </th>
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
                      <td>
                        {{$request->shippingType==1 ? 'LCL' : ''}}
                        {{$request->shippingType==2 ? 'FCL' : ''}}
                      </td>
                      <td>{{$request->number_shippingType}}</td>
                      <td>{{$request->weight_shippingType}}</td>
                      <td>{{$request->l_shippingType}}</td>
                      <td>{{$request->wCM_shippingType}}</td>
                      <td>{{$request->h_shippingType}}</td>
                      <td>{{$request->cbm_shippingType}}</td>
                      <td>{{$request->grossw_shippingType}}</td>
                      <td>{{$request->quantity}}</td>
                      <td>{{$request->container_id}}</td>
                      <td>{{$request->numberBoxe}}</td>
                      <td>{{$request->weight}}</td>
                      <td>{{$request->length}} - {{$request->weight_cm}} - {{$request->height}} </td>
                      <td>{{$request->vcweight}}</td>
                      <td>{{$request->grossweight}}</td>
                      <td>
                          @if(file_exists($request->fileInput))
                              {{-- File exists, display it --}}
                                 <a href="{{asset($request->fileInput)}}">Show file</a>
                          @else
                              {{-- File doesn't exist, don't display anything --}}
                               <p>Document empty.</p>
                          @endif
                      </td>
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