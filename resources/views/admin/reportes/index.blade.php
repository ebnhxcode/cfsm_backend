@extends('layouts.web')
@section('title', 'Reportes')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Reportes</li>
    </ol>

    {{-- link_to_route('productores.create', 'Agregar', $parameters = null , $attributes = ['class'=>'btn btn-success']) --}}

    {!! $dataTable->table() !!}

@endsection
@section('js')
@endsection

@push('custom_js')
    <link rel="stylesheet" href="{{ url('vendor/datatables/buttons.bootstrap4.min.css') }}">
    <script src="{{ url('vendor/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>

    <script type="text/javascript">
        // Parametros por defecto de los DataTable
        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
                "url": "{{ url('vendor/datatables/spanish.json') }}"
            },
            'autoWidth': false,
            'stateSave': true
        });
    </script>
  
    {!! $dataTable->scripts() !!}
@endpush