@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Clients</h4>
                    <br>
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form class="forms-sample" action="{{route('index/update',$clients->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Company Name</label>
                        <input type="text" name="companyname" class="form-control" id="exampleInputName1" value="{{$clients->comapny_name}}" placeholder="Company Name">
                        @error('companyname') <span class="text-danger">{{$message}}</span>@enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail3">Contact Person</label>
                        <input type="text" name="contactperson" class="form-control" id="exampleInputEmail3" value="{{$clients->contact_person}}" placeholder="Contact Person">
                        @error('contactperson') <span class="text-danger">{{$message}}</span>@enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputPassword4" value="{{$clients->email}}" placeholder="Email">
                        @error('email') <span class="text-danger">{{$message}}</span>@enderror

                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Telephone</label>
                        <input type="text" name="telephone" class="form-control" id="exampleInputPassword4" placeholder="Telephone" value="{{$clients->telephone}}">
                        @error('telephone') <span class="text-danger">{{$message}}</span>@enderror

                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Mobile</label>
                        <input type="phone" name="mobile" class="form-control" id="exampleInputPassword4" placeholder="Mobile" value="{{$clients->mobile}}">
                        @error('mobile') <span class="text-danger">{{$message}}</span>@enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Notes</label>
                        <textarea name="notes" class="form-control"placeholder="Message" id="exampleInputPassword4" cols="30" rows="10" value="{{$clients->notes}}">{{$clients->notes}}</textarea>
                        @error('notes') <span class="text-danger">{{$message}}</span>@enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword4">coming from</label>
                        <input type="text" name="coming_from" class="form-control" id="exampleInputPassword4" placeholder="coming from" value="{{$clients->coming_from}}">
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

                        <div class="form-group">
                          <label for="exampleInputName1">File Name</label>
                          @forelse ( $data as $all_data )
                          
                        <input type="text" name="file_name" class="form-control" id="exampleInputName1" value="{{$all_data->file_name}}" placeholder="File Name">
                        @error("file_name")<div style="color:red;">{{$message}}</div>@enderror
                        @empty
                        
                        @endforelse
                      </div>

                
                      <div class="form-group">
                          <label>Document File</label>
                          <input type="file" name="file" class="file-upload-default" multiple>
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