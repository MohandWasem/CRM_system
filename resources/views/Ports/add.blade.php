@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Ports</h4>
<br>

<form class="forms-sample" action="{{route('Ports.show')}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleInputName1">Port Name</label>
<input type="text" name="Port_Name" class="form-control" id="exampleInputName1" value="{{old('Port_Name')}}" placeholder="Port Name">
@error('Port_Name') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleSelectGender">Port Type</label>
<select class="form-control" name="Port_Type" id="exampleSelectGender">
@forelse($Port_Types as $Port_Type )
<option value="{{$Port_Type->Port_Type}}">{{$Port_Type->Port_Type}}</option>
@empty
@endforelse
</select>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Port Code</label>
<input type="text" name="Port_Code" class="form-control" id="exampleInputPassword4" value="{{old('Port_Code')}}" placeholder="Port Code">
@error('Port_Code') <span class="text-danger">{{$message}}</span>@enderror

</div>


<div class="form-group">
<label for="exampleSelectGender">Country Name</label>
<select class="form-control" name="Country_Name" id="exampleSelectGender">
@forelse($Countries as $Countries )
<option value="{{$Countries->id}}">{{$Countries->Country_Name}}</option>
@empty
@endforelse
</select>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="Port_Notes" class="form-control"placeholder="Notes" id="exampleInputPassword4" cols="30" rows="10"></textarea>
@error('Port_Notes') <span class="text-danger">{{$message}}</span>@enderror
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<button class="btn btn-light">Cancel</button>
</form>
</div>
</div>
</div>
@endsection