@extends("layout.index")

@section("content")


<a href="{{route('document/add')}}" class="btn btn-gradient-info btn-fw">Add Documents</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Documents</h4>
                   
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> number </th>
                          <th> Client Name </th>
                          <th> File Name </th>
                          <th> Documents </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                       @forelse ( $Documents as $Doc )
                         
                       <tr class="table-info">
                         <td>{{$Doc->serial_document}}</td>
                         <td>{{$Doc->client_name}}</td>
                         <td>{{$Doc->file_name}}</td>
                         <td>
                          
                          <a href="{{asset($Doc->document_file)}}">Show file</a>
                        </td>
                        
                        <td>
                      <form action="{{route('document/edit',$Doc->id)}}" method="post">
                          @csrf
                          <input type="submit" class="btn btn-info" value="edit">

                        </form>

                        <form action="{{route('document/delete',$Doc->id)}}" method="post">
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