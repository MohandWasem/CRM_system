@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Clients</h4>
<br>
<!-- <p class="card-description"> Basic form elements </p> -->
<form class="forms-sample" action="{{route('index/update',$clients->id)}}" method="post" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label for="exampleInputName1">Company Name</label>
<input type="text" name="companyname" class="form-control" id="exampleInputName1" value="{{$clients->comapny_name}}" placeholder="Company Name" required>
@error('companyname') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputEmail3">Contact Person</label>
<input type="text" name="contactperson" class="form-control" id="exampleInputEmail3" value="{{$clients->contact_person}}" placeholder="Contact Person" required>
@error('contactperson') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword4">Email</label>
<input type="email" name="email" class="form-control" id="exampleInputPassword4" value="{{$clients->email}}" placeholder="Email" required>
@error('email') <span class="text-danger">{{$message}}</span>@enderror

</div>

<div class="form-group">
<label for="exampleInputPassword4">Telephone</label>
<input type="text" name="telephone" class="form-control" id="exampleInputPassword4" placeholder="Telephone" value="{{$clients->telephone}}" required>
@error('telephone') <span class="text-danger">{{$message}}</span>@enderror

</div>

<div class="form-group">
<label for="exampleInputPassword4">Mobile</label>
<input type="phone" name="mobile" class="form-control" id="exampleInputPassword4" placeholder="Mobile" value="{{$clients->mobile}}" required>
@error('mobile') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="notes" class="form-control"placeholder="Message" id="exampleInputPassword4" cols="30" rows="10" value="{{$clients->notes}}">{{$clients->notes}}</textarea>
@error('notes') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword4">coming from</label>
<input type="text" name="coming_from" class="form-control" id="exampleInputPassword4" placeholder="coming from" value="{{$clients->coming_from}}" required>
@error('mobile') <span class="text-danger">{{$message}}</span>@enderror
</div>


<div class="form-group">
<label for="exampleSelectGender">priv</label>
<select class="form-control" name="user_id" id="exampleSelectGender">
<option value="1" @selected($clients->user_id==1)>admin</option>

</select>
@error("user_id")<div style="color:red;">{{$message}}</div>@enderror
</div>

<div class="form-group">
<label for="exampleSelectGender">status</label>
<select class="form-control" name="status" id="exampleSelectGender">
<option value="1" @selected($clients->status==1)>Active</option>
<option value="0" @selected($clients->status==0)>Inactive</option>

</select>
@error("status")<div style="color:red;">{{$message}}</div>@enderror
</div>

<div class="form-group">
<label for="exampleSelectGender">activity</label>
<select class="form-control" name="activity_name" id="exampleSelectGender">
@forelse($act as $act )
<option value="{{$act->activity_name}}" @selected($act->activity_name==$act->activity_name)>{{$act->activity_name}}</option>
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