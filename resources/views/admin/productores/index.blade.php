@extends('layouts.web')
@section('title', 'Productrores')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Productores</li>
    </ol>

    <table class="table" id="pd">
        <thead>
            <tr >
                <th>id</th>
                <th>Productor</th>
                <th>Region</th>
            </tr>
        </thead>
        
    </table>




@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#pd').DataTable({

            processing: true,
            serverSide: true,
            ajax: '{{ url('productoresDatetables')}}',
            columns: [
                        { data: 'productor_id', name: 'productor_id' },
                        { data: 'productor_nombre', name: 'productor_nombre' },
                        { data: 'region.region_nombre', name: 'region.region_nombre' }
                        
                     ]
        });
    });
</script>
@endsection