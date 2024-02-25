@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Document</h4>
<br>
<!-- <p class="card-description"> Basic form elements </p> -->
<form class="forms-sample" action="{{route('document/update',$Documents->id)}}" method="post" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label for="exampleSelectGender">Client Name</label>

<select class="form-control" name="client_id" id="exampleSelectGender">
@forelse ($Client as $client )
<option value="{{$client->id}}" @selected($Documents->client_id==$client->id)>{{$client->contact_person}}</option>
@empty

@endforelse

</select>

</div>


<div class="form-group">
<label for="exampleInputName1">File Name</label>
<input type="text" name="file_name" class="form-control" id="exampleInputName1" value="{{$Documents->file_name}}" placeholder="File Name" required>
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
<a href="{{route('document')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection