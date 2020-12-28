@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Exemplo Tabela</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

<table class="table table-bordered">
    <thead>                  
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach ($users as $user) 
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
@stop
    </tbody>
</table>
    </div>
</div>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop