<?php
    use Models\Armazem;
    $armazem  = new Armazem();   
    $vetor  = $armazem->All();

?>
    <div class="content" style="MARGIN-TOP: 3REM;">
            <div class="container-fluid">
            <button style="text-align: center; width: 60%; margin-left: 20%;" class="btn btn-info btn-block" 
                onclick="location.href='novoArmazem'">Adicionar novo Armazem
            </button>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Armazéns</h4>
                  <p class="card-category"> Todos os Armazéns estão abaixo, digite algo para filtrar</p>
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
                          Endereço
                        </th>
                        <th>
                          Tamanho
                        </th>
                      </thead>
                      <tbody>
                        <?php 
                            foreach($vetor as $key){
                              echo "<tr class='center'>";
                              echo "<th>". $key['id'] ."</th>";
                              echo "<td>". $key['nome'] ."</td>";
                              echo "<td>". $key['endereco'] ."</td>";
                              echo "<td>". $key['tamanho'] ."</td>";
                        ?>
                            <th><button class="btn btn-primary btn-block" 
                            onclick="location.href='editArmazem?user=<?= $key['id']?>'">Editar</button>
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