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
    {!! $dataTable->scripts() !!}
@endsection