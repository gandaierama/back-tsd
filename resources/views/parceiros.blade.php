@include('shared/header')


<div class="wrapper ">
    @include('shared/sidebar')
    <div class="main-panel">
      @include('shared/navbar')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Parceiros</h4>
                  <p class="card-category"> Listagem de motoboys cadastrados</p>
                  <a class="btn btn-primary"  data-toggle="modal" data-target="#basicExampleModal" style=" position:absolute; margin-top: -40px; right:10px;">Add</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Nome
                        </th>
                        <th>
                          CPF
                        </th>
                        <th>
                          Bairro
                        </th>
                        <th>
                          Ação
                        </th>
                      </thead>
                      <tbody>
                        @foreach ($objects as $item)
                            <tr>
                          <td>
                            {{ $item['id'] }}
                          </td>
                          <td>
                            {{ $item['nome'] }}
                          </td>
                          <td>
                            {{ $item['cpf'] }}
                          </td>
                          <td>
                            {{ $item['bairro'] }}
                          </td>
                          <td class="text-primary">
                            <button type="button" data-id="{{ $item['id'] }}" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm btn-editar">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" data-id="{{ $item['id'] }}" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm btn-delete">
                                <i class="material-icons">close</i>
                              </button>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
         
          </div>
        </div>
      </div>



<!-- Modal -->
<div class="modal fade" id="basicExampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Editar Parceiro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-ed">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome</label>
                          <input name="nome" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">CPF</label>
                          <input  name="cpf" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">E-mail</label>
                          <input  name="email" type="email" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CNPJ</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CNH</label>
                          <input  name="cnh" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Banco</label>
                          <input type="text" name="banco" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Agência</label>
                          <input name="agencia" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Conta</label>
                          <input name="conta" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Chave Pix</label>
                          <input type="text" name="pix" class="form-control">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Endereço</label>
                          <input  name="endereco" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Número</label>
                          <input  name="numero" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Complemento</label>
                          <input  name="complemento" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bairro</label>
                          <input  name="bairro" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cidade</label>
                          <input  name="cidade" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Estado</label>
                          <input  name="estado" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">CEP</label>
                          <input name="cep" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Comprovante de residência</label>
                          <input  name="doc_comprovante" type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Documento da moto</label>
                          <input type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Habilitação</label>
                          <input type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Certificado MEI</label>
                          <input  name="doc_mei" type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Foto da moto com a placa</label>
                          <input type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Foto da moto com a placa</label>
                          <input type="file" class="form-control" id="customFile" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div >
                          <label class="bmd-label-floating">Foto rosto com a cnh na mão</label>
                          <input type="file" >
                        </div>
                      </div>

       
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefone Contato 1</label>
                          <input  name="telefone1" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefone Contato 2</label>
                          <input  name="telefone2" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefone Contato 3</label>
                          <input  name="telefone3" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" id="btn-editar" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Parceiro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-cad">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome</label>
                          <input name="nome" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">CPF</label>
                          <input  name="cpf" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">E-mail</label>
                          <input  name="email" type="email" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CNPJ</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">CNH</label>
                          <input  name="cnh" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Banco</label>
                          <input type="text" name="banco" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Agência</label>
                          <input name="agencia" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Conta</label>
                          <input name="conta" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Chave Pix</label>
                          <input type="text" name="pix" class="form-control">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Endereço</label>
                          <input  name="endereco" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Número</label>
                          <input  name="numero" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Complemento</label>
                          <input  name="complemento" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bairro</label>
                          <input  name="bairro" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cidade</label>
                          <input  name="cidade" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Estado</label>
                          <input  name="estado" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">CEP</label>
                          <input name="cep" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Comprovante de residência</label>
                          <input  name="doc_comprovante" type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Documento da moto</label>
                          <input type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Habilitação</label>
                          <input type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Certificado MEI</label>
                          <input  name="doc_mei" type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Foto da moto com a placa</label>
                          <input type="file" class="form-control" id="customFile" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div >
                          <label class="form-label" for="customFile">Foto da moto com a placa</label>
                          <input type="file" class="form-control" id="customFile" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div >
                          <label class="bmd-label-floating">Foto rosto com a cnh na mão</label>
                          <input type="file" >
                        </div>
                      </div>

       
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefone Contato 1</label>
                          <input  name="telefone1" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefone Contato 2</label>
                          <input  name="telefone2" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefone Contato 3</label>
                          <input  name="telefone3" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" id="btn-cadastrar" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('.btn-editar').click( function() {
    console.log("foi");
    
    $(this).hide();
    let id=$(this).data("id");
    $('#form-ed input').attr('readonly', true);
    $.ajax({
        url: '/api/parceiros/'+id,
        type: 'get',
        dataType: 'json',
        success: function(data) {
          $("#basicExampleModal2").show();
          $(this).show();
                  console.log(data);
        }
    });
});


$('.btn-delete').click( function() {
    console.log("foi");
    let id=$(this).data("id");
    if (window.confirm("Você realmente quer apagar o id: "+id+" ?")) {
      $.ajax({
          url: '/api/parceiros/delete/'+id,
          type: 'post',
          dataType: 'json',
          data: { 'id': id },
          success: function(data) {
                  
                    location.reload();
          }
      });
    }
    
});

  $('#btn-cadastrar').click( function() {
    console.log("foi");
    $("#btn-cadastrar").hide();
    $('#form-cad input').attr('readonly', true);
    $.ajax({
        url: '/api/parceiros',
        type: 'post',
        dataType: 'json',
        data: $('#form-cad').serialize(),
        success: function(data) {
                  $("#basicExampleModal").hide();
                  location.reload();
        }
    });
});
</script>
@include('shared/footer')
