

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

@push('scripts')
<script>
    $(document).on('click','.show_user_details',function(e){
        e.preventDefault();
      let title=$(this).data('title');
      let AddedBy=$(this).data('added-by');
      let CompanyName=$(this).data('company-name');
      let ShipmentDirection=$(this).data('shipment-direction');
      let radio_type=$(this).data('radio_type');
      let from_port=$(this).data('from_port');
      let to_port=$(this).data('to_port');
      let trucking=$(this).data('trucking');
      let from_trucking=$(this).data('from_trucking');
      let to_trucking=$(this).data('to_trucking');
      let Clearance=$(this).data('Clearance');
      let id=$(this).data('url');
    //   console.log(id);

    $('.id').text(id);
    $('.title').text(title);
    $('.AddedBy').text(AddedBy);
    $('.CompanyName').text(CompanyName);
    $('.ShipmentDirection').text(ShipmentDirection);
    $('.radio_type').text(radio_type);
    $('.from_port').text(from_port);
    $('.to_port').text(to_port);
    $('.trucking').text(trucking);
    $('.from_trucking').text(from_trucking);
    $('.to_trucking').text(to_trucking);
    $('.Clearance').text(Clearance);

    $('#submitButton').click(function(event) {
        event.preventDefault(); 

        let formData = {
            // request_id: $('#request_id').val(),
            request_id: id,
            price: $('#price').val(),
            freeTime: $('#freeTime').val(),
        };
        
        console.log(formData);

        $.ajax({
            // beforeSend: function(xhr, settings) {
            //             if (!csrfSafeMethod(settings.type) && !this.crossDomain) {
            //                 xhr.setRequestHeader("X-CSRFToken", csrftoken);
            //             }
            //         },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '{{ route("Request.Approved.store") }}', // URL to your backend route
            data: JSON.stringify(formData), // تحويل البيانات إلى سلسلة نصية JSON
            contentType: 'application/json', // تحديد نوع المحتوى ليكون JSON
            success: function(response) {
            // Handle success
            console.log(response);
            alert('Replay stored successfully');
            $('#exampleModalToggle').modal('hide');
        },
        error: function(xhr, status, error) {
            alert('An error occurred while storing the replay');
            console.error(xhr.responseText);
        }
    });
    });

    });
</script>


@endpush



@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endpush

<!-- @push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
$('.datetimepicker').datetimepicker({
format: 'YYYY-MM-DD HH:mm',
locale: 'en',
sideBySide: true,
icons: {
up: 'fas fa-chevron-up',
down: 'fas fa-chevron-down',
previous: 'fas fa-chevron-left',
next: 'fas fa-chevron-right'
},

});
</script>
@endpush -->