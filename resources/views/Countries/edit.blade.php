@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Country</h4>
<br>

<form class="forms-sample" action="{{route('Country.update',$Countries->id)}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleInputName1">Country Name</label>
<input type="text" name="Country_Name" class="form-control" id="exampleInputName1" value="{{$Countries->Country_Name}}" placeholder="Country Name">
@error('Country_Name') <span class="text-danger">{{$message}}</span>@enderror
</div>


<div class="form-group">
<label for="exampleInputPassword4">Country Code</label>
<input type="text" name="Country_Code" class="form-control" id="exampleInputPassword4" value="{{$Countries->Country_Code}}" placeholder="Country Code">
@error('Country_Code') <span class="text-danger">{{$message}}</span>@enderror

</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Country')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection