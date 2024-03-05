@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Request</h4>
<br>
<form class="forms-sample" action="{{route('request/insert')}}" method="post">
@csrf

<div class="form-group">
<label for="exampleSelectGender">Client Name</label>

<select class="form-control" name="client_name" id="exampleSelectGender">
@forelse ($client as $client )
<option value="{{$client->contact_person}}">{{$client->contact_person}}</option>
@empty

@endforelse

</select>

</div>

<div class="form-group">
<label for="exampleSelectGender">Shipment Direction</label>
<select class="form-control" name="shipment_direction" id="exampleSelectGender">
<option value="1" @selected(old('shipment_direction')==1)>Import</option>
<option value="0" @selected(old('shipment_direction')==0)>Export</option>
</select>
@error("shipment_direction")<div style="color:red;">{{$message}}</div>@enderror
</div>



<div class="form-group">
<h6>Shipment Type:</h6>

<input type="radio" id="contactChoice1" name="radio_type" value="sea" checked  />
<label for="contactChoice1">Sea</label>

<input type="radio" id="contactChoice2" name="radio_type" value="air" />
<label for="contactChoice1">Air</label>

<input type="radio" id="contactChoice3" name="radio_type" value="land" />
<label for="contactChoice1">Land</label>

<input type="radio" id="contactChoice4" name="radio_type" value="courier" />
<label for="contactChoice1">Courier</label>
</div>


<!-- <div class="form-group">
<label for="from_port">From</label>

<select class="form-control" name="from_port" id="from_port">

<option value=""></option>

</select>

</div> -->

<!-- <div class="form-group">
<label for="to_port">To</label>

<select class="form-control" name="to_port" id="to_port">

<option value=""></option>


</select>

</div> -->

<div class="form-group">
<label for="searchInput">From</label>
<input type="search" name="search" class="form-control" id="searchInput" placeholder="Search" value="">

<ul id="searchResults"></ul>
</div>

<div class="form-group">
<label for="searchInput2">To</label>
<input type="search" name="search2" class="form-control" id="searchInput2" placeholder="Search" value="">

<ul id="searchResults"></ul>
</div>

<div class="form-group" id="selectContainer">
<label for="exampleSelectGender">Containers</label>
<select class="form-control" name="container_id" id="exampleSelectGender">
 @forelse ($Sizes as $Size )
        
<option value="{{$Size}}">{{$Size}}</option>
 @empty
        
 @endforelse

</select>

</div>

<div class="form-group" id="inputContainer" style="display: none;">
<label for="exampleInputEmail3">Weight</label>
<input type="text" name="weight" class="form-control" id="exampleInputEmail3" value="" placeholder="Weight" >
</div>

<div id="checkboxContainer" style="display: none;" class ="form-group">
    <label for="checkboxField">Dimensions by CM</label>
     <br>
    <input type="text" class="form-control" style="width:10%; display:inline-block;" name="length" id="checkboxField">L
    <input type="text" class="form-control" style="width:10%; display:inline;" name="weight_cm" id="checkboxField">W
    <input type="text" class="form-control" style="width:10%; display:inline;" name="height" id="checkboxField">H
 </div>
<br>

<div class="form-group">
<label for="exampleSelectGender">Commodity</label>
<select class="form-control" name="commodity_id" id="exampleSelectGender">
 @forelse ( $Commodities as $Commodity )
     
 <option value="{{$Commodity->id}}">{{$Commodity->commodity_name}}</option>
 @empty
     
 @endforelse       
 
</select>

</div>

<div class="form-group">
<label for="exampleInputPassword4">Remarks</label>
<textarea name="remarks" class="form-control"placeholder="Remarks" id="exampleInputPassword4" cols="30" rows="10"></textarea>
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('request')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection



@push('scripts')
<!-- <script>

$(document).on('click', '#shipment_type', async function () {
    let value = $(this).val();
    console.log(value);

    const response = await fetch('/all_ports/' + value);
    const ports = await response.json();
    console.log(ports);

    // Populate 'from_port' select
    const fromPortSelect = $('#from_port');
    fromPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        fromPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`
        }));
    });

    // Populate 'to_port' select
    const toPortSelect = $('#to_port');
    toPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        toPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`
        }));
    });
});
</script> -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $(document).ready(function () {
        $('#searchInput').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '/search-ports',
                    method: 'GET',
                    data: {search: request.term},

                    success: function (data) {
                        console.log(data);
                        response($.map(data, function (item) {
                            return {
                                label: item.Port_Name + ' ,' + item.Port_Code + ', ' + item.Port_Country + '',
                                value: item.Port_Name + ' ,' + item.Port_Code + ', ' + item.Port_Country + '',
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
        $('#searchInput2').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '/search-ports',
                    method: 'GET',
                    data: {search: request.term},

                    success: function (data) {
                        console.log(data);
                        response($.map(data, function (item) {
                            return {
                                label: item.Port_Name + ' ,' + item.Port_Code + ', ' + item.Port_Country + '',
                                value: item.Port_Name + ' ,' + item.Port_Code + ', ' + item.Port_Country + '',
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

        radioOption1.addEventListener('change', function () {
            if (radioOption1.checked) {
                checkboxContainer.style.display = 'none';
                selectContainer.style.display = 'block';
                inputContainer.style.display = 'none';
            }
        });

        radioOption3.addEventListener('change', function () {
            if (radioOption3.checked) {
                checkboxContainer.style.display = 'none';
                selectContainer.style.display = 'block';
                inputContainer.style.display = 'none';
            }
        });

        radioOption2.addEventListener('change', function () {
            if (radioOption2.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'none';
                inputContainer.style.display = 'block';
            }
        });

        radioOption4.addEventListener('change', function () {
            if (radioOption4.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'none';
                inputContainer.style.display = 'block';
            }
        });
    });
</script>
@endpush





