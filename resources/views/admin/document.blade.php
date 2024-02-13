@extends("layout.index")

@section("content")

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Documents</h4>
                  
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> File Name </th>
                          <th> Document File </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        
                      @forelse ($documents as $Doc )
                        <tr class="table-info">
                          <td>{{$Doc->file_name}}</td>
                          <td>

                         <a href="{{asset($Doc->document_file)}}">Show file</a>

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