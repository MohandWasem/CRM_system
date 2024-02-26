@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Agents</h4>
<br>
<!-- <p class="card-description"> Basic form elements </p> -->
<form class="forms-sample" action="{{route('Agents.show')}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleInputName1">Agent Name</label>
<input type="text" name="agent_name" class="form-control" id="exampleInputName1" value="{{old('agent_name')}}" placeholder="Agent Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Contact Person</label>
<input type="text" name="contact_person" class="form-control" id="exampleInputEmail3" value="{{old('contact_person')}}" placeholder="Contact Person" required>
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
<label for="exampleInputPassword4">Address</label>
<input type="text" name="address" class="form-control" id="exampleInputPassword4" placeholder="Address" value="{{old('address')}}">
</div>


<div class="form-group">
<label for="exampleSelectGender">Country</label>
<select class="form-control" name="country_id" id="exampleSelectGender">
@forelse ( $countries as $country )
    
<option value="{{$country->id}}">{{$country->Country_Name}}</option>
@empty
    
@endforelse

</select>
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Agents')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection