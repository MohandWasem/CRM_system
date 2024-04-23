@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">quotations </h4>
<br>

<form class="forms-sample" action="{{route('Quotations.update',$Replays->id)}}" method="post">
@csrf

<div class="modal-body">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="hidden"  name="request_id" id="request_id" value="{{$Replays->request_id}}">
            <strong>{{ __('ID:') }}:</strong>
            <span class="id">{{$Replays->request_id}}</span>
         
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('title') }}:</strong>
            <span class="title">{{$Replays->request->title}}</span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Added by') }}:</strong>
            <span class="AddedBy">{{$Replays->request->salesUser->name}}</span>
            
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('ClinetName') }}:</strong>
            <span class="CompanyName">{{$Replays->request->clients->comapny_name}}</span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Shipment Direction') }}:</strong>
            <span class="ShipmentDirection">{{$Replays->request->shipment_direction==1?"Import":"Export"}}</span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Shipment Type') }}:</strong>
            <span class="radio_type">{{$Replays->request->radio_type}}</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('from_Port') }}:</strong>
            <span class="from_port">{{$Replays->request->from_port}}</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('to_port') }}:</strong>
            <span class="to_port">{{$Replays->request->to_port}}</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Trucking') }}:</strong>
            <span class="trucking">{{$Replays->request->trucking}}</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('From_Trucking') }}:</strong>
            <span class="from_trucking">{{$Replays->request->from_trucking}}</span>
          
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('To_Trucking') }}:</strong>
            <span class="to_trucking">{{$Replays->request->to_trucking}}</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Clearance') }}:</strong>
            <span class="Clearance">{{$Replays->request->Clearance}}</span>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" id="price" value="{{$Replays->price}}" placeholder="Price" >
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="freeTime">Free Time</label>
            <input type="text" name="freeTime" class="form-control" id="freeTime" value="{{$Replays->free_time}}" placeholder="Free Time" required>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="freeTime">Notes</label>
            <input type="text" name="notes" class="form-control" id="freeTime" value="" placeholder="notes" required>
        </div>
    </div>


    
<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Quotations')}}" class="btn btn-light">Cancel</a>
</div>
</form>
</div>
</div>
</div>
@endsection