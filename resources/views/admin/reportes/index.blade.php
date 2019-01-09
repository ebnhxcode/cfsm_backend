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
    {{--<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>--}}
@endsection

@push('custom_js')
    {!! $dataTable->scripts() !!}
@endpush