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
@error("client_name")<div style="color:red;">{{$message}}</div>@enderror
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
<label for="shipment_type">Shipment Type</label>

<select class="form-control" name="shipment_type" id="shipment_type">
@forelse ($type as $type )
<option value="{{$type->id}}">{{$type->type}}</option>
@empty

@endforelse

</select>
@error("shipment_type")<div style="color:red;">{{$message}}</div>@enderror
</div>


<div class="form-group">
<label for="from_port">From</label>

<select class="form-control" name="from_port" id="from_port">

<option value=""></option>

</select>

</div>

<div class="form-group">
<label for="to_port">To</label>

<select class="form-control" name="to_port" id="to_port">

<option value=""></option>


</select>

</div>

<div class="form-group">
<label for="exampleSelectGender">Containers</label>
<select class="form-control" name="container_id" id="exampleSelectGender">
 @forelse ($Sizes as $Size )
        
<option value="{{$Size}}">{{$Size}}</option>
 @empty
        
 @endforelse



</select>

</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('request')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection



@push('scripts')
<script>
//     $(document).on('click','#shipment_type',async function(){
//         let value = $(this).val();
//         console.log(value);
//         const response = await fetch('/all_ports/' + value);
//   const ports = await response.json();
//   console.log(ports);

//   let selectInput = $('#from_port');
//   let toPortSelect = $('#to_port');

//     // Clear existing options
//     selectInput.empty();
//     toPortSelect.empty();

//     // Add new options based on the retrieved data
//     ports.ports.forEach(port => {
//         // Create a new option element
//         let option = $('<option>');

//         // Set the value of the option to the port id
//         option.val(port.id);

//         // Set the text content of the option to the Port_Name
//         option.text(port.Port_Name);

//         // Append the option to the select input
//         selectInput.append(option);
        
//     });
//     });

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
</script>
@endpush
