<?php
    session_start();

    date_default_timezone_set('America/Sao_Paulo');
?>
<!doctype html>
<!-- © 2018 AEG SOLUÇÕES - All Rights Reserved. -->
<html lang="pt-br">
<head>
    <title>45° Gestão</title>
    <!-- Required meta tags -->
    <!-- AEG DEV - (81) 9 8965-9700 -->
    <!--<div>Icons made by <a href="https://www.flaticon.com/authors/kiranshastry" title="Kiranshastry">Kiranshastry</a> from <a href="https://www.flaticon.com/" 		    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="require/img/apple-icon.png">
    <link rel="icon" type="image/png" href="require/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="require/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="require/demo/demo.css" rel="stylesheet" />
    <link href="require/css/leaf.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
   </head>
   <style>.sidebar-wrapper{height: calc(100vh - 25px) !important;}</style>
<body>
<div class="sidebar" data-color="purple" data-background-color="white" data-image="require/img/sidebar-1.jpg">

    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="home">
          
          </a>
        </li>
        <li class="nav-item active  ">
          <a class="nav-link" href="home">
            <i class="material-icons">dashboard</i>
            <p>Início</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="clientes">
            <i class="material-icons">person</i>
            <p>Clientes</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Produtos">
            <i class="material-icons">person</i>
            <p>Produtos</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Fornecedores">
            <i class="material-icons">person</i>
            <p>Fornecedores</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Estoques">
            <i class="material-icons">person</i>
            <p>Estoques</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Armazens">
            <i class="material-icons">person</i>
            <p>Armazéns</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Pedidos">
            <i class="material-icons">person</i>
            <p>Pedidos</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="wrapper ">

    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="home">Projeto - Banco de Dados</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
