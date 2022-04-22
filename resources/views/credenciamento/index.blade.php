@extends('adminlte::page')

@section('title', 'Credenciamento')

@section('content_header')
    <h1>Credenciamento - Etapas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Etapas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body"> 
        <div class="row">
            <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#etapa1">1º Etapa</button>
            <button type="button" class="btn btn-block btn-primary btn-lg">2º Etapa</button>
        </div>
    </div>
    @stop
</div>

<!-- Modal Etapa 1 -->
<div class="modal fade" id="etapa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Etapa 1º</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechars</button>
      </div>
    </div>
  </div>
</div>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop