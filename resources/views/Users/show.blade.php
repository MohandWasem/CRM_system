@extends("layout.index")

@section("content")
<a href="{{route('Users.add')}}" class="btn btn-gradient-info btn-fw">Add User</a>

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Users</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th> User_Name </th>
                      <th> Email </th>
                      <th> User_Role </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                         @forelse ( $Admins as $Admin )
                           
                         <tr class="table-responsive-sm">
                           <td></td>
                           <td>{{$Admin->name}}</td>
                           <td>{{$Admin->email}}</td>
                           <td>{{$Admin->Roles->user_role}}</td>
                           <td>
                           <form action="{{route('Users.edit',$Admin->id)}}" method="post">
                               @csrf
                               <input type="submit" class="btn btn-info" value="edit">
     
                             </form>
     
                             <form action="{{route('Users.delete',$Admin->id)}}" method="post">
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

@endsection