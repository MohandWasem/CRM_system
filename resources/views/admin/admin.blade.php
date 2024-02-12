@extends("layout.index")

@section("content")
<a href="{{route('index/add')}}" class="btn btn-gradient-primary btn-fw">Add Client</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Clients</h4>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                         {{Session::get('success')}}</div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-bordered table-responsive-sm table-hover ">
                      <thead>
                        <tr class="table-responsive-sm">
                          <th> Serial_Client </th>
                          <th> Company Name </th>
                          <th> Contact Person </th>
                          <th> Email </th>
                          <th> Telephone </th>
                          <th> Mobile </th>
                          <th> Notes </th>
                          <th> Documents </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($clients as $clients )
                          
                        <tr class="table-info table-responsive-sm">
                          <td>{{$clients->serial_client}}</td>
                          <td>{{$clients->comapny_name}}</td>
                          <td>{{$clients->contact_person}}</td>
                          <td>{{$clients->email}}</td>
                          <td>{{$clients->telephone}}</td>
                          <td>{{$clients->mobile}}</td>
                          <td>{{$clients->notes}}</td>
                          <td><a href="{{route('Home/documents',$clients->id)}}">view Documents</a></td>
                          <td>
                          <form action="{{route('index/edit',$clients->id)}}" method="post">
                              @csrf
                              <input type="submit" class="btn btn-info" value="edit">
    
                            </form>

                            <form action="{{route('index/delete',$clients->id)}}" method="post">
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
              </div>


              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Information</h4>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> Created_at </th>
                          <th> Updated_at </th>
                          <th> Who_Add </th>
                          <th> Coming_From </th>
                          <th> Client_Status </th>
                          <th> Activity </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($info as $info )
                          
                        <tr class="table-info">
                          <td>{{$info->created_at}}</td>
                          <td>{{$info->updated_at}}</td>
                          <td>{{$info->user_id?"admin":""}}</td>
                          <td>{{$info->coming_from}}</td>
                          <td>{{$info->status==1?"Active":"Inactive"}}</td>
                          <td>{{$info->activity}}</td>
                        
                          
                        @empty
                          
                        @endforelse

                        
                    
                      </tbody>
                    </table>
                   </div> 
                  </div>
                </div>
              </div>

@endsection