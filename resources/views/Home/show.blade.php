@extends("layout.index")

@section("content")
<div class="alert alert-dark" role="alert">
  Home
</div class="form-group">
{{-- @if(Session::has('success'))
<div class="alert alert-success">
      {{Session::get('success')}}</div>
@endif
@if (Auth::guard('web')->user()->user_role_id == 4 || Auth::guard('web')->user()->user_role_id == 1 ) 
@foreach($Requests as $request)
    <div>
        <p>{{ $request->title }} - Added by: {{ $request->salesUser->name }} </p>
        @if (!$request->tasks->contains('operation_user_id', auth()->id()))
            <form action="{{ route('tasks.approve', $request->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit">Approve</button>
            </form>
        @endif
    </div>
@endforeach --}}
@if (Auth::guard('web')->user()->user_role_id == 4 || Auth::guard('web')->user()->user_role_id == 1 ) 
<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tasks</h4>
        @if(Session::has('success'))
        <div class="alert alert-success">
              {{Session::get('success')}}</div>
        @endif
        <div class="table-responsive">
        <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
        <thead>
            <tr class="table-responsive-sm">
              <th>  # </th>
              <th>  title </th>
              <th>  Added by: </th>
              <th> Company Name </th>
              <th> Shipment Direction </th>
              <th> Shipment Type </th>
              <th> from_Port </th>
              <th> to_port </th>
              <th> Approved:  </th>
            </tr>
          </thead>
          <tbody>
         @forelse ( $Requests as $request )
             
         <tr class="table-responsive-sm">
           <td></td>
           <td>{{$request->title}}</td>
           <td>{{$request->salesUser->name}}</td>
           <td>{{$request->clients->comapny_name}}</td>
           <td>{{$request->shipment_direction==1?"Import":"Export"}}</td>
           <td>{{$request->radio_type}}</td>
           <td>{{$request->from_port}}</td>
           <td>{{$request->to_port}}</td>
           <td>
            @if (!$request->tasks->contains('operation_user_id', auth()->id()))
            <form action="{{ route('tasks.approve', $request->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit">Approve</button>
            </form>
        @endif
           </td>
         @empty
             
         @endforelse
       
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
@endif

@endsection