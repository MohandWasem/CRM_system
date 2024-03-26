@extends("layout.index")

@section("content")
{{-- <a href="{{route('Rates.add')}}" class="btn btn-gradient-info btn-fw">Add Rates</a> --}}

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Replay</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th>  title </th>
                      <th>  Added by: </th>
                      <th> Company Name </th>
                      <th> Shipment Direction </th>
                      <th> Shipment Type </th>
                      <th> from_Port </th>
                      <th> to_port </th>
                      <th> Trucking </th>
                      <th> From_Trucking </th>
                      <th> To_Trucking </th>
                      <th> Clearance </th>
                      <th> price </th>
                      <th> free_time </th>


                    </tr>
                  </thead>
                  <tbody>
                    
                      
                           @forelse ( $Replays as $replay )
                             
                           <tr class="table-responsive-sm">
                             <td></td>
                      
                             <td>{{$replay->request->title}}</td>
                             <td>{{$replay->request->salesUser->name}}</td>
                             <td>{{$replay->request->clients->comapny_name}}</td>
                             <td>{{$replay->request->shipment_direction==1?"Import":"Export"}}</td>
                             <td>{{$replay->request->radio_type}}</td>
                             <td>{{$replay->request->from_port}}</td>
                             <td>{{$replay->request->to_port}}</td>
                             <td>{{$replay->request->trucking}}</td>
                             <td>{{$replay->request->from_trucking}}</td>
                             <td>{{$replay->request->to_trucking}}</td>
                             <td>{{$replay->request->Clearance}}</td>
                             <td>{{$replay->price}}</td>
                             <td>{{$replay->free_time}}</td>
                           
                           @empty
                             
                           @endforelse

                  </tbody>
      
                  </table>
                </div>
              </div>
            </div>
          </div>

@endsection