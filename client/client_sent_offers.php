<?php
require_once '../core/classloader.php';

if (!$userObj->isLoggedIn()) {
    header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../core/styles.css">

    <style>
        body {
            font-family: "Arial", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    <?php include '../components/navbar.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl md:text-4xl font-bold text-center mb-8">
            Hello there and welcome! Here are all the submitted project offers!
        </h1>

        <div class="flex justify-center">
            <div class="w-full">
                <!-- Content placeholder -->
            </div>
        </div>
    </div>
</body>

</html>