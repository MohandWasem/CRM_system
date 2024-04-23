

<form action="" method="post"  >
  
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Request') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       
                </div>
                     
                 <form id="replayForm"  action="{{ route('Request.Approved.store') }}"  method="post" >
                    {{ csrf_field() }}
                <div class="modal-body">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="hidden"  name="request_id" id="request_id">
                            <strong>{{ __('ID:') }}:</strong>
                            <span class="id"></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('title') }}:</strong>
                            <span class="title"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Added by') }}:</strong>
                            <span class="AddedBy"></span>
                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('ClinetName') }}:</strong>
                            <span class="CompanyName"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Shipment Direction') }}:</strong>
                            <span class="ShipmentDirection"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Shipment Type') }}:</strong>
                            <span class="radio_type"></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('from_Port') }}:</strong>
                            <span class="from_port"></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('to_port') }}:</strong>
                            <span class="to_port"></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Trucking') }}:</strong>
                            <span class="trucking"></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('From_Trucking') }}:</strong>
                            <span class="from_trucking"></span>
                          
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('To_Trucking') }}:</strong>
                            <span class="to_trucking"></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Clearance') }}:</strong>
                            <span class="Clearance"></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" value="" placeholder="Price" >
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="freeTime">Free Time</label>
                            <input type="text" name="freeTime" class="form-control" id="freeTime" value="" placeholder="Free Time" required>
                            </div>
                        </div>


                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" id="submitButton" class="btn btn-success">submit</button>
                    </div>
                </div>
            </form>
                
            </div>
        </div>
    </div>
</form>