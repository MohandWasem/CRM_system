@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Currency</h4>
<br>
<!-- <p class="card-description"> Basic form elements </p> -->
<form class="forms-sample" action="{{route('Currency.update',$currencies->id)}}" method="post">
@csrf

<div class="form-group">
<label for="exampleInputName1">Currency Name</label>
<input type="text" name="currency_name" class="form-control" id="exampleInputName1" value="{{$currencies->currency_name}}" placeholder="Currency Name" required>

</div>



<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Currency')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection