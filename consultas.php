<?php
    use Models\Fornecedor;
    $fornecedor  = new Fornecedor();
    $vetor  = $fornecedor->All();
    $con = new PDO("mysql:host=localhost;dbname=esquemarelacional", "root", "1234"); 
?>

<div class="content" style="MARGIN-TOP: 3REM;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Consultas</h4>
            <p class="card-category"> Todas as consultas solicitadas estão abaixo</p>
          </div>
          <div class="card-body">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-success" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Consulta 01
                    </button><br>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    1. Liste a soma do total do faturamento das vendas nos anos 2018, 2017 e 2015, agrupada pelo nome do produto, por ano e por mês; o resultado deve ser mostrado de maneira decrescente pelo valor da soma do total de vendas do produto.
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Soma Total</th>
                          <th>Nome Produto</th>
                          <th>Ano</th>
                          <th>Mês</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT SUM(precoVenda*quantidade) AS somaTotal, nome.nomeProduto, year(p.dataPedido) AS ano, month(p.dataPedido) AS mes
                            FROM pedido p, pedido_produto pp, produto prod, nome
                            WHERE p.id = pp.Pedido_id
                            AND (year(p.dataPedido) = 2015 OR year(p.dataPedido) = 2017 OR year(p.dataPedido) = 2018)
                            AND prod.id = pp.Produto_id
                            AND prod.id = nome.id
                            GROUP BY nome.nomeProduto, year(p.dataPedido), month(p.dataPedido)
                            ORDER BY somaTotal DESC;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->somaTotal ."</th>";
                              echo "<td>". $row->nomeProduto ."</td>";
                              echo "<td>". $row->ano ."</td>";
                              echo "<td>". $row->mes ."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Consulta 02
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                2. Para cada produto fornecido por um fornecedor argentino, liste o nome do produto, o nome do fornecedor do produto e a descrição do produto em todas os idiomas que constam no banco de dados. Os produtos devem ser ordenados de maneira crescente pelo nome do produto.
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Nome Produto</th>
                          <th>Nome Fornecedor</th>
                          <th>Descrição Produto</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT n.nomeProduto, f.nome as nomeFornecedor, d.descricaoProduto
                            FROM produto p, nome n, fornecedor f, descricao d, fornecedor_produto fo
                            WHERE p.id = fo.Produto_id
                            AND f.documento = fo.Fornecedor_documento
                            AND f.localidade = 'Argentina'
                            AND n.Produto_id = p.id
                            AND d.Produto_id = p.id
                            ORDER BY n.nomeProduto ASC;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->nomeProduto ."</th>";
                              echo "<td>". $row->nomeFornecedor ."</td>";
                              echo "<td>". $row->descricaoProduto ."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Consulta 04
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                4. Listar o nome completo e o território dos clientes não americanos que realizaram um total de compras superior a 9 mil em cada um dos seguintes anos: 2016, 2017 e 2019.                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Nome</th>
                          <th>País</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT DISTINCT(totalCompra.nome), totalCompra.pais
                            FROM(SELECT cli.nome, cli.pais, SUM(co.precoVenda*co.quantidade) AS total
                               FROM pedido AS ped, pedido_produto AS co, cliente AS cli
                               WHERE cli.id = ped.Cliente_id AND ped.id = co.Pedido_id
                               AND (year(ped.dataPedido) BETWEEN 2016 AND 2019 AND year(ped.dataPedido) != 2018)
                               GROUP BY cli.id) AS totalCompra, pedido AS ped
                            WHERE totalCompra.total > 9000 
                            AND totalCompra.pais != 'Estados Unidos'");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->nome."</th>";
                              echo "<td>". $row->pais."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      Consulta 05
                    </button>
                  </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                <div class="card-body">
                5. Qual é a quantidade e o percentual de clientes que realizaram compras no ano 2018, possuem limite de crédito menor que 3000 e residem nos estados unidos?
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Quantidade</th>
                          <th>Porcentagem</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT count(*) AS quantidade, count(*)/(SELECT count(*) FROM cliente) AS porcentagem
                            FROM cliente c, pedido p
                            WHERE c.id = p.Cliente_id
                            AND year(p.dataPedido) = 2018
                            AND c.limiteDeCredito < 3000
                            AND c.pais = 'Estados Unidos';");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->quantidade ."</th>";
                              echo "<td>". $row->porcentagem ."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card">
                <div class="card-header" id="heading6">
                  <h5 class="mb-0">
                    <button class="btn btn-info collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                      Consulta 07
                    </button>
                  </h5>
                </div>
                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
                <div class="card-body">
                7. Considerando apenas os clientes estrangeiros, quais meses produziram os maiores faturamentos para a empresa no ano de 2018?
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Mês</th>
                          <th>Faturamento Mensal</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT month(p.dataPedido) AS mes, sum(a.precoVenda*a.quantidade) AS faturamento_mes
                            FROM pedido p, pedido_produto a, cliente c
                            WHERE year(p.dataPedido) = 2018
                            AND a.Pedido_id = p.id
                            AND p.Cliente_id = c.id
                            AND c.pais != 'Brasil'
                            GROUP BY mes
                            ORDER BY faturamento_mes DESC, mes ASC LIMIT 3;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->mes ."</th>";
                              echo "<td>". $row->faturamento_mes ."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card">
                <div class="card-header" id="heading8">
                  <h5 class="mb-0">
                    <button class="btn btn-success collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                      Consulta 08
                    </button>
                  </h5>
                </div>
                <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                <div class="card-body">
                8. Para cada produto, liste o preço de tabela do produto, o preço mínimo de venda do produto e o valor máximo e mínimo que o produto já foi vendido em 2017, 2018 ou 2019
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Produto</th>
                          <th>Preço de Venda</th>
                          <th>Preço Mínimo de Venda</th>
                          <th>Maior Preço Vendido</th>
                          <th>Menor Preço Vendido</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT p.id, p.precoDeVenda, p.precoMinimo, max(a.precoVenda) as maxi, min(a.precoVenda) as mini
                            FROM produto p, pedido_produto a, pedido b
                            WHERE a.Pedido_id = b.id 
                            AND a.Produto_id = p.id 
                            AND year(b.dataPedido) >= 2017 
                            AND year(b.dataPedido) <= 2019
                            GROUP BY p.id;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->id ."</th>";
                              echo "<th>". $row->precoDeVenda ."</th>";
                              echo "<td>". $row->precoMinimo ."</td>";
                              echo "<td>". $row->maxi ."</td>";
                              echo "<td>". $row->mini ."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card">
                <div class="card-header" id="heading9">
                  <h5 class="mb-0">
                    <button class="btn btn-danger collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                      Consulta 09
                    </button>
                  </h5>
                </div>
                <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
                <div class="card-body">
                9. Ordenar de maneira decrescente a soma total de vendas realizadas no ano 2017 por clientes americanos, agrupada pelo nome do cliente e por mês.
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Soma Total</th>
                          <th>Nome</th>
                          <th>Mês</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT SUM(pp.precoVenda*pp.quantidade) AS somaTotal, c.nome, month(p.dataPedido) as mes
                            FROM pedido p, pedido_produto pp, cliente c
                            WHERE p.id = pp.Pedido_id
                            AND year(p.dataPedido) = 2017
                            AND c.id = p.Cliente_id
                            AND c.pais = 'Estados Unidos'
                            GROUP BY c.nome, month(p.dataPedido)
                            ORDER BY somaTotal DESC;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->somaTotal ."</th>";
                              echo "<td>". $row->nome ."</td>";
                              echo "<td>". $row->mes ."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card">
                <div class="card-header" id="heading10">
                  <h5 class="mb-0">
                    <button class="btn btn-primary collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                      Consulta 10
                    </button>
                  </h5>
                </div>
                <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
                <div class="card-body">
                10. Quais os produtos mais lucrativos para a empresa no primeiro trimestre do ano, considerando os anos 2016, 2017 e 2019?                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>ID Produto</th>
                          <th>Lucro</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT Produto_id, SUM(pedido_produto.quantidade * pedido_produto.precoVenda) AS lucro
                            FROM pedido_produto
                            JOIN pedido
                            ON pedido.id = pedido_produto.Pedido_id
                            WHERE (2016 = YEAR(pedido.dataPedido)
                                   OR 2017 = YEAR(pedido.dataPedido)
                                   OR 2019 = YEAR(pedido.dataPedido))
                            AND MONTH(pedido.dataPedido) BETWEEN 1 AND 3
                            GROUP BY pedido_produto.Produto_id
                            ORDER BY lucro DESC;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->Produto_id ."</th>";
                              echo "<td>". $row->lucro ."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card">
                <div class="card-header" id="heading11">
                  <h5 class="mb-0">
                    <button class="btn btn collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                      Consulta 11
                    </button>
                  </h5>
                </div>
                <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
                <div class="card-body">
                11. Para cada compra realizada em 2014, 2015 ou 2016, listar: a data da compra, o valor total da compra, o modo da compra, a quantidade de produtos vendidos e o nome e o valor de crédito do cliente que realizou a compra.
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Nome</th>
                          <th>Total</th>
                          <th>Modo Encomenda</th>
                          <th>Quantidade</th>
                          <th>Data Pedido</th>
                          <th>Limite de Crédito</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT DISTINCT(totalCompra.nome), totalCompra.total, totalCompra.modoEncomenda, totalCompra.quantidade, totalCompra.dataPedido, totalCompra.limiteDeCredito
                            FROM(SELECT Cli.nome, Cli.limiteDeCredito, co.quantidade, Ped.dataPedido, Ped.modoEncomenda, SUM(co.precoVenda*co.quantidade) AS total
                             FROM pedido AS Ped , pedido_produto AS co, cliente AS Cli
                             WHERE Cli.id = Ped.Cliente_id 
                             AND Ped.id = co.Pedido_id 
                             AND (year(Ped.dataPedido) BETWEEN '2014' AND '2016')
                             GROUP BY Cli.id) AS totalCompra;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->nome ."</th>";
                              echo "<td>". $row->total ."</td>";
                              echo "<td>". $row->modoEncomenda ."</td>";
                              echo "<td>". $row->quantidade ."</td>";
                              echo "<td>". $row->dataPedido ."</td>";
                              echo "<td>". $row->limiteDeCredito ."</td>";
                          ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card">
                <div class="card-header" id="heading12">
                  <h5 class="mb-0">
                    <button class="btn btn-info collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                      Consulta 12
                    </button>
                  </h5>
                </div>
                <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion">
                <div class="card-body">
                12. Liste o nome, o limite de crédito, o estado e a cidade dos clientes que já realizaram pelo menos 8 compras em um mesmo mês.
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" center text-primary">
                          <th>Nome</th>
                          <th>Limite de Crédito</th>
                          <th>Estado</th>
                          <th>Cidade</th>
                        </thead>
                        <tbody>
                          <?php
                            $rs = $con->query("SELECT DISTINCT nome, limiteDeCredito, estado, cidade  
                            FROM(SELECT Cliente_id, YEAR(dataPedido), MONTH(dataPedido), SUM(quantidade) AS Comprado 
                               FROM pedido, pedido_produto
                               WHERE pedido.id = pedido_produto.Pedido_id
                               GROUP BY  Cliente_id, dataPedido) AS comprasPorClienteId
                            JOIN cliente
                            ON cliente.id = Cliente_id
                            WHERE Comprado >= 8;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                              echo "<tr class='center'>";
                              echo "<th>". $row->nome ."</th>";
                              echo "<td>". $row->limiteDeCredito ."</td>";
                              echo "<td>". $row->estado ."</td>";
                              echo "<td>". $row->cidade ."</td>";
                          ?>
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
              </div>
              </div>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
