<?php ob_start();

session_start();
include("db.php"); 
include("users_functions.php");

?>
<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Sistema Integral de Gestión de Clínicas | SIGC</title>
    <link rel="apple-touch-icon" href="../img/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <?php include_once("css/theme.php"); ?>

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>