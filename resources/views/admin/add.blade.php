@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Clients</h4>
                    <br>
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form class="forms-sample" action="{{route('index/info')}}" method="post">
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
                        <input type="phone" name="mobile" class="form-control" id="exampleInputPassword4" placeholder="Mobile">
                        @error('mobile') <span class="text-danger">{{$message}}</span>@enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Notes</label>
                        <textarea name="message" class="form-control"placeholder="Message" id="exampleInputPassword4" cols="30" rows="10"></textarea>
                        @error('message') <span class="text-danger">{{$message}}</span>@enderror
                      </div>
                    
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection