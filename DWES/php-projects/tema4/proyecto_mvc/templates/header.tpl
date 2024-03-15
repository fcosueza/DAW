<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
    <style>
        table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }
    table th,
    table td {
        padding: 12px 15px;
    }
    nav{
        width:100%;
        height:50px;
        text-align: right;
    }
    nav ul{
        display:inline-block;
        margin:0 auto;
    }
    nav li{
        display:inline-block;        
        padding-left: 10px;
    }

    nav li:not(:last-of-type){        
        padding-right: 10px;
        border-right: 1px solid black;
    }
    </style>
</head>
<body>
<nav>
<ul>
{if !isset($exclude) or strstr($exclude,'principal')===false}
    <li><a href="index.php">Ir a la página principal</a></li>
{/if}
{if (!isset($exclude) or strstr($exclude,'listfavs')===false) and isset($smarty.session.usuario)}
    <li><a href="index.php?accion=listfavs">Ver productos favoritos</a></li>
{/if}
{if isset($smarty.session.usuario)}
    <li>Bienvenido {$smarty.session.usuario->getUsername()}.</li>
{/if}
<li>
{if isset($smarty.session.usuario)}
    {include file="bloques/auth_logout.tpl"}
{else}
    {include file="bloques/auth_form.tpl"}    
{/if}
</li>
</ul>
</nav>
{include file="bloques/notificaciones.tpl"}
