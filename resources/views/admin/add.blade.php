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
<input type="text" name="companyname" class="form-control" id="exampleInputName1" value="{{old('companyname')}}" placeholder="Company Name">
@error('companyname') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputEmail3">Contact Person</label>
<input type="text" name="contactperson" class="form-control" id="exampleInputEmail3" value="{{old('contactperson')}}" placeholder="Contact Person">
@error('contactperson') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword4">Email</label>
<input type="email" name="email" class="form-control" id="exampleInputPassword4" value="{{old('email')}}" placeholder="Email">
@error('email') <span class="text-danger">{{$message}}</span>@enderror

</div>

<div class="form-group">
<label for="exampleInputPassword4">Telephone</label>
<input type="text" name="telephone" class="form-control" id="exampleInputPassword4" placeholder="Telephone" value="{{old('telephone')}}">
@error('telephone') <span class="text-danger">{{$message}}</span>@enderror

</div>

<div class="form-group">
<label for="exampleInputPassword4">Mobile</label>
<input type="phone" name="mobile" class="form-control" id="exampleInputPassword4" placeholder="Mobile" value="{{old('mobile')}}">
@error('mobile') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="notes" class="form-control"placeholder="Message" id="exampleInputPassword4" cols="30" rows="10"></textarea>
@error('notes') <span class="text-danger">{{$message}}</span>@enderror
</div>

<div class="form-group">
<label for="exampleInputPassword4">coming from</label>
<input type="text" name="coming_from" class="form-control" id="exampleInputPassword4" placeholder="coming from" value="{{old('coming_from')}}">
@error('coming_from') <span class="text-danger">{{$message}}</span>@enderror
</div>


<div class="form-group">
<label for="exampleSelectGender">priv</label>
<select class="form-control" name="user_id" id="exampleSelectGender">
<option value="1" @selected(old('user_id')==1)>admin</option>

</select>
@error("user_id")<div style="color:red;">{{$message}}</div>@enderror
</div>

<div class="form-group">
<label for="exampleSelectGender">status</label>
<select class="form-control" name="status" id="exampleSelectGender">
<option value="1" @selected(old('status')==1)>Active</option>
<option value="0" @selected(old('status')==0)>Inactive</option>

</select>
@error("status")<div style="color:red;">{{$message}}</div>@enderror
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

<div class="form-group">
<label for="exampleInputName1">File Name</label>
<input type="text" name="file_name" class="form-control" id="exampleInputName1" value="{{old('file_name')}}" placeholder="File Name">
@error("file_name")<div style="color:red;">{{$message}}</div>@enderror
</div>


<div class="form-group">
<label>Document File</label>
<input type="file" name="file[]" class="file-upload-default" multiple>
<div class="input-group col-xs-12">
<input type="text" class="form-control file-upload-info"  placeholder="Upload File">
<span class="input-group-append">
<button class="file-upload-browse btn btn-gradient-secondary" type="button">Upload</button>
</span>
</div>
@error("file")<div style="color:red;">{{$message}}</div>@enderror
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<button class="btn btn-light">Cancel</button>
</form>
</div>
</div>
</div>
@endsection