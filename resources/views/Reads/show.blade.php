@extends("layout.index")

@section("content")
<a href="{{route('Rates.add')}}" class="btn btn-gradient-info btn-fw">Add Rates</a>

<div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Rates</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                      {{Session::get('success')}}</div>
                @endif
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                     
                      <th> carrier_type </th>
                      <th> carrier_name </th>
                      <th> pol </th>
                      <th> pod </th>
                      <th> container_type </th>
                      <th> Weight </th>
                      <th> Dimensions by CM </th>
                      <th> price </th>
                      <th> free_time </th>
                      <th> transit_time </th>
                      <th> validitiy_date </th>
                      <th> notes </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                         @forelse ( $rates as $rate )
                           
                         <tr class="table-responsive-sm">
                           <td></td>
                           
                           <td>{{$rate->radio_carrier_type}}</td>
                           <td>{{$rate->carrier->carrier_name}}</td>
                           <td>{{$rate->pol}}</td>
                           <td>{{$rate->pod}}</td>
                           <td>{{$rate->containers->container_type}}</td>
                           <td>{{$rate->weight}}</td>
                           <td>{{$rate->length}} - {{$rate->weight_cm}} - {{$rate->height}} </td>
                           <td>{{$rate->price}}</td>
                           <td>{{$rate->free_time}}</td>
                           <td>{{$rate->transit_time}}</td>
                           <td>{{$rate->validitiy_date}}</td>
                           <td>{{$rate->notes}}</td>
                           <td>
                           <form action="{{route('Rates.edit',$rate->id)}}" method="post">
                               @csrf
                               <input type="submit" class="btn btn-info" value="edit">
     
                             </form>
     
                             <form action="{{route('Rates.delete',$rate->id)}}" method="post">
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