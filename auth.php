<?php
session_start();
unset($_SESSION['logado']);


include('require/class/autoload.php');
use Models\Client;
$clientInst  = new Client();
$cripto      = new Cripto;

if (isset($_SERVER['HTTP_REFERER']) && ($_SERVER['HTTP_REFERER'] != "http://clube45.com/")){
	echo '-Origem da requisição não autorizada!';
	exit();
}
//Recebe os dados do formulário
$email = (isset($_POST['email'])) ?   $_POST['email'] : '' ;
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '' ;


// Dica 2 - Validações de preenchimento e-mail e senha se foi preenchido o e-mail
if (empty($email)):
	echo '-Preencha seu CPF';
	exit();
endif;

if (empty($senha)):
	echo '-Preencha sua senha!';
	exit();
endif;


$clientes   = $clientInst->getClientByCpf($email);
foreach($clientes as $key){
	if($key['cpf'] === $email){
		if($cripto->setCripto($senha) === $key['passwd']){
			$_SESSION['log_clie']   = $key['id'];
			$_SESSION['email']      = $key['email'];
			$_SESSION['cpf']        = $key['cpf'];
			$_SESSION['logado']     = 1;
			$_SESSION['nome']       = $key['name'];
			$_SESSION['empresa']    = $key['company_id'];
		}else{
			$_SESSION['logado'] = 0;
			$errorLog = "Email ou password incorretos!";
		}
	}else{
		$_SESSION['logado'] = 0;
		$errorLog = "Email ou password incorretos!";
	}
}

// Se logado envia código 1, senão retorna mensagem de erro para o login
if ($_SESSION['logado'] == 1){
	echo ' -1';
	exit();
}else{
	echo ' - Email ou password incorretos!';
	exit();
}
