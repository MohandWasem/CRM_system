@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Rates</h4>
<br>

<form class="forms-sample" action="{{route('Rates.update',$rates->id)}}" method="post" >
@csrf


<!-- <div class="form-group">
<label for="carrier_type_id">Carrier Type</label>
<select class="form-control" name="carrier_type_id" id="carrier_type_id">
    @forelse($carriers_types as $carriers_type )
    <option value="{{$carriers_type->id}}" @selected($rates->carrier_type_id==$carriers_type->id)>{{$carriers_type->type}}</option>
    @empty
    @endforelse
</select>
</div> -->

<div class="form-group">
<h6>Shipment Type:</h6>

<input type="radio" id="contactChoice1" name="radio_carrier_type" value="sea" {{$rates->radio_carrier_type == 'sea' ? 'checked' : ''}} />
<label for="contactChoice1">Sea</label>

<input type="radio" id="contactChoice2" name="radio_carrier_type" value="air" {{$rates->radio_carrier_type == 'air' ? 'checked' : ''}} />
<label for="contactChoice1">Air</label>

<input type="radio" id="contactChoice3" name="radio_carrier_type" value="land" {{$rates->radio_carrier_type == 'land' ? 'checked' : ''}} />
<label for="contactChoice1">Land</label>

<input type="radio" id="contactChoice4" name="radio_carrier_type" value="courier" {{$rates->radio_carrier_type == 'courier' ? 'checked' : ''}} />
<label for="contactChoice1">Courier</label>
</div>

<div class="form-group">
<label for="exampleSelectGender">Carrier Name</label>
<select class="form-control" name="carrier_name_id" id="exampleSelectGender">
@forelse($carriers as $carriers )
<option value="{{$carriers->id}}" @selected($rates->carrier_name_id==$carriers->id)>{{$carriers->carrier_name}}</option>
@empty
@endforelse
</select>
</div>


<div class="form-group">
<label for="searchInput">Pol</label>
<input type="search" name="search" class="form-control" id="searchInputRate" placeholder="Search" value="{{$rates->pol}}">

<!-- <input type="text" id="searchInput"> -->
<ul id="searchResults"></ul>
</div>

<div class="form-group">
<label for="searchInput2">Pod</label>
<input type="search" name="search2" class="form-control" id="searchInputRate2" placeholder="Search" value="{{$rates->pod}}">

<!-- <input type="text" id="searchInput"> -->
<ul id="searchResults"></ul>
</div>

<div class="form-group" id="selectContainer">
<label for="exampleSelectGender">Container Type</label>
<select class="form-control" name="container_type_id" id="exampleSelectGender">
@forelse($container_type as $container_type )
<option value="{{$container_type->id}}" @selected($rates->container_type_id==$container_type->id)>{{$container_type->container_type}}</option>
@empty
@endforelse
</select>
</div>

<div class="form-group" id="inputContainer" style="display: none;">
<label for="exampleInputEmail3">Weight</label>
<input type="text" name="weight" class="form-control" id="exampleInputEmail3"  placeholder="Weight" value="{{$rates->weight}}">
</div>

<div id="checkboxContainer" style="display: none;" class ="form-group">
       <!-- <h6>weight</h6> -->
    <label for="checkboxField">Dimensions by CM</label>
    <br>
     <input type="text" class="form-control" value="{{$rates->length}}" style="width:10%; display:inline-block;" name="length" id="checkboxField">L
     <input type="text" class="form-control" value="{{$rates->weight_cm}}" style="width:10%; display:inline;" name="weight_cm" id="checkboxField">W
     <input type="text" class="form-control" value="{{$rates->height}}" style="width:10%; display:inline;" name="height" id="checkboxField">H
 </div>
<br>

<div class="form-group">
<label for="exampleInputPassword4">Price</label>
<input type="number" name="price" class="form-control" id="exampleInputPassword4" value="{{$rates->price}}" placeholder="Price" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Free Time</label>
<input type="text" name="free_time" class="form-control" id="exampleInputPassword4" value="{{$rates->free_time}}" placeholder="Free Time" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Transit Time</label>
<input type="text" name="transit_time" class="form-control" id="exampleInputPassword4" value="{{$rates->transit_time}}" placeholder="Transit Time" required>
</div>

<div class="form-group">
<label for="time_from">Validity Date</label>
<input type="text" class="form-control datetimepicker" id="time_from" name="validitiy_date" value="{{$rates->validitiy_date}}" />
</div>


<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="notes" class="form-control"placeholder="Notes" id="exampleInputPassword4" cols="30" rows="10" value="{{$rates->notes}}">{{$rates->notes}}</textarea>
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Rates')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection

@push('scripts')
<!-- <script>
   async function getports(value){
    const response = await fetch('/all_ports/' + value);
    const ports = await response.json();
    console.log(ports);

    // Populate 'from_port' select
    const fromPortSelect = $('#pol');
    fromPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        fromPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`,
            selected:port.id=={{$rates->pol}}
            
        }));
    });

    // Populate 'to_port' select
    const toPortSelect = $('#pod');
    toPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        toPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`,
            selected:port.id=={{$rates->pod}}
        }));
    });
  }
$(document).on('click', '#carrier_type_id', async function () {
    let value = $(this).val();
    console.log(value);

    getports(value);

});
getports({{$rates->carrier_type_id}});
</script> -->


<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $(document).ready(function () {
        $('#searchInputRate').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '/search-rates',
                    method: 'GET',
                    data: {search: request.term},

                    success: function (data) {
                        console.log(data);
                        response($.map(data, function (item) {
                            return {
                                label: item.Port_Name,
                                value: item.Port_Name,
                            };
                        }));


                    }
                });
            },
            minLength: 2, // Minimum characters before making a request
            select: function (event, ui) {
                // Handle selection, if needed
                console.log('Selected: ', ui.item);
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#searchInputRate2').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '/search-rates',
                    method: 'GET',
                    data: {search: request.term},

                    success: function (data) {
                        console.log(data);
                        response($.map(data, function (item) {
                            return {
                                label: item.Port_Name,
                                value: item.Port_Name 
                            };
                        }));


                    }
                });
            },
            minLength: 2, // Minimum characters before making a request
            select: function (event, ui) {
                // Handle selection, if needed
                console.log('Selected: ', ui.item);
            }
        });
    });
</script>

@endpush

<!-- @push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endpush -->


<!-- @push('scripts')
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
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


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var radioOption1 = document.getElementById('contactChoice1');
        var radioOption2 = document.getElementById('contactChoice2');
        var radioOption3 = document.getElementById('contactChoice3');
        var radioOption4 = document.getElementById('contactChoice4');
        var inputContainer = document.getElementById('inputContainer');
        var checkboxContainer = document.getElementById('checkboxContainer');
        var selectContainer = document.getElementById('selectContainer');


        function updateVisibility() {
            if (radioOption1.checked) {
                checkboxContainer.style.display = 'none';
                selectContainer.style.display = 'block';
                inputContainer.style.display = 'none';
            } else if (radioOption2.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'none';
                inputContainer.style.display = 'block';
            }

            if (radioOption3.checked) {
                checkboxContainer.style.display = 'none';
                selectContainer.style.display = 'block';
                inputContainer.style.display = 'none';
            } else if (radioOption4.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'none';
                inputContainer.style.display = 'block';
            }
        }

        updateVisibility(); // Initial visibility based on the current state

        radioOption1.addEventListener('change', updateVisibility);
        radioOption2.addEventListener('change', updateVisibility);
        radioOption3.addEventListener('change', updateVisibility);
        radioOption4.addEventListener('change', updateVisibility);

    });
</script>
@endpush