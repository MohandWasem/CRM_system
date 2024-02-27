@extends("layout.index")

@section("content")

<a href="{{route('Currency.add')}}" class="btn btn-gradient-success btn-fw">Add Currency</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Currency</h4>
                    @if(Session::has('erfolg'))
                    <div class="alert alert-success">
                         {{Session::get('erfolg')}}</div>
                    @endif
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                  <thead>
                        <tr>
                          <th> # </th>
                          <th> Currency_Name</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ( $currencies as $currency )
                            
                        <tr>
                          <td></td>
                          <td>{{$currency->currency_name}}</td>
                          <td>
                           <form action="{{route('Currency.edit',$currency->id)}}" method="post">
                              @csrf
                              <input type="submit" class="btn btn-info" value="edit">

                             </form>

                            <form action="{{route('Currency.delete',$currency->id)}}" method="post">
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