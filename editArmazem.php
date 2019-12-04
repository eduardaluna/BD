<?php 
    use Models\Armazem;
    $armazem  = new Armazem();   
    $vetor  = $armazem->All();
    
    $getlink = $_SERVER["REQUEST_URI"];
    $getlink = explode('=', $getlink);
    $armazem->find($getlink[1]);
?>

<script src="require/js/newArmazem.js"></script>
<div class="content" style="margin-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" >
        <input type="hidden" value="<?= $armazem->id?>" id="id">
        
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Cadastro de Armazéns</h4>
            <p class="card-category">Atenção nas informações!</p>
          </div>
          <div class="card-body">
            <div>
              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome</label>
                    <input type="text" id="nome" value="<?=$armazem->nome?>" class="form-control">
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                      <label class="bmd-label-floating">Endereço</label>
                      <input type="text" id="endereco" value="<?=$armazem->endereco?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tamanho</label>
                        <input type="text" id="tamanho" value="<?=$armazem->tamanho?>" class="form-control"> 
                    </div>
                </div>
              </div>
              <br><br>
              <div id="ErrorLog" class="hideAll alert alert-danger col-12 center"></div>
              <button type="submit" class="btn btn-info pull-right"
              onclick="editarArmazem()">Editar armazem</button>
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
            <h6 class="card-category text-gray">Novo armazem</h6>
            <button type="submit" class="btn btn-danger"
              onclick="removerArmazem()">Remover armazem</button>
          </div>
        </div>
        
        
      </div>
      
      
  </div>
  
</div>