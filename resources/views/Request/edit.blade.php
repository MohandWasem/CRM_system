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

<div id="shippingcheckbox" style="display: none;">
<label for="enableFile">shipping type:</label>
    <input type="checkbox" id="shippingType1" value="1" name="shippingType">LCL
    <input type="checkbox" id="shippingType2" value="2" name="shippingType">FCL
</div>
<br>
<div style="display: none;" id='shippingtype_lcl'>

 <div class="form-group" id="inputContainer2" >
    <label for="numberboxes">number of boxes</label>
    <input type="number" name="number_shippingType" class="form-control" id="numberboxes2" value="{{$request->number_shippingType}}" placeholder="number of boxes" >
    </div>
    
    <div class="form-group" id="inputContainer" >
    <label for="weight">Weight</label>
    <input type="text" name="weight_shippingType" class="form-control" id="weight2" value="{{$request->weight_shippingType}}" placeholder="for each box" >
    </div>
    
    <div id="checkboxContainer"  class ="form-group">
        <label for="checkboxField">Dimensions by CM</label>
         <br>
        <input type="text" class="form-control" style="width:10%; display:inline-block;" value="{{$request->l_shippingType}}" placeholder="for each box" name="l_shippingType" id="checkboxFields1">L
        <input type="text" class="form-control" style="width:10%; display:inline;" value="{{$request->wCM_shippingType}}" placeholder="for each box" name="wCM_shippingType" id="checkboxFields2">W
        <input type="text" class="form-control" style="width:10%; display:inline;" value="{{$request->h_shippingType}}" placeholder="for each box" name="h_shippingType" id="checkboxFields3">H
     </div>
    
     <div class="form-group" id="inputnumber" >
    <label for="vcweight">CBM</label>
    <input type="text" name="cbm_shippingType" class="form-control" id="vcweight" value="{{$request->cbm_shippingType}}" readonly placeholder="" >
    </div>
    
    <div class="form-group" id="inputnumber2">
    <label for="vcweight">grossweight</label>
    <input type="text" name="grossw_shippingType" class="form-control" id="grossweight2" value="{{$request->grossw_shippingType}}" readonly placeholder="" >
    </div>
</div>

<div class="form-group" id="shippingtype_fcl" style="display: none;">
<label for="numberboxes">quantity</label>
<input type="number" name="numberInput" class="form-control" id="quantity" value="{{$request->quantity}}" placeholder="quantity">
</div>

<br>

<div class="form-group" id="selectContainer">
<label for="exampleSelectGender">Containers</label>
<select class="form-control" name="container_id" id="exampleSelectGender">
 @forelse ($Sizes as $Size )
        
<option value="{{$Size}}" @selected($request->container_id==$Size)>{{$Size}}</option>
 @empty
        
 @endforelse

</select>

</div>

<div id="inputContainerair" style="display: none;">

    <div class="form-group" id="inputContainer5" >
    <label for="numberboxes">number of boxes</label>
    <input type="number" name="numberBoxes" class="form-control" id="numberboxes" value="{{$request->numberBoxe}}" placeholder="number of boxes" >
    </div>
    
    <div class="form-group" id="inputContainer7" >
    <label for="weight">Weight</label>
    <input type="text" name="weight" class="form-control" id="weight" value="{{$request->weight}}" placeholder="Weight" >
    </div>
    
    <div id="checkboxContainer"  class ="form-group">
        <label for="checkboxField">Dimensions by CM</label>
         <br>
        <input type="text" class="form-control" value="{{$request->length}}" style="width:10%; display:inline-block;" placeholder="for each box" name="length" id="checkboxField1">L
        <input type="text" class="form-control" value="{{$request->weight_cm}}" style="width:10%; display:inline;" placeholder="for each box" name="weight_cm" id="checkboxField2">W
        <input type="text" class="form-control" value="{{$request->height}}" style="width:10%; display:inline;" placeholder="for each box" name="height" id="checkboxField3">H
     </div>
    
     <div class="form-group" id="inputnumber3" >
    <label for="vcweights1">vcweight</label>
    <input type="text" name="vcweight" class="form-control" id="vcweights1" value="{{$request->vcweight}}" readonly placeholder="" >
    </div>
    
    <div class="form-group" id="inputnumber2" >
    <label for="vcweight">grossweight</label>
    <input type="text" name="grossweight" class="form-control" id="grossweight" value="{{$request->grossweight}}" readonly placeholder="" >
    </div>
</div>

<div>
<label for="enableFile">DG cargo:</label>
    <input type="checkbox" id="enableFile" value="1" name="checkCargo" {{ $request->checkCargo ? 'checked' : '' }}>
