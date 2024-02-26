@extends("layout.index")

@section("content")

<a href="{{route('Agents.add')}}" class="btn btn-gradient-success btn-fw">Add Agent</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Agents</h4>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                         {{Session::get('success')}}</div>
                    @endif
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                  <thead>
                        <tr>
                          <th> # </th>
                          <th> Agent_Name </th>
                          <th> Contact_Person </th>
                          <th> Email </th>
                          <th> Telefon </th>
                          <th> Mobile </th>
                          <th> Address </th>
                          <th> Country </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                    @forelse ( $agents as $agent )
                      
                    <tr>
                      <td></td>
                      <td>{{$agent->agent_name}}</td>
                      <td>{{$agent->contact_person}}</td>
                      <td>{{$agent->email}}</td>
                      <td>{{$agent->telefon}}</td>
                      <td>{{$agent->mobile}}</td>
                      <td>{{$agent->address}}</td>
                      <td>{{$agent->country->Country_Name}}</td>
                      <td>
                          <form action="{{route('Agents.edit',$agent->id)}}" method="post">
                              @csrf
                              <input type="submit" class="btn btn-info" value="edit">
    
                            </form>

                            <form action="{{route('Agents.delete',$agent->id)}}" method="post">
                              @csrf
                            <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                          </td>
                    @empty
                      
                    @endforelse
                      
                        
                    
                    
                      </tbody>
      
                  </table>
                  </div>
                </div>
              </div>

@endsection