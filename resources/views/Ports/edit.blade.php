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
<input type="text" name="Port_Name" class="form-control" id="exampleInputName1" value="{{$Ports->Port_Name}}" placeholder="Port Name">
@error('Port_Name') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputEmail3">Port Type</label>
<input type="text" name="Port_Type" class="form-control" id="exampleInputEmail3" value="{{$Ports->Port_Type}}" placeholder="Port Type">
@error('Port_Type') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword4">Port Code</label>
<input type="text" name="Port_Code" class="form-control" id="exampleInputPassword4" value="{{$Ports->Port_Code}}" placeholder="Port Code">
@error('Port_Code') <span class="text-danger">{{$message}}</span>@enderror

</div>


<div class="form-group">
<label for="exampleInputPassword4">Port Country</label>
<input type="text" name="Port_Country" class="form-control" id="exampleInputPassword4" placeholder="Port Country" value="{{$Ports->Port_Country}}">
@error('Port_Country') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="Port_Notes" class="form-control"placeholder="Notes" id="exampleInputPassword4" cols="30" rows="10">{{$Ports->Port_Notes}}</textarea>
@error('Port_Notes') <span class="text-danger">{{$message}}</span>@enderror
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<button class="btn btn-light">Cancel</button>
</form>
</div>
</div>
</div>
@endsection