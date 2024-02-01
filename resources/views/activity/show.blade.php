@extends("layout.index")

@section("content")

<a href="{{route('activty/add_act')}}" class="btn btn-gradient-success btn-fw">Add activity</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Persons</h4>
                    @if(Session::has('erfolg'))
                    <div class="alert alert-success">
                         {{Session::get('erfolg')}}</div>
                    @endif
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> id </th>
                          <th> Activity name </th>
                          <th> created_at </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($activity as $activity )
                          
                        <tr class="table-info">
                          <td>{{$id++}}</td>
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