
<script src="require/js/newClient.js"></script>
<div class="content" style="margin-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <input type="hidden" id="arraySelecionados">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Cadastro de pessoas</h4>
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email (você poderá adicionar outros posteriormente)</label>
                    <input type="email" id="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">CPF</label>
                    <input type="text" id="cpf" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Limite de Crédito</label>
                    <input type="text" id="limite" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Telefone (você poderá adicionar outros posteriormente)</label>
                    <input type="text" id="phone" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">País</label>
                    <input type="text" id="pais" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Estado</label>
                    <input type="text" id="estado" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Cidade</label>
                    <input type="text" id="cidade" class="form-control">
                  </div>
                </div>
              </div>
              <br><br>
              <div id="ErrorLog" class="hideAll alert alert-danger col-12 center"></div>
              <button type="submit" class="btn btn-info pull-right"
              onclick="criarUsuario()">Criar Funcionário</button>
              <div class="clearfix"></div>
          </div>
          </div></div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="../../require/img/marc.png" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">Nova pessoa</h6>
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
