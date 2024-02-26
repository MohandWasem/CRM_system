@extends("layout.index")

@section("content")
<a href="{{route('suppliers.add')}}" class="btn btn-gradient-info btn-fw">Add Supplier</a>

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Suppliers</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th> Supplier Name </th>
                      <th> Contact Person  </th>
                      <th> Email </th>
                      <th> Mobile </th>
                      <th> Phone </th>
                      <th> Address </th>
                      <th> Type </th>
                      <th> Country </th>
                      <th> Documents </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                        @forelse ( $suppliers as $supplier )
                            
                        <tr class="table-responsive-sm">
                          <td></td>
                          <td>{{$supplier->name}}</td>
                          <td>{{$supplier->contact_person}}</td>
                          <td>{{$supplier->email}}</td>
                          <td>{{$supplier->mobile}}</td>
                          <td>{{$supplier->phone}}</td>
                          <td>{{$supplier->address}}</td>
                          <td>{{$supplier->type==1? "Trucking" : "Clearance"}}</td>
                          <td>{{$supplier->Country->Country_Name}}</td>
                          <td>
                            
                          <a href="{{asset($supplier->document_file)}}">Show file</a>
                          </td>
                          <td>
                          <form action="{{route('suppliers.edit',$supplier->id)}}" method="post">
                              @csrf
                              <input type="submit" class="btn btn-info" value="edit">
    
                            </form>
    
                            <form action="{{route('suppliers.delete',$supplier->id)}}" method="post">
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