@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Users</h4>
<br>
<!-- <p class="card-description"> Basic form elements </p> -->
<form class="forms-sample" action="{{route('Users.show')}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleInputName1">User_Name</label>
<input type="text" name="name" class="form-control" id="exampleInputName1" value="{{old('name')}}" placeholder="User Name" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Email</label>
<input type="email" name="email" class="form-control" id="exampleInputPassword4" value="{{old('email')}}" placeholder="Email" required>
</div>

<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" class="form-control" id="password" value="" placeholder="Password" required>
<input type="checkbox" id="showPassword"> Show Password
</div>

<div class="form-group">
<label for="exampleSelectGender">User_Role</label>
<select class="form-control" name="user_role_id" id="exampleSelectGender">
@forelse ( $Roles as $Role )
    
<option value="{{$Role->id}}">{{$Role->user_role}}</option>
@empty
    
@endforelse

</select>
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Users')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection


@push('scripts')

<script>
    document.getElementById("showPassword").addEventListener("change", function() {
        var passwordInput = document.getElementById("password");
        if (this.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
</script>
    
@endpush