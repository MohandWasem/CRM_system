@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Clients</h4>
<br>
<!-- <p class="card-description"> Basic form elements </p> -->
<form class="forms-sample" action="{{route('index/info')}}" method="post" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label for="exampleInputName1">Company Name</label>
<input type="text" name="companyname" class="form-control" id="exampleInputName1" value="{{old('companyname')}}" placeholder="Company Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Contact Person</label>
<input type="text" name="contactperson" class="form-control" id="exampleInputEmail3" value="{{old('contactperson')}}" placeholder="Contact Person" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Email</label>
<input type="email" name="email" class="form-control" id="exampleInputPassword4" value="{{old('email')}}" placeholder="Email" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Telephone</label>
<input type="text" name="telephone" class="form-control" id="exampleInputPassword4" placeholder="Telephone" value="{{old('telephone')}}" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Mobile</label>
<input type="phone" name="mobile" class="form-control" id="exampleInputPassword4" placeholder="Mobile" value="{{old('mobile')}}" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="notes" class="form-control"placeholder="Message" id="exampleInputPassword4" cols="30" rows="10"></textarea>
</div>

<div class="form-group">
<label for="exampleInputPassword4">coming from</label>
<input type="text" name="coming_from" class="form-control" id="exampleInputPassword4" placeholder="coming from" value="{{old('coming_from')}}" required>
</div>


<div class="form-group">
<label for="exampleSelectGender">priv</label>
<select class="form-control" name="user_id" id="exampleSelectGender">
<option value="1" @selected(old('user_id')==1)>admin</option>

</select>
</div>

<div class="form-group">
<label for="exampleSelectGender">status</label>
<select class="form-control" name="status" id="exampleSelectGender">
<option value="1" @selected(old('status')==1)>Active</option>
<option value="0" @selected(old('status')==0)>Inactive</option>

</select>
</div>

<div class="form-group">
<label for="exampleSelectGender">activity</label>
<select class="form-control" name="activity_name" id="exampleSelectGender">
@forelse($act as $act )
<option value="{{$act->activity_name}}">{{$act->activity_name}}</option>
@empty
@endforelse
</select>
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('index')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection