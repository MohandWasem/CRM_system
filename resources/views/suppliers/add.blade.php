@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Suppliers</h4>
<br>

<form class="forms-sample" action="{{route('suppliers.show')}}" method="post" enctype="multipart/form-data" >
@csrf

<div class="form-group">
<label for="exampleInputName1">Supplier Name</label>
<input type="text" name="supplier_name" class="form-control" id="exampleInputName1" value="{{old('supplier_name')}}" placeholder="Supplier Name" required>
</div>

<div class="form-group">
<label for="exampleInputName1">Contact Person</label>
<input type="text" name="contact_person" class="form-control" id="exampleInputName1" value="{{old('contact_person')}}" placeholder="Contact Person" required>
</div>

<div class="form-group">
<label for="exampleInputName1">Email</label>
<input type="text" name="email" class="form-control" id="exampleInputName1" value="{{old('email')}}" placeholder="Email" required>
</div>

<div class="form-group">
<label for="exampleInputName1">Mobile</label>
<input type="text" name="mobile" class="form-control" id="exampleInputName1" value="{{old('mobile')}}" placeholder="Mobile">
</div>

<div class="form-group">
<label for="exampleInputName1">Phone</label>
<input type="text" name="phone" class="form-control" id="exampleInputName1" value="{{old('phone')}}" placeholder="Phone" required>
</div>


<div class="form-group">
<label for="exampleInputPassword4">Address</label>
<input type="text" name="address" class="form-control" id="exampleInputPassword4" placeholder="Address" value="{{old('address')}}">
</div>

<div class="form-group">
<label for="exampleSelectGender">Type</label>
<select class="form-control" name="type" id="exampleSelectGender">
<option value="1" @selected(old('type')==1)>Trucking</option>
<option value="0" @selected(old('type')==0)>Clearance</option>

</select>
</div>


<div class="form-group">
<label for="exampleSelectGender">Country</label>
<select class="form-control" name="country_id" id="exampleSelectGender">
@forelse($countries as $country )
<option value="{{$country->id}}">{{$country->Country_Name}}</option>
@empty
@endforelse
</select>
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
</div>



<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('suppliers')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection