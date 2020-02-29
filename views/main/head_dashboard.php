<?php
    if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Barapates</title>
    <link rel="icon" href="public/img/italien.png">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="public/js/library.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<div class="headbar">
    <img src="public/img/italien.png">
    <div class="headbar_title">BARAPATES</div>
</div>

<ul class="sidebar">
    <li><a href="dashboard"><span class="glyphicon glyphicon-list-alt"></span> Tableau de bord</a></li>
    <li><a href="neworder"><span class="glyphicon glyphicon-edit"></span> Passer commande</a></li>
    <li><a href="order"><span class="glyphicon glyphicon-shopping-cart"></span> Historique</a></li>
    <li><a href="settings"><span class="glyphicon glyphicon-cog"></span> Paramètres</a></li>
    <li><a href="index?disconnect"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
</ul>