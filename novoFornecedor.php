
<script src="require/js/newFornecedor.js"></script>
<div class="content" style="margin-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <input type="hidden" id="arraySelecionados">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Cadastro de fornecedores</h4>
            <p class="card-category">Atenção nas informações!</p>
          </div>
          <div class="card-body">
            <div>
              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome</label>
                    <input type="text" id="nome" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
  		           <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">CPF/CNPJ</label>
                    <input type="text" id="documento" class="form-control">
                  </div>
  		           </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Localidade</label>
                    <input type="text" id="localidade" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tipo de Fornecedor</label>
                    <input type="text" id="tipoDeFornecedor" class="form-control">
                  </div>
                </div>
              </div>
              <br><br>
              <div id="ErrorLog" class="hideAll alert alert-danger col-12 center"></div>
              <button type="submit" class="btn btn-info pull-right"
                onclick="criarUsuario()">Criar Fornecedor</button>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="../../require/img/marc.png" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">Novo Fornecedor</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../../require/fmk/jquery.mask.js"></script>
<script>
  $('#datanasc').mask('00/00/0000');
  $('#phone').mask('(00) 0 0000-0000');
</script>