</div>
    <br>
<div id="fileInputContainer" style="display: {{ $request->checkCargo ? 'block' : 'none' }}">
    <label for="fileInput">File:</label>
    <input type="file" id="fileInput" name="file[]" multiple>
</div>
<br>

<div class="form-group">
<label for="exampleSelectGender">Commodity</label>
<select class="form-control" name="commodity_id" id="exampleSelectGender">
 @forelse ( $Commodities as $Commodity )
     
 <option value="{{$Commodity->id}}" @selected($request->commodity_id==$Commodity->id)>{{$Commodity->commodity_name}}</option>
 @empty
     
 @endforelse       
 
</select>

</div>

<div >
    <label for="feature1">Type:</label>
    
    <input type="checkbox" id="Trucking" name="trucking" value="Trucking" {{$request->trucking == 'Trucking' ? 'checked' : ''}}>
    <label for="feature2">Trucking</label>

    <input type="checkbox" id="Clearance" name="clearance" value="Clearance" {{$request->Clearance == 'Clearance' ? 'checked' : ''}}>
    <label for="feature2">Clearance</label>

</div>
<br>
<div class="form-group" style="display: none;" id="input-trucking">
    <div class="form-group">
        <label for="searchInput">From</label>
        <input type="search" name="search_trucking" class="form-control" id="searchTrucking" placeholder="Search" value="{{$request->from_trucking}}">
        
        <ul id="searchResults"></ul>
        </div>
        
        <div class="form-group">
        <label for="searchInput2">To</label>
        <input type="search" name="search2_trucking" class="form-control" id="searchTrucking2" placeholder="Search" value="{{$request->to_trucking}}">
        
        <ul id="searchResults"></ul>
        </div>
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
            {{-- selected:port.id=={{$request->from_port}} --}}
            
        }));
    });

    // Populate 'to_port' select
    const toPortSelect = $('#to_port');
    toPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        toPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`,
            {{-- selected:port.id=={{$request->to_port}} --}}
        }));
    });
  }
$(document).on('click', '#shipment_type', async function () {
    let value = $(this).val();
    console.log(value);

    getports(value);

});
{{-- getports({{$request->shipment_type}}); --}}
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
                    data: {
                        search: request.term ,
                        shipping_type : $('input[name=radio_type]:checked').val()
                    },

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
                    data: {
                        search: request.term ,
                        shipping_type : $('input[name=radio_type]:checked').val()
                    },

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
        $('input[name=radio_type]:checked').on('change',function(){
             let value  = $(this).val();
             console.log(value);
             let shippingcheckbox = document.getElementById('shippingcheckbox');
             let inputContainerair = document.getElementById('inputContainerair');
             let selectContainer = document.getElementById('selectContainer');
             if(value.checked=='sea'){
                
    
                shippingcheckbox.style.display = 'block';
                inputContainerair.style.display = 'none';
                selectContainer.style.display = 'block';
             }else if(value.checked=='air'){
                shippingcheckbox.style.display = 'none';
                inputContainerair.style.display = 'block';
                selectContainer.style.display = 'none';
             }

             if(value=='land'){
                
    
                shippingcheckbox.style.display = 'none';
                inputContainerair.style.display = 'none';
                selectContainer.style.display = 'block';
             }else if(value=='courier'){
                shippingcheckbox.style.display = 'none';
                inputContainerair.style.display = 'block';
                selectContainer.style.display = 'none';

                $('#checkboxField1,#checkboxField2,#checkboxField3').on('input', function () {
                // Air Checked
                var amount = parseFloat($('#numberboxes').val()) || 0;
                var checkboxField1 = parseFloat($('#checkboxField1').val()) || 0;
                var checkboxField2 = parseFloat($('#checkboxField2').val()) || 0;
                var checkboxField3 = parseFloat($('#checkboxField3').val()) || 0;

                 $('#vcweights1').val( amount * (checkboxField1 * checkboxField2 * checkboxField3 / 5000) );
            });
             }
        });

        $('input[name=shippingType]').on('change',function(){
             let value  = $(this).val();
             console.log($(this).prop('checked'));

             let shippingtype_lcl = document.getElementById('shippingtype_lcl');
             let shippingtype_fcl = document.getElementById('shippingtype_fcl');
                 if($(this).prop('checked')){
                        if(value=='1'){
                        shippingtype_lcl.style.display = 'block';
                        shippingtype_fcl.style.display = 'none';
                         }else if(value=='2'){
                         shippingtype_lcl.style.display = 'none';
                         shippingtype_fcl.style.display = 'block';
                         }
                }else{
                  shippingtype_lcl.style.display = 'none';
                  shippingtype_fcl.style.display = 'none';
             }
        });

            $('#weight').on('input', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes').val()) || 0;
                var taxRate = parseFloat($(this).val()) || 0;

                 $('#grossweight').val( amount * taxRate );
            });

            $('#checkboxField1,#checkboxField2,#checkboxField3').on('input', function () {
                // Air Checked
                var amount = parseFloat($('#numberboxes').val()) || 0;
                var checkboxField1 = parseFloat($('#checkboxField1').val()) || 0;
                var checkboxField2 = parseFloat($('#checkboxField2').val()) || 0;
                var checkboxField3 = parseFloat($('#checkboxField3').val()) || 0;

                 $('#vcweights1').val( amount * (checkboxField1 * checkboxField2 * checkboxField3 / 6000) );
            });

                //  sea-shipping_type // 
            $('#checkboxFields1,#checkboxFields2,#checkboxFields3').on('input', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes2').val()) || 0;
                var checkboxFields1 = parseFloat($('#checkboxFields1').val()) || 0;
                var checkboxFields2 = parseFloat($('#checkboxFields2').val()) || 0;
                var checkboxFields3 = parseFloat($('#checkboxFields3').val()) || 0;

                 $('#vcweight').val( amount * (checkboxFields1 * checkboxFields2 * checkboxFields3 / 1000000) );
            });

            $('#weight2').on('input', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes2').val()) || 0;
                var taxRate = parseFloat($(this).val()) || 0;

                 $('#grossweight2').val( amount * taxRate );
            });
    });
</script>
@endpush

     <!-- document-sea-enablefile-DB-cargo -->
@push('scripts')
<script>
        $(document).ready(function () {
            // Handle checkbox change
            $('#enableFile').change(function () {
                // Show/hide file input based on checkbox state
                if ($(this).prop('checked')) {
                    $('#fileInputContainer').show();
                } else {
                    $('#fileInputContainer').hide();
                }
            });
        });
    </script>

</script>
<!-- Type-trucking --> 
<script>
//  $(document).ready(function () {
//      $('#Trucking ').change(function () {
//          if ($(this).prop('checked')) {
//              $('#input-trucking').show();
//          } else {
//              $('#input-trucking').hide();
//          }
//      });
//  });

        const checkbox = document.getElementById('Trucking');
        const textInput = document.getElementById('input-trucking');

        // Add event listener to checkbox
        checkbox.addEventListener('change', function() {
            // If checkbox is checked, show the text input; otherwise, hide it
            if (checkbox.checked) {
                textInput.style.display = 'block';
            } else {
                textInput.style.display = 'none';
            }
        });

 $(document).ready(function () {
 $('#searchTrucking').autocomplete({
     source: function (request, response) {
         $.ajax({
             url: '/search-trucking',
             method: 'GET',
             data: {
                 search: request.term ,
                 shipping_type : $('input[name=trucking]:checked').val()
             },

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

$(document).ready(function () {
 $('#searchTrucking2').autocomplete({
     source: function (request, response) {
         $.ajax({
             url: '/search-trucking',
             method: 'GET',
             data: {
                 search: request.term ,
                 shipping_type : $('input[name=trucking]:checked').val()
             },

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







<!-- @push('scripts')
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
        var inputnumber3 = document.getElementById('inputnumber3');
        var checkboxContainer = document.getElementById('checkboxContainer');
        var selectContainer = document.getElementById('selectContainer');
        var shippingcheckbox = document.getElementById('shippingcheckbox');
        var numberInputContainer = document.getElementById('numberInputContainer');


        function updateVisibility() {
            if (radioOption1.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'block';
                shippingcheckbox.style.display = 'block';
                inputContainer.style.display = 'block';
                inputContainer2.style.display = 'block';
                inputnumber.style.display = 'block';
                inputnumber2.style.display = 'block';
                inputnumber3.style.display = 'none';

                $(document).ready(function () {
            // Handle input changes
            $('#numberboxes2, #weight2,#checkboxFields1,#checkboxFields2,#checkboxFields3').on('input', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes2').val()) || 0;
                var taxRate = parseFloat($('#weight2').val()) || 0;
                var length =  parseFloat($('#checkboxFields1').val()) || 0;
                var weight =  parseFloat($('#checkboxFields2').val()) || 0;
                var height =  parseFloat($('#checkboxFields3').val()) || 0;
                // console.log(amount);

                // Calculate tax amount
                // var taxAmount = (amount * (length / 6000));
                var taxAmount = (amount * (length * weight * height / 1000000));

                // Calculate total including tax
                var total = amount + taxAmount;

                // Display result
                // $('#vcweight').val('Amount: ' + amount.toFixed(2) + ', Tax: ' + taxAmount.toFixed(2) + ', Total: ' + total.toFixed(2));
                $('#vcweight2').val( taxAmount );
            });
        });

            } else if (radioOption2.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'none';
                inputContainer.style.display = 'block';
                inputContainer2.style.display = 'block';
                inputnumber.style.display = 'none';
                inputnumber2.style.display = 'block';
                inputnumber3.style.display = 'block';
                shippingcheckbox.style.display = 'none';

                $(document).ready(function () {
            // Handle input changes
            $('#numberboxes2, #weight,#checkboxFields1,#checkboxFields2,#checkboxFields3').on('input change', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes2').val()) || 0;
                var taxRate = parseFloat($('#weight').val()) || 0;
                var length =  parseFloat($('#checkboxFields1').val()) || 0;
                var weight =  parseFloat($('#checkboxFields2').val()) || 0;
                var height =  parseFloat($('#checkboxFields3').val()) || 0;
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
                shippingcheckbox.style.display = 'none';
            } else if (radioOption4.checked) {
                checkboxContainer.style.display = 'block';
                selectContainer.style.display = 'none';
                inputContainer.style.display = 'block';
                inputContainer2.style.display = 'block';
                inputnumber.style.display = 'none';
                inputnumber2.style.display = 'block';
                inputnumber3.style.display = 'block';
                shippingcheckbox.style.display = 'none';

                $(document).ready(function () {
            // Handle input changes
            $('#numberboxes2, #weight,#checkboxFields1,#checkboxFields2,#checkboxFields3').on('input', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes2').val()) || 0;
                var taxRate = parseFloat($('#weight').val()) || 0;
                var length =  parseFloat($('#checkboxFields1').val()) || 0;
                var weight =  parseFloat($('#checkboxFields2').val()) || 0;
                var height =  parseFloat($('#checkboxFields3').val()) || 0;
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

@endpush -->

<!-- @push('scripts')

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

@endpush -->


<!-- @push('scripts')
<script>
        $(document).ready(function () {
            // Initial state
            toggleFileInput();

            // Toggle file input visibility based on checkbox
            $('#enableFile').change(function () {
                toggleFileInput();
            });

            // Function to toggle file input visibility
            function toggleFileInput() {
                if ($('#enableFile').prop('checked')) {
                    $('#fileInputContainer').show();
                } else {
                    $('#fileInputContainer').hide();
                }
            }
        });
    </script>
@endpush -->

<!-- @push('scripts')

<script>
        $(document).ready(function () {
            // Toggle text input visibility based on checkbox1
            $('#shippingType1').change(function () {
                toggleTextInput();
            });

            // Toggle number input visibility based on checkbox2
            $('#shippingType2').change(function () {
                toggleNumberInput();
            });

            // Function to toggle text input visibility
            function toggleTextInput() {
                if ($('#shippingType1').prop('checked')) {
                    $('#inputContainer2').show();
                    $('#inputContainer').show();
                    $('#checkboxContainer').show();
                    $('#inputnumber').show();
                    $('#inputnumber2').show();
                } else {
                    $('#inputContainer2').hide();
                    $('#inputContainer').hide();
                    $('#checkboxContainer').hide();
                    $('#inputnumber').hide();
                    $('#inputnumber2').hide();
                }
            }

            // Function to toggle number input visibility
            function toggleNumberInput() {
                if ($('#shippingType2').prop('checked')) {
                    $('#numberInputContainer').show();
                } else {
                    // $('#numberInputContainer').hide();
                    $('#inputContainer2').hide();
                    $('#inputContainer').hide();
                    $('#checkboxContainer').hide();
                    $('#inputnumber').hide();
                    $('#inputnumber2').hide();
                }
            }
        });
    </script>
@endpush -->

<!-- @push('scripts')

<script>
        $(document).ready(function () {
            // Handle input changes
            $('#numberboxes2, #weight2').on('input', function () {
                // Get input values
                var amount = parseFloat($('#numberboxes2').val()) || 0;
                var taxRate = parseFloat($('#weight2').val()) || 0;
                // console.log(amount);

                // Calculate tax amount
                var taxAmount = (amount * taxRate );
                // var taxAmount = (amount * (length * weight * height / 6000));

                // Calculate total including tax
                // var total = amount + taxAmount;

                // Display result
                // $('#vcweight').val('Amount: ' + amount.toFixed(2) + ', Tax: ' + taxAmount.toFixed(2) + ', Total: ' + total.toFixed(2));
                $('#grossweight2').val( taxAmount );
            });
        });
    </script>

@endpush -->

