<?php 
    use Models\Armazem;
    $armazem  = new Armazem();   
    $vetor  = $armazem->All();
?>
<script src="require/js/newEstoque.js"></script>
<div class="content" style="margin-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <input type="hidden" id="arraySelecionados">
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
                    <input type="text" id="codigo" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Armazém</label>
                    <select class="form-control" id="armazem"> 
                      <option></option>
                      <?php foreach($vetor as $armz){?>
                        <option value="<?=$armz["id"]?>"><?=$armz["nome"]?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <br><br>
              <div id="ErrorLog" class="hideAll alert alert-danger col-12 center"></div>
              <button type="submit" class="btn btn-info pull-right"
              onclick="criarEstoque()">Criar Estoque</button>
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
            <h6 class="card-category text-gray">Novo Estoque</h6>
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
