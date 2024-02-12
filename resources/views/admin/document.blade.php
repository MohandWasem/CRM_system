@extends("layout.index")

@section("content")
@forelse ($documents as $Doc )
    
<a href="{{asset($Doc->document_file)}}">Show file</a>
@empty
    <span>empty_document</span>
@endforelse
@endsection