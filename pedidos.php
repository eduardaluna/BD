<?php
    use Models\Pedido;
    $pedido = new Pedido();   
    use Models\Cliente;
    $cliente = new Cliente();
    $vetor  = $pedido->All();

?>
    <div class="content" style="MARGIN-TOP: 3REM;">
            <div class="container-fluid">
            <button style="text-align: center; width: 60%; margin-left: 20%;" class="btn btn-info btn-block" 
                onclick="location.href='novoPedido'">Adicionar novo Pedido
            </button>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Pedidos</h4>
                  <p class="card-category"> Todos os Pedidos estão abaixo, digite algo para filtrar</p>
                </div>
                <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <p>Filtrar texto</p>
                        <input type="text" class="form-control" placeholder="Experimente digitar algo aqui">
                        <br>
                    </div>
                    </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" center text-primary">
                        <th>
                          Cliente
                        </th>
                        <th>
                          Data do Pedido
                        </th>
                        <th>
                          Data da Entrega
                        </th>
                        <th>
                          Modo Encomenda
                        </th>
                      </thead>
                      <tbody>
                        <?php 
                            foreach($vetor as $key){
                              echo "<tr class='center'>";
                              $cliente->find($key['Cliente_id']);
                              echo "<td>". $cliente->nome ."</td>";
                              $aux = explode(' ',$key['dataPedido']);
                              echo "<th>". $aux[0] ."</th>";
                              $aux = explode(' ',$key['dataEntrega']);
                              echo "<td>". $aux[0] ."</td>";
                              echo "<td>". $key['modoEncomenda'] ."</td>";
                        ?>
                            <th><button class="btn btn-primary btn-block" 
                            onclick="location.href='editPedido?user=<?= $key['id']?>'">Editar</button>
                            </th>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>  
    </div>