@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Carrier</h4>
<br>

<form class="forms-sample" action="{{route('Carriers.show')}}" method="post">
@csrf

<div class="form-group">
<label for="exampleInputName1">Carrier Name</label>
<input type="text" name="carrier_name" class="form-control" id="exampleInputName1" value="{{old('carrier_name')}}" placeholder="Carrier Name" required>
</div>

<div class="form-group">
<label for="exampleSelectGender">Carrier Type</label>
<select class="form-control" name="carrier_type_id" id="exampleSelectGender">
@forelse ( $types as $type )
    
<option value="{{$type->id}}">{{$type->type}}</option>
@empty
    
@endforelse

</select>
</div>

<div class="form-group">
<label for="exampleInputName1">Phone</label>
<input type="phone" name="phone" class="form-control" id="exampleInputName1" value="{{old('phone')}}" placeholder="Phone" required>
</div>

<div class="form-group">
<label for="exampleInputName1">Address</label>
<input type="text" name="address" class="form-control" id="exampleInputName1" value="{{old('address')}}" placeholder="Address">
</div>



<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Carriers')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection