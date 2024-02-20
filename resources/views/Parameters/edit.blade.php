@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Parameter</h4>
<br>

<form class="forms-sample" action="{{route('parameter/update',$parameter->id)}}" method="post">
@csrf

<div class="form-group">
<label for="exampleInputName1"> Name</label>
<option name="name" value="{{$parameter->name}}">{{$parameter->name}}</option>

</div>

<div class="form-group">
<label for="exampleInputName1"> Value</label>

    
<input type="text" name="last_id" class="form-control" id="exampleInputName1" value="{{$parameter->last_id}}" placeholder="Value">


</div>



<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('parameter')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection