<?php 
    use Models\Armazem;
    $armazem  = new Armazem();  
    
    use Models\Estoque;
    $estoque = new Estoque();   
    $vetor  = $estoque->All();
    $vetor2 = $armazem->All();
    

    $getlink = $_SERVER["REQUEST_URI"];
    $getlink = explode('=', $getlink);
    $estoque->find($getlink[1]);

    $armazem->find($estoque->Armazem_id);
    if(!empty($armazem->nome)){
      $armazem->id = '';
      $armazem->nome = '';
    } 
?>

<script src="require/js/newEstoque.js"></script>
<div class="content" style="margin-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" >
        <input type="hidden" value="<?= $estoque->id?>" id="id">
        
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Cadastro de Estoques</h4>
            <p class="card-category">Atenção nas informações!</p>
          </div>
          <div class="card-body">
            <div>
              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="bmd-label-floating">Código</label>
                    <input type="text" id="codigo" value="<?=$estoque->codigo?>" class="form-control">
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label class="bmd-label-floating">Armazém</label>
                      <select class="form-control" id="armazem"> 
                        <option value="<?= $armazem->id?>"><?=$armazem->nome?></option>
                        <?php foreach($vetor2 as $armz){?>
                          <option value="<?=$armz["id"]?>"><?=$armz["nome"]?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>
                
              </div>
              <br><br>
              <div id="ErrorLog" class="hideAll alert alert-danger col-12 center"></div>
              <button type="submit" class="btn btn-info pull-right"
              onclick="editarEstoque()">Editar Estoque</button>
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
            <h6 class="card-category text-gray">Editar Estoque</h6>
            <button type="submit" class="btn btn-danger"
              onclick="removerEstoque()">Remover Estoque</button>
          </div>
        </div>
        
        
      </div>
      
      
  </div>
  
</div>