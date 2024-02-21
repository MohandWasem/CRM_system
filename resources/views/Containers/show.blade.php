@extends("layout.index")

@section("content")
<a href="{{route('Container.add')}}" class="btn btn-gradient-info btn-fw">Add Containers</a>

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Containers</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th> Container_Size  </th>
                      <th> Container_Type </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                 
                 @forelse ( $Containers as $Container )
                     
                 <tr class="table-responsive-sm">
                   <td></td>
                   <td>{{$Container->container_size}}</td>
                   <td>{{$Container->container_type}}</td>
                   <td>
                   <form action="{{route('Container.edit',$Container->id)}}" method="post">
                       @csrf
                       <input type="submit" class="btn btn-info" value="edit">

                     </form>

                     <form action="{{route('Container.delete',$Container->id)}}" method="post">
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