<!DOCTYPE html>

<html lang="en">

<?php 

    session_start(); // to allow variable transfer between pages
    include("config.php");

    // connect to database
    $dbconnect= mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(mysqli_connect_errno()){
        echo "Connection failed:".mysqli_connect_error();
        exit;
        }
    ?>

<head>
    <meta charset="utf-8">
    <meta name="description" content="games,apps">
    <meta name="GTT" content="Game/App Database">
    <meta name="keywords" content="games,apps,ratings">

    <title>Game Database</title>

    <!-- for multiple font change | change to %7c no spaces -->
    <link href="http://fonts.googleapis.com/css?family=Lato%7cUnbuntu" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/data_style.css"> <!-- custom style sheet-->


</head>

<body>

        <p class="message">Eek! Your browser does not support grid. Please upgrade your system.</p>

        <div class="wrapper">

            <!-- Logo/small image goeshere-->
            <div class="box logo">
                <a href="index.php"><img src="images/logo.png" width="261" height ="150" alt="dice"/> </a>
            </div><!--/llogo-->

            <div class="box banner">
                <h1> Games Database</h1>
            </div><!--/banner-->
