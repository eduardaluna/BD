<?php 
    use Models\Cliente;
    $cliente  = new Cliente();  
    
    use Models\Pedido;
    $pedido = new Pedido();   
    $vetor  = $pedido->All();
    $vetor2 = $cliente->All();
    

    $getlink = $_SERVER["REQUEST_URI"];
    $getlink = explode('=', $getlink);
    $pedido->find($getlink[1]);

    $cliente->find($pedido->Cliente_id);
 
?>

<script src="require/js/newPedido.js"></script>
<div class="content" style="margin-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" >
        <input type="hidden" value="<?= $pedido->id?>" id="id">
        
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edição de Pedidos</h4>
            <p class="card-category">Atenção nas informações!</p>
          </div>
          <div class="card-body">
            <div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Data do Pedido</label>
                    <br>
                    <?php
                      $data =  explode(' ', $pedido->dataPedido);
                      $data =  explode('-', $data[0]);
                      $data = $data[0].'-'.$data[1].'-'.$data[2];
                    ?>
                    <input type="date" id="dataPedido" value="<?= $data ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Data da Entrega</label>
                    <br>
                    <?php
                      $data =  explode(' ', $pedido->dataEntrega);
                      $data =  explode('-', $data[0]);
                      $data = $data[0].'-'.$data[1].'-'.$data[2];
                    ?>
                    <input type="date" id="dataEntrega" value="<?= $data ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label class="bmd-label-floating">Cliente</label>
                      <select class="form-control" id="cliente"> 
                        <option value="<?= $cliente->id?>"><?=$cliente->nome?></option>
                        <?php foreach($vetor2 as $armz){?>
                          <option value="<?=$armz["id"]?>"><?=$armz["nome"]?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Modo Encomenda</label>
                    <select id="modoEncomenda" class="form-control">
                        <option value="<?= $pedido->modoEncomenda?>"><?=$pedido->modoEncomenda?></option>  
                        <option value="Presencial">Presencial</option>
                        <option value="Online">Online</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Status</label>
                    <select id="status" class="form-control">
                        <option value="<?=$pedido->status?>">
                          <?php 
                            if($pedido->status == 0){echo "Recebido";}
                            else if($pedido->status == 1){echo "Enviado";} 
                            else if($pedido->status == 2){echo "Entregue";} 
                          ?>
                        </option>
                        <option value="0">Recebido</option>
                        <option value="1">Enviado</option>
                        <option value="2">Entregue</option>
                    </select>
                  </div>
                </div>
              </div>
              <br><br>
              <div id="ErrorLog" class="hideAll alert alert-danger col-12 center"></div>
              <button type="submit" class="btn btn-info pull-right"
              onclick="editarPedido()">Editar Pedido</button>
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
            <h6 class="card-category text-gray">Editar Pedido</h6>
            <button type="submit" class="btn btn-danger"
              onclick="removerPedido()">Remover Pedido</button>
          </div>
        </div>
        
        
      </div>
      
      
  </div>
  
</div>