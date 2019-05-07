@extends ('layouts.admin2')
@section ('barraizda')
                @include('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda')
@endsection
@section ('contenido')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="page-header">
                @include('includes.admin.tables.infoReferidosTable')
                @include('includes.admin.tables.infoAnunciosProvincias')
            </div>
        </div>
    </div>
</div>
@endsection
