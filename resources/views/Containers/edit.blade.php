@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Container</h4>
<br>

<form class="forms-sample" action="{{route('Container.update',$Containers->id)}}" method="post" >
@csrf


<div class="form-group">
<label for="exampleInputPassword4">Container Size</label>
<input type="text" name="container_size" class="form-control" id="exampleInputPassword4" value="{{$Containers->container_size}}" placeholder="Container Size" required>

</div>


<div class="form-group">
<label for="exampleInputName1">Container Type</label>
<input type="text" name="container_type" class="form-control" id="exampleInputName1" value="{{$Containers->container_type}}" placeholder="Container Type" required>

</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Container')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection