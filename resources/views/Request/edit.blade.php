@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Request</h4>
<br>
<form class="forms-sample" action="{{route('request/update',$request->id)}}" method="post">
@csrf

<div class="form-group">
<label for="exampleSelectGender">Client Name</label>

<select class="form-control" name="client_name" id="exampleSelectGender">
@forelse ($client as $client )
<option value="{{$client->id}}" @selected($request->client_name==$client->id)>{{$client->comapny_name}}</option>
@empty

@endforelse

</select>
</div>

<div class="form-group">
<label for="exampleSelectGender">Shipment Direction</label>
<select class="form-control" name="shipment_direction" id="exampleSelectGender">
<option value="1" @selected($request->shipment_direction==1)>Import</option>
<option value="0" @selected($request->shipment_direction==0)>Export</option>
</select>
@error("shipment_direction")<div style="color:red;">{{$message}}</div>@enderror
</div>




<div class="form-group">
<h6>Shipment Type:</h6>

<input type="radio" id="contactChoice1" name="radio_type" value="sea" {{$request->radio_type == 'sea' ? 'checked' : ''}} />
<label for="contactChoice1">Sea</label>

<input type="radio" id="contactChoice2" name="radio_type" value="air" {{$request->radio_type == 'air' ? 'checked' : ''}} />
<label for="contactChoice1">Air</label>

<input type="radio" id="contactChoice3" name="radio_type" value="land" {{$request->radio_type == 'land' ? 'checked' : ''}} />
<label for="contactChoice1">Land</label>

<input type="radio" id="contactChoice4" name="radio_type" value="courier" {{$request->radio_type == 'courier' ? 'checked' : ''}} />
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
<input type="search" name="search" class="form-control" id="searchInput" placeholder="Search" value="{{$request->from_port}}">

<!-- <input type="text" id="searchInput"> -->
<ul id="searchResults"></ul>
</div>

<div class="form-group">
<label for="searchInput2">To</label>
<input type="search" name="search2" class="form-control" id="searchInput2" placeholder="Search" value="{{$request->to_port}}">

<!-- <input type="text" id="searchInput"> -->
<ul id="searchResults"></ul>
</div>

<div class="form-group" id="selectContainer">
<label for="exampleSelectGender">Containers</label>
<select class="form-control" name="container_id" id="exampleSelectGender">
 @forelse ($Sizes as $Size )
        
<option value="{{$Size}}" @selected($request->container_id==$Size)>{{$Size}}</option>
 @empty
        
 @endforelse

</select>

</div>

<div class="form-group" id="inputContainer2" style="display: none;">
<label for="numberboxes">number of boxes</label>
<input type="number" name="numberBoxes" class="form-control" id="numberboxes" value="{{$request->numberBoxe}}" placeholder="number of boxes" >
</div>

<div class="form-group" id="inputContainer" style="display: none;">
<label for="weight">Weight</label>
<input type="text" name="weight" class="form-control" id="weight"  placeholder="Weight" value="{{$request->weight}}">
</div>

<div id="checkboxContainer" style="display: none;" class ="form-group">
       <!-- <h6>weight</h6> -->
    <label for="checkboxField">Dimensions by CM</label>
    <br>
     <input type="text" class="form-control" value="{{$request->length}}" style="width:10%; display:inline-block;" name="length" id="checkboxField1">L
     <input type="text" class="form-control" value="{{$request->weight_cm}}" style="width:10%; display:inline;" name="weight_cm" id="checkboxField2">W
     <input type="text" class="form-control" value="{{$request->height}}" style="width:10%; display:inline;" name="height" id="checkboxField3">H
 </div>

 <div class="form-group" id="inputnumber" style="display: none;">
<label for="vcweight">vcweight</label>
<input type="text" name="vcweight" class="form-control" id="vcweight" value="{{$request->vcweight}}" readonly placeholder="for each box" >
</div>

<div class="form-group" id="inputnumber2" style="display: none;">
<label for="vcweight">grossweight</label>
<input type="text" name="grossweight" class="form-control" id="grossweight" value="{{$request->grossweight}}" readonly placeholder="for each box" >
</div>

<div class="form-group">
<label for="exampleSelectGender">Commodity</label>
<select class="form-control" name="commodity_id" id="exampleSelectGender">
 @forelse ( $Commodities as $Commodity )
     
 <option value="{{$Commodity->id}}" @selected($request->commodity_id==$Commodity->id)>{{$Commodity->commodity_name}}</option>
 @empty
     
 @endforelse       
 
</select>

</div>

<div class="form-group">
<label for="exampleInputPassword4">Remarks</label>
<textarea name="remarks" class="form-control"placeholder="Remarks" id="exampleInputPassword4" cols="30" rows="10" value="{{$request->remarks}}">{{$request->remarks}}</textarea>
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
   async function getports(value){
    const response = await fetch('/all_ports/' + value);
    const ports = await response.json();
    console.log(ports);

    // Populate 'from_port' select
    const fromPortSelect = $('#from_port');
    fromPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        fromPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`,
            selected:port.id=={{$request->from_port}}
            
        }));
    });

    // Populate 'to_port' select
    const toPortSelect = $('#to_port');
    toPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        toPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`,
            selected:port.id=={{$request->to_port}}
        }));
    });
  }
$(document).on('click', '#shipment_type', async function () {
    let value = $(this).val();
    console.log(value);

    getports(value);

});
getports({{$request->shipment_type}});
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
        var inputContainer2 = document.getElementById('inputContainer2');
        var inputnumber = document.getElementById('inputnumber');
        var inputnumber2 = document.getElementById('inputnumber2');
        var checkboxContainer = document.getElementById('checkboxContainer');
        var selectContainer = document.getElementById('selectContainer');


        function updateVisibility() {
            if (radioOption1.checked) {
                checkboxContainer.style.display = 'none';
                selectContainer.style.display = 'block';
                inputContainer.style.display = 'none';
                inputContainer2.style.display = 'none';
                inputnumber.style.display = 'none';
                inputnumber2.style.display = 'none';
            } else if (radioOption2.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'none';
                inputContainer.style.display = 'block';
                inputContainer2.style.display = 'block';
                inputnumber.style.display = 'block';
                inputnumber2.style.display = 'block';

                $(document).ready(function () {
            // Handle input changes
            $('#numberboxes, #weight,#checkboxField1,#checkboxField2,#checkboxField3').on('input change', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes').val()) || 0;
                var taxRate = parseFloat($('#weight').val()) || 0;
                var length =  parseFloat($('#checkboxField1').val()) || 0;
                var weight =  parseFloat($('#checkboxField2').val()) || 0;
                var height =  parseFloat($('#checkboxField3').val()) || 0;
                // console.log(amount);

                // Calculate tax amount
                // var taxAmount = (amount * (length / 6000));
                var taxAmount = (amount * (length * weight * height / 6000));

                // Calculate total including tax
                var total = amount + taxAmount;

                // Display result
                // $('#vcweight').val('Amount: ' + amount.toFixed(2) + ', Tax: ' + taxAmount.toFixed(2) + ', Total: ' + total.toFixed(2));
                $('#vcweight').val( taxAmount );
            });
        });
            }

            if (radioOption3.checked) {
                checkboxContainer.style.display = 'none';
                selectContainer.style.display = 'block';
                inputContainer.style.display = 'none';
                inputContainer2.style.display = 'none';
                inputnumber.style.display = 'none';
                inputnumber2.style.display = 'none';
            } else if (radioOption4.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'none';
                inputContainer.style.display = 'block';
                inputContainer2.style.display = 'block';
                inputnumber.style.display = 'block';
                inputnumber2.style.display = 'block';

                $(document).ready(function () {
            // Handle input changes
            $('#numberboxes, #weight,#checkboxField1,#checkboxField2,#checkboxField3').on('input', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes').val()) || 0;
                var taxRate = parseFloat($('#weight').val()) || 0;
                var length =  parseFloat($('#checkboxField1').val()) || 0;
                var weight =  parseFloat($('#checkboxField2').val()) || 0;
                var height =  parseFloat($('#checkboxField3').val()) || 0;
                // console.log(amount);

                // Calculate tax amount
                // var taxAmount = (amount * (length / 6000));
                var taxAmount = (amount * (length * weight * height / 5000));

                // Calculate total including tax
                var total = amount + taxAmount;

                // Display result
                // $('#vcweight').val('Amount: ' + amount.toFixed(2) + ', Tax: ' + taxAmount.toFixed(2) + ', Total: ' + total.toFixed(2));
                $('#vcweight').val( taxAmount );
            });
        });
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

@push('scripts')

<script>
        $(document).ready(function () {
            // Handle input changes
            $('#numberboxes, #weight').on('input', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes').val()) || 0;
                var taxRate = parseFloat($('#weight').val()) || 0;
                // console.log(amount);

                // Calculate tax amount
                var taxAmount = (amount * taxRate );
                // var taxAmount = (amount * (length * weight * height / 6000));

                // Calculate total including tax
                // var total = amount + taxAmount;

                // Display result
                // $('#vcweight').val('Amount: ' + amount.toFixed(2) + ', Tax: ' + taxAmount.toFixed(2) + ', Total: ' + total.toFixed(2));
                $('#grossweight').val( taxAmount );
            });
        });
    </script>

@endpush

