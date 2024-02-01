@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Activity</h4>
                    <br>
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form class="forms-sample" action="{{route('activty/insert_act')}}" method="post">
                      @csrf
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Activity Name</label>
                        <input type="text" name="activity_name" class="form-control" id="exampleInputName1" value="{{old('activity_name')}}" placeholder="Activity Name">
                       
                      </div>

                      
                    
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection