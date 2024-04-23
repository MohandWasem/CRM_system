@extends("layout.index")

@section("content")
@if (Auth::guard('web')->user()->user_role_id == 4 || Auth::guard('web')->user()->user_role_id == 1 ) 
<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">RequestApproved</h4>
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
              <th> Status </th>
              <th> Replay </th>
            </tr>
          </thead>
          <tbody>
         @forelse ( $Requests as $request )
             
         <tr class="table-responsive-sm">
           <td></td>
           <td>{{$request->id}}</td>
           <td>{{$request->title}}</td>
           <td>{{$request->salesUser->name}}</td>
           <td>{{$request->clients->comapny_name}}</td>
           <td>{{$request->shipment_direction==1?"Import":"Export"}}</td>
           <td>{{$request->radio_type}}</td>
           <td>{{$request->from_port}}</td>
           <td>{{$request->to_port}}</td>
           <td>{{$request->trucking}}</td>
           <td>{{$request->from_trucking}}</td>
           <td>{{$request->to_trucking}}</td>
           <td>{{$request->Clearance}}</td>
           <td>{{$request->approved==1 ? 'Approved' : ''}}</td>
           <td>
            <button type="button" class="btn btn-primary btn-sm show_user_details"
            id="show-user"
            data-bs-target="#exampleModalToggle" 
            data-bs-toggle="modal"
            data-title="{{$request->title}}"
            data-added-by="{{$request->salesUser->name}}"
            data-company-name="{{$request->clients->comapny_name}}"
            data-shipment-direction="{{$request->shipment_direction==1?"Import":"Export"}}"
            data-radio_type="{{$request->radio_type}}"
            data-from_port="{{$request->from_port}}"
            data-to_port="{{$request->to_port}}"
            data-trucking="{{$request->trucking}}"
            data-from_trucking="{{$request->from_trucking}}"
            data-to_trucking="{{$request->to_trucking}}"
            data-Clearance="{{$request->Clearance}}"
            data-url="{{$request->id}}"
            >+replay</button>
           </td>
         @empty
             
         @endforelse
       
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
@endif
@include('model.show')
@endsection