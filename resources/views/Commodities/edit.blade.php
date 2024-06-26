@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Commodity</h4>
<br>

<form class="forms-sample" action="{{route('Commodity.update',$Commodities->id)}}" method="post">
@csrf

<div class="form-group">
<label for="exampleInputName1">Commodity Name</label>
<input type="text" name="commodity_name" class="form-control" id="exampleInputName1" value="{{$Commodities->commodity_name}}" placeholder="Commodity Name" required>

</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Commodity')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection