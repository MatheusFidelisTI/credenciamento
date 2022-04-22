@extends('adminlte::page')
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
@section('title', 'Arquivos')

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
            <div>
                <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal"
                    data-target="#arquivosModal">+ Arquivos</button>
            </div>

            <!-- Modal Arquivos -->
            <div class="modal fade" id="arquivosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Arquivos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row" style="clear: both;margin-top: 18px;">
                                            <div class="col-12">
                                                <div class="dropzone" id="dropzoneFileUpload"></div>
                                            </div>
                                        </div>
                                        @csrf
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="uploadPhoto">Upload Photo</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
                Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone("div#dropzoneFileUpload", {
                    url: '{{ route('file.store') }}',
                    maxFilesize: 2, // MB
                    maxFiles: 1,
                    addRemoveLinks: true,
                    autoProcessQueue: false,
                    params: {
                        _token: "{{ csrf_token() }}"
                    },

                });

                myDropzone.on("success", function(file, resp) {
                    if (resp.status == "200") {
                        alert("Image uploaded successfully");
                    } else {
                        alert("Faild to upload image! Try again");
                    }
                });

                $("#uploadPhoto").click(function() {
                    myDropzone.processQueue();
                });

                function deleteAction(id) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var type = "GET";
                    var ajaxurl ="{{route('file.delete', ":id")}}";
                    ajaxurl = ajaxurl.replace(":id", id);
                    $.ajax({
                        type: type,
                        url: ajaxurl,
                        dataType: 'json',
                        success: function(data) {
                            alert('excluido com sucesso');
                        },
                        error: function(data) {
                            alert('Erro!');
                        }
                    });
                }
            </script>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Opçoes</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($arquivos as $arquivo)
                        <tr>
                            <td>{{ $arquivo->name }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" onclick="deleteAction({{ $arquivo->id }})"
                                        class="btn btn-danger">Deletar</button>
                                </div>
                            </td>
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
