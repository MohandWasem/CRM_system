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
                    <table class="table table-bordered">
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
                          <td>{{$clients->id}}</td>
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

@endsection