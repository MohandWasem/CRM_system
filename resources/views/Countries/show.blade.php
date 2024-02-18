@extends("layout.index")

@section("content")
<a href="{{route('Country.add')}}" class="btn btn-gradient-info btn-fw">Add Country</a>

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Country</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm table-hover ">
                  <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th> Country_Name </th>
                      <th> Country_Code </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse ($Countries as $Country )
                     
                   <tr class="table-info table-responsive-sm">
                     <td></td>
                     <td>{{$Country->Country_Name}}</td>
                     <td>{{$Country->Country_Code}}</td>
                     <td>
                     <form action="{{route('Country.edit',$Country->id)}}" method="post">
                         @csrf
                         <input type="submit" class="btn btn-info" value="edit">

                       </form>

                       <form action="{{route('Country.delete',$Country->id)}}" method="post">
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