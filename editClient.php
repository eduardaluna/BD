<?php 
    use Models\Cliente;
    $cliente  = new Cliente();   
    use Models\Telefone;
    $telefone  = new Telefone(); 
    use Models\Email;
    $email  = new Email();  
    $vetor  = $cliente->All();

    $getlink = $_SERVER["REQUEST_URI"];
    $getlink = explode('=', $getlink);
    $cliente->find($getlink[1]);
?>

<script src="require/js/newClient.js"></script>
<div class="content" style="margin-top: 3rem;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8" >
        <input type="hidden" value="<?= $cliente->id?>" id="id">
        
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Cadastro de pessoas</h4>
            <p class="card-category">Atenção nas informações!</p>
          </div>
          <div class="card-body">
            <div>
              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome</label>
                    <input type="text" id="nome" value="<?=$cliente->nome?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                    <label class="bmd-label-floating">CPF</label>
                    <input type="text" id="cpf" value="<?=$cliente->cpf?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row"><div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Limite de Crédito</label>
                        <input type="text" id="limite" value="<?=$cliente->limiteDeCredito?>" class="form-control"> 
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">País</label>
                    <input type="text" id="pais" value="<?=$cliente->pais?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Estado</label>
                    <input type="text" id="estado" value="<?=$cliente->estado?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Cidade</label>
                    <input type="text" id="cidade" value="<?=$cliente->cidade?>" class="form-control">
                  </div>
                </div>
              </div>
              <br><br>
              <div id="ErrorLog" class="hideAll alert alert-danger col-12 center"></div>
              <button type="submit" class="btn btn-info pull-right"
              onclick="edtarUsuario()">Editar Cliente</button>
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
            <h6 class="card-category text-gray">Novo Cliente</h6>
            <button type="submit" class="btn btn-danger"
              onclick="removerUsuario()">Remover Cliente</button>
          </div>
        </div>
        
        
      </div>
      <div class="col-md-8" >
        <input type="hidden" value="<?= $cliente->id?>" id="id">
        
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Telefones</h4>
            <p class="card-category">Atenção nas informações!</p>
          </div>
          <div class="card-body">
            <div>
              <div class="row">
              <?php foreach($telefone->getTelefoneByCliente($cliente->id) as $tel){?>
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="bmd-label-floating">Telefone</label>
                    <input type="text" id="nome" value="<?=$tel["numero"]?>" class="form-control">
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          </div></div>
      </div>

      <div class="col-md-4" >
        <input type="hidden" value="<?= $cliente->id?>" id="id">
        
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Emails</h4>
            <p class="card-category">Atenção nas informações!</p>
          </div>
          <div class="card-body">
            <div>
              <div class="row">
              <?php foreach($email->getEmailByCliente($cliente->id) as $tel){?>
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="text" id="nome" value="<?=$tel["enderecoEmail"]?>" class="form-control">
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          </div></div>
      </div>
      
  </div>
  
</div>