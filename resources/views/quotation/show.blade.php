@extends("layout.index")

@section("content")
{{-- <a href="" class="btn btn-gradient-info btn-fw">Add quotation</a> --}}

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"> Before Quotations</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th>  ID </th>
                      <th>  Title </th>
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
                      <th> Action </th>


                    </tr>
                  </thead>
                  <tbody>
                  
                        @forelse ($Replays as $replay)
                            
                        <tr class="table-responsive-sm">
                          <td></td>
     
                          <td>{{$replay->request->id}}</td>
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
                          <td>
                            <form action="{{route('Quotations.edit',$replay->id)}}" method="post">
                              @csrf
                              <input type="submit" class="btn btn-info" value="edit">
    
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





        
          <div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"> Details Quotations</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th>  ID </th>
                      <th>  Title </th>
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
                      <th> Notes </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  
                        @forelse ($Quotations as $Quotation)
                            
                        <tr class="table-responsive-sm">
                          <td></td>
     
                          <td>{{$Quotation->request->id}}</td>
                          <td>{{$Quotation->request->title}}</td>
                          <td>{{$Quotation->request->salesUser->name}}</td>
                          <td>{{$Quotation->request->clients->comapny_name}}</td>
                          <td>{{$Quotation->request->shipment_direction==1?"Import":"Export"}}</td>
                          <td>{{$Quotation->request->radio_type}}</td>
                          <td>{{$Quotation->request->from_port}}</td>
                          <td>{{$Quotation->request->to_port}}</td>
                          <td>{{$Quotation->request->trucking}}</td>
                          <td>{{$Quotation->request->from_trucking}}</td>
                          <td>{{$Quotation->request->to_trucking}}</td>
                          <td>{{$Quotation->request->Clearance}}</td>
                          <td>{{$Quotation->price}}</td>
                          <td>{{$Quotation->free_time}}</td>
                          <td>{{$Quotation->notes}}</td>
                          
                        @empty
                            
                        @endforelse
                        
                  </tbody>
      
                  </table>
                </div>
              </div>
            </div>
          </div>

          

@endsection

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c9500d4e97302cddd7b2', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('channel-replay');
    channel.bind('App\Events\ReplayEvent', function (data) {
      toastr.info(JSON.stringify(data.request_id) + ' has joined our website');
   
  });
  </script>