@extends("layout.index")

@section("content")
<a href="{{route('Ports.add')}}" class="btn btn-gradient-info btn-fw">Add Ports</a>

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ports</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm table-hover ">
                  <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th> Port_Name </th>
                      <th> Port_Type  </th>
                      <th> Port_Code </th>
                      <th> Port_Country </th>
                      <th> Port_Notes </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ( $Ports as $Port )
                        
                    <tr class="table-info table-responsive-sm">
                      <td></td>
                      <td>{{$Port->Port_Name}}</td>
                      <td>{{$Port->Port_Type_Id}}</td>
                      <td>{{$Port->Port_Code}}</td>
                      <td>{{$Port->Country->Country_Name}}</td>
                      <td>{{$Port->Port_Notes}}</td>
                      <td>
                      <form action="{{route('Ports.edit',$Port->id)}}" method="post">
                          @csrf
                          <input type="submit" class="btn btn-info" value="edit">

                        </form>

                        <form action="{{route('Ports.delete',$Port->id)}}" method="post">
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