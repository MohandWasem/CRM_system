@extends("layout.index")

@section("content")


<!-- <a href="{{route('document/add')}}" class="btn btn-gradient-info btn-fw">Add Documents</a> -->

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Documents</h4>
                   
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> number </th>
                          <th> File name </th>
                          <th> Documents </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                       @forelse ( $doc as $doc )
                         
                       <tr class="table-info">
                         <td>{{$doc->serial_document}}</td>
                         <td>{{$doc->file_name}}</td>
                         <td>
                          <a href="{{asset($doc->document_file)}}">Show file</a>
                          
                        </td>
                         
                      
                       @empty
                         
                       @endforelse
                          
                      
                          
                  
                         
                       
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

@endsection