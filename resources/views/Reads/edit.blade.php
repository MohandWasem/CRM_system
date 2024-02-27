@extends("layout.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Rates</h4>
<br>

<form class="forms-sample" action="{{route('Rates.update',$rates->id)}}" method="post" >
@csrf


<div class="form-group">
<label for="carrier_type_id">Carrier Type</label>
<select class="form-control" name="carrier_type_id" id="carrier_type_id">
    @forelse($carriers_types as $carriers_type )
    <option value="{{$carriers_type->id}}" @selected($rates->carrier_type_id==$carriers_type->id)>{{$carriers_type->type}}</option>
    @empty
    @endforelse
</select>
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
<option value="{{$container_type->id}}" @selected($rates->container_type_id==$container_type->id)>{{$container_type->container_type}}</option>
@empty
@endforelse
</select>
</div>

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
<script>
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