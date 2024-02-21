@extends("layout.index")

@section("content")


<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Parameters</h4>
                    @if(Session::has('erfolg'))
                    <div class="alert alert-success">
                         {{Session::get('erfolg')}}</div>
                    @endif
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                    <thead>
                         <tr class="table-responsive-sm">
                           <th>  #    </th>
                           <th> Name </th>
                           <th> Value </th>
                           <th> Action </th>
                          </tr>
                     </thead>
                     <tbody>
                        @forelse ( $parameters as $parameter )
                       
                       <tr class=" table-responsive-sm">
                         <td></td>
                         <td>{{$parameter->name}}</td>
                         <td>{{$parameter->last_id}}</td>
                         <td>
                         <a href="{{route('parameter/edit',$parameter->id)}}" >Edit</a>
                         </td>
                        </tr>
                       @empty
                         
                       @endforelse
          
    
                   </tbody>
      
                  </table>
                  </div>
                </div>
              </div>



@endsection