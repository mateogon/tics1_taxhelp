<?php
require 'vendor/autoload.php';
session_start();//important
$client = new MongoDB\Client("mongodb://localhost:27017");
$sessionid = (string)$_SESSION['user']['_id']['$oid'];
if (!isset($_SESSION['user'])){
  header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="public/images/favicon.ico">

    <title>Minglee</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5d4ced3508.js" crossorigin="anonymous"></script>
    <!-- Css not updating add "?ts=< ? = time() ? >" without spaces at the end-->
    <link rel="stylesheet" href="public/css/styles.css">

    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-left">
      <a class="navbar-brand mx-4" href="/html/posts.php">Tax Help</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse ml-2 " id="navbarsExampleDefault">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="/html/posts.php">Home</a>
              </li>
			  <li class="nav-item">
                  <a class="nav-link" href="/html/cotizar.php">Cotizar</a>
              </li>
			  <li class="nav-item">
                  <a class="nav-link" href="/html/cotizaciones.php">Cotizaciones</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/html/profile.php">Profile</a>
              </li>
			  
              <li class="nav-item">
                  <a class="nav-link" href="/html/logout.php">Log out</a>
              </li>
          </ul>
      </div>
  </nav>
  </head>  

  <style>
    body {
      background-image: url('public/images/bg1.jpg');
      backdrop-filter: blur(2px);
    }
  </style>