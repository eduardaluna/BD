<?php
    use Models\Cliente;
    $cliente  = new Cliente();   
    $vetor  = $cliente->All();

?>
    <div class="content" style="MARGIN-TOP: 3REM;">
            <div class="container-fluid">
            <button style="text-align: center; width: 60%; margin-left: 20%;" class="btn btn-info btn-block" 
                onclick="location.href='novoCliente'">Adicionar novo Cliente
            </button>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Clientes</h4>
                  <p class="card-category"> Todos os Clientes estão abaixo, digite algo para filtrar</p>
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
                          Id
                        </th>
                        <th>
                          Nome
                        </th>
                        <th>
                          CPF
                        </th>
                        <th>
                          Data de Cadastro
                        </th>
                        <th>
                          País
                        </th>
                      </thead>
                      <tbody>
                        <?php 
                            foreach($vetor as $key){
                              echo "<tr class='center'>";
                              echo "<th>". $key['id'] ."</th>";
                              echo "<td>". $key['nome'] ."</td>";
                              echo "<td>". $key['cpf'] ."</td>";
                              echo "<td>". $key['dataCadastro'] ."</td>";
                              echo "<td>". $key['pais'] ."</td>";
                        ?>
                            <th><button class="btn btn-primary btn-block" 
                            onclick="location.href='editClient?user=<?= $key['id']?>'">Editar</button>
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