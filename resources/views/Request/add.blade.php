@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Request</h4>
<br>
<form class="forms-sample" action="{{route('request/insert')}}" method="post">
@csrf

<div class="form-group">
<label for="exampleSelectGender">Client Name</label>

<select class="form-control" name="client_name" id="exampleSelectGender">
@forelse ($client as $client )
<option value="{{$client->contact_person}}">{{$client->contact_person}}</option>
@empty

@endforelse

</select>
@error("client_name")<div style="color:red;">{{$message}}</div>@enderror
</div>

<div class="form-group">
<label for="exampleSelectGender">Shipment Direction</label>
<select class="form-control" name="shipment_direction" id="exampleSelectGender">
<option value="1" @selected(old('shipment_direction')==1)>Import</option>
<option value="0" @selected(old('shipment_direction')==0)>Export</option>
</select>
@error("shipment_direction")<div style="color:red;">{{$message}}</div>@enderror
</div>

<div class="form-group">
<label for="exampleSelectGender">Shipment Type</label>

<select class="form-control" name="shipment_type" id="exampleSelectGender">
@forelse ($type as $type )
<option value="{{$type->id}}">{{$type->type}}</option>
@empty

@endforelse

</select>
@error("client_name")<div style="color:red;">{{$message}}</div>@enderror
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<button class="btn btn-light">Cancel</button>
</form>
</div>
</div>
</div>
@endsection