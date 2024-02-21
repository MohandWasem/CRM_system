@extends("layout.index")

@section("content")

<a href="{{route('activty/add_act')}}" class="btn btn-gradient-success btn-fw">Add activity</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Activities</h4>
                    @if(Session::has('erfolg'))
                    <div class="alert alert-success">
                         {{Session::get('erfolg')}}</div>
                    @endif
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                  <thead>
                        <tr>
                          <th> Serial_Activity </th>
                          <th> Activity name </th>
                          <th> Created_at </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($activity as $activity )
                          
                        <tr>
                          <td>{{$activity->serial_activity}}</td>
                          <td>{{$activity->activity_name}}</td>
                          <td>{{$activity->created_at}}</td>
                      
                        
                        @empty
                          
                        @endforelse
                    
                      </tbody>
      
                  </table>
                  </div>
                </div>
              </div>

@endsection