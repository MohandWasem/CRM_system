@extends("layout.index")

@section("content")
<a href="{{route('index/add')}}" class="btn btn-gradient-primary btn-fw">Add Client</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Persons</h4>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                         {{Session::get('success')}}</div>
                    @endif
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> id </th>
                          <th> company name </th>
                          <th> contact person </th>
                          <th> email </th>
                          <th> telephone </th>
                          <th> mobile </th>
                          <th> notes </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($clients as $clients )
                          
                        <tr class="table-info">
                          <td>{{$id++}}</td>
                          <td>{{$clients->comapny_name}}</td>
                          <td>{{$clients->contact_person}}</td>
                          <td>{{$clients->email}}</td>
                          <td>{{$clients->telephone}}</td>
                          <td>{{$clients->mobile}}</td>
                          <td>{{$clients->notes}}</td>
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


              <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">information</h4>
                    
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> created_at </th>
                          <th> updated_at </th>
                          <th> who_add </th>
                          <th> coming_from </th>
                          <th> client_status </th>
                          <th> activity </th>
                          <th> File name </th>
                          <th> Documents </th>
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
                          <td>
                            @forelse ($info->documents as $doc )
                              
                            {{$doc->file_name}}
                            @empty
                              
                            @endforelse
                          </td>
                          <td>
                          @forelse ($info->documents as $doc )
                              
                          <a href="{{asset($doc->document_file)}}">Show file</a>
                              @empty
                                
                              @endforelse
                          </td>
                          
                        
                        @empty
                          
                        @endforelse
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

@endsection