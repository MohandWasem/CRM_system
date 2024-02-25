@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Ports</h4>
<br>

<form class="forms-sample" action="{{route('Ports.update',$Ports->id)}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleInputName1">Port Name</label>
<input type="text" name="Port_Name" class="form-control" id="exampleInputName1" value="{{$Ports->Port_Name}}" placeholder="Port Name" required>

</div>

<div class="form-group">
<label for="exampleSelectGender">Port Type</label>
<select class="form-control" name="Port_Type" id="exampleSelectGender">
@forelse($Port_Types as $Port_Type )
<option value="{{$Port_Type->id}}" @selected($Ports->Port_Type_Id==$Port_Type->id)>{{$Port_Type->Port_Type}}</option>
@empty
@endforelse
</select>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Port Code</label>
<input type="text" name="Port_Code" class="form-control" id="exampleInputPassword4" value="{{$Ports->Port_Code}}" placeholder="Port Code" required>

</div>


<div class="form-group">
<label for="exampleSelectGender">Country Name</label>
<select class="form-control" name="Country_Name" id="exampleSelectGender">
@forelse($Countries as $Countries )
<option value="{{$Countries->Country_Name}}" @if($Ports->Port_Country==$Countries->Country_Name) selected @endif>{{$Countries->Country_Name}}</option>
@empty
@endforelse
</select>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="Port_Notes" class="form-control"placeholder="Notes" id="exampleInputPassword4" cols="30" rows="10">{{$Ports->Port_Notes}}</textarea>
@error('Port_Notes') <span class="text-danger">{{$message}}</span>@enderror
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Ports')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection