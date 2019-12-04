<?php
    use Models\Fornecedor;
    $fornecedor  = new Fornecedor();
    $vetor  = $fornecedor->All();
?>

<div class="content" style="MARGIN-TOP: 3REM;">
  <div class="container-fluid">
    <button style="text-align: center; width: 60%; margin-left: 20%;" class="btn btn-info btn-block"
      onclick="location.href='novoFornecedor'">Adicionar novo Fornecedor
    </button>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Fornecedores</h4>
            <p class="card-category"> Todos os Fornecedores estão abaixo, digite algo para filtrar</p>
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
                    Documento
                  </th>
                  <th>
                    Nome
                  </th>
                  <th>
                    Localidade
                  </th>
                  <th>
                    Tipo de Fornecedor
                  </th>
                </thead>
                <tbody>
                  <?php
                    foreach($vetor as $key){
                      echo "<tr class='center'>";
                      echo "<th>". $key['documento'] ."</th>";
                      echo "<td>". $key['nome'] ."</td>";
                      echo "<td>". $key['localidade'] ."</td>";
                      echo "<td>". $key['tipoDeFornecedor'] ."</td>";
                  ?>
                  <th><button class="btn btn-primary btn-block"
                      onclick="location.href='editFornecedor?user=<?= $key['documento']?>'">Editar</button>
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
