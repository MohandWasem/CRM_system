@extends("layout.index")

@section("content")
<div class="alert alert-dark" role="alert">
  Home
</div class="form-group">
@if(Session::has('success'))
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
@endforeach
@endif
@endsection