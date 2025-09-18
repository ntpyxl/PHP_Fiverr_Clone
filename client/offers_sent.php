<?php
require_once '../core/classloader.php';

if (!$userObj->isLoggedIn()) {
    header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../core/styles.css">
</head>

<body class="bg-gray-50">
    <?php include '../components/navbar.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center mb-6">
            Hello there <span class="text-green-600"><?php echo $_SESSION['username']; ?></span>!
            Here are the offers you submitted!
        </h1>

        <div class="flex justify-center">
            <div class="w-full">
                <!-- Content placeholder -->
            </div>
        </div>
    </div>
</body>

</html>