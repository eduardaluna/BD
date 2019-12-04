<?php 
    use Models\Cliente;
    $cliente  = new Cliente();   
    $vetor  = $cliente->All();
?>
<script src="require/js/newPedido.js"></script>
<div class="content" style="margin-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <input type="hidden" id="arraySelecionados">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Cadastro de Pedidos</h4>
            <p class="card-category">Atenção nas informações!</p>
          </div>
          <div class="card-body">
            <div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Cliente</label>
                    <select class="form-control" id="cliente"> 
                      <option></option>
                      <?php foreach($vetor as $client){?>
                        <option value="<?=$client["id"]?>"><?=$client["nome"]?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Data do Pedido</label>
                    <br>
                    <input type="date" id="dataPedido" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Data da Entrega</label>
                    <br>
                    <input type="date" id="dataEntrega" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Modo Encomenda</label>
                    <select id="modoEncomenda" class="form-control">
                        <option value="Presencial">Presencial</option>
                        <option value="Online">Entrega</option>
                    </select>
                  </div>
                </div>
              </div>
              <br><br>
              <div id="ErrorLog" class="hideAll alert alert-danger col-12 center"></div>
              <button type="submit" class="btn btn-info pull-right"
              onclick="criarPedido()">Criar Pedido</button>
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
            <h6 class="card-category text-gray">Novo Pedido</h6>
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
