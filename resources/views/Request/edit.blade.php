@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Request</h4>
<br>
<form class="forms-sample" action="{{route('request/update',$request->id)}}" method="post">
@csrf

<div class="form-group">
<label for="exampleSelectGender">Client Name</label>

<select class="form-control" name="client_name" id="exampleSelectGender">
@forelse ($client as $client )
<option value="{{$client->contact_person}}" @selected($request->client_name==$client->contact_person)>{{$client->contact_person}}</option>
@empty

@endforelse

</select>
@error("client_name")<div style="color:red;">{{$message}}</div>@enderror
</div>

<div class="form-group">
<label for="exampleSelectGender">Shipment Direction</label>
<select class="form-control" name="shipment_direction" id="exampleSelectGender">
<option value="1" @selected($request->shipment_direction==1)>Import</option>
<option value="0" @selected($request->shipment_direction==0)>Export</option>
</select>
@error("shipment_direction")<div style="color:red;">{{$message}}</div>@enderror
</div>

<div class="form-group">
<label for="exampleSelectGender">Shipment Type</label>

<select class="form-control" name="shipment_type" id="exampleSelectGender">
@forelse ($type as $type )
<option value="{{$type->id}}" @if($request->type->id==$type->id) selected @endif>{{$type->type}}</option>
@empty

@endforelse

</select>
@error("shipment_type")<div style="color:red;">{{$message}}</div>@enderror
</div>

<div class="form-group">
<label for="from_port">From</label>

<select class="form-control" name="from_port" id="from_port">

<option value=""></option>

</select>

</div>

<div class="form-group">
<label for="to_port">To</label>

<select class="form-control" name="to_port" id="to_port">

<option value=""></option>


</select>

</div>

<div class="form-group">
<label for="exampleSelectGender">Containers</label>
<select class="form-control" name="container_id" id="exampleSelectGender">
 @forelse ($Sizes as $Size )
        
<option value="{{$Size}}" @selected($request->container_id==$Size)>{{$Size}}</option>
 @empty
        
 @endforelse

</select>

</div>

<div class="form-group">
<label for="exampleSelectGender">Commodity</label>
<select class="form-control" name="commodity_id" id="exampleSelectGender">
 @forelse ( $Commodities as $Commodity )
     
 <option value="{{$Commodity->id}}" @selected($request->commodity_id==$Commodity->id)>{{$Commodity->commodity_name}}</option>
 @empty
     
 @endforelse       
 
</select>

</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('request')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection


@push('scripts')
<script>
   async function getports(value){
    const response = await fetch('/all_ports/' + value);
    const ports = await response.json();
    console.log(ports);

    // Populate 'from_port' select
    const fromPortSelect = $('#from_port');
    fromPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        fromPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`,
            selected:port.id=={{$request->from_port}}
            
        }));
    });

    // Populate 'to_port' select
    const toPortSelect = $('#to_port');
    toPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        toPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`,
            selected:port.id=={{$request->to_port}}
        }));
    });
  }
$(document).on('click', '#shipment_type', async function () {
    let value = $(this).val();
    console.log(value);

    getports(value);

});
getports({{$request->shipment_type}});
</script>

@endpush

