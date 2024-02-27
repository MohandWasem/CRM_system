@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Rates</h4>
<br>

<form class="forms-sample" action="{{route('Rates.show')}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleSelectGender">Carrier Name</label>
<select class="form-control" name="carrier_name_id" id="exampleSelectGender">
@forelse($carriers as $carriers )
<option value="{{$carriers->id}}">{{$carriers->carrier_name}}</option>
@empty
@endforelse
</select>
</div>

<div class="form-group">
<label for="carrier_type_id">Carrier Type</label>
<select class="form-control" name="carrier_type_id" id="carrier_type_id">
@forelse($carriers_types as $carriers_type )
<option value="{{$carriers_type->id}}">{{$carriers_type->type}}</option>
@empty
@endforelse
</select>
</div>

<div class="form-group">
<label for="from_port">Pol</label>

<select class="form-control" name="pol" id="pol">

<option value=""></option>

</select>

</div>

<div class="form-group">
<label for="to_port">Pod</label>

<select class="form-control" name="pod" id="pod">

<option value=""></option>


</select>

</div>

<div class="form-group">
<label for="exampleSelectGender">Container Type</label>
<select class="form-control" name="container_type_id" id="exampleSelectGender">
@forelse($container_type as $container_type )
<option value="{{$container_type->id}}">{{$container_type->container_type}}</option>
@empty
@endforelse
</select>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Price</label>
<input type="number" name="price" class="form-control" id="exampleInputPassword4" value="{{old('price')}}" placeholder="Price" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Free Time</label>
<input type="text" name="free_time" class="form-control" id="exampleInputPassword4" value="{{old('free_time')}}" placeholder="Free Time" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Transit Time</label>
<input type="text" name="transit_time" class="form-control" id="exampleInputPassword4" value="{{old('transit_time')}}" placeholder="Transit Time" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Validitiy Date</label>
<input type="text" name="validitiy_date" class="form-control" id="exampleInputPassword4" value="{{old('validitiy_date')}}" placeholder="Validitiy Date" required>
</div>


<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="notes" class="form-control"placeholder="Notes" id="exampleInputPassword4" cols="30" rows="10"></textarea>
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Rates')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection


@push('scripts')

<script>
    $(document).on('click','#carrier_type_id', async function(){
        let value = $(this).val();
           console.log(value);

           const response = await fetch('/all_ports/' + value);
           const ports = await response.json();
            console.log(ports);

            // Populate 'pol' select
    const fromPortSelect = $('#pol');
    fromPortSelect.empty(); // Clear existing options

    ports.ports.forEach(port => {
        fromPortSelect.append($('<option>', {
            value: port.id,
            text: `${port.Port_Name} - ${port.Port_Code} - ${port.Port_Country}`
        }));
    });

        // Populate 'pod' select
        const toPortSelect = $('#pod');
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