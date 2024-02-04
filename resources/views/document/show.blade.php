@extends("layout.index")

@section("content")



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
                         <td>{{$id++}}</td>
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