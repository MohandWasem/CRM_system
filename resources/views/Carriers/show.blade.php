@extends("layout.index")

@section("content")

<a href="{{route('Carriers.add')}}" class="btn btn-gradient-success btn-fw">Add Carrier</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Carriers</h4>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                         {{Session::get('success')}}</div>
                    @endif
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                  <thead>
                        <tr>
                          <th> # </th>
                          <th> Carrier_Name </th>
                          <th> Carrier_Type </th>
                          <th> Phone </th>
                          <th> Address </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                  @forelse ( $carriers as $carrier )
                      
                  <tr>
                       <td></td>
                       <td>{{$carrier->carrier_name}}</td>
                       <td>{{$carrier->types->type}}</td>
                       <td>{{$carrier->phone}}</td>
                       <td>{{$carrier->address}}</td>
                       <td>
                           <form action="{{route('Carriers.edit',$carrier->id)}}" method="post">
                               @csrf
                               <input type="submit" class="btn btn-info" value="edit">
       
                               </form>

                               <form action="{{route('Carriers.delete',$carrier->id)}}" method="post">
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