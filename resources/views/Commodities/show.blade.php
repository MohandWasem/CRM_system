@extends("layout.index")

@section("content")
<a href="{{route('Commodity.add')}}" class="btn btn-gradient-info btn-fw">Add Commodity</a>

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Commodities</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th> Commodity_Name </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                 @forelse ( $Commodities as $Commodity )
                     
                 <tr class="table-responsive-sm">
                   <td></td>
                   <td>{{$Commodity->commodity_name}}</td>
                   <td>
                   <form action="{{route('Commodity.edit',$Commodity->id)}}" method="post">
                       @csrf
                       <input type="submit" class="btn btn-info" value="edit">

                     </form>

                     <form action="{{route('Commodity.delete',$Commodity->id)}}" method="post">
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