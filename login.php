<?php require_once 'core/classloader.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FiClone Login</title>

    <link rel="stylesheet" href="core/styles.css">

    <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-8">
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Welcome to freelancer's dashboard, Login Now!</h2>
        </div>

        <form action="core/handleForms.php" method="POST" class="space-y-6">
            <?php
            if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
                if ($_SESSION['status'] == "200") {
                    echo "<h1 class='text-green-600 font-semibold mb-4'>{$_SESSION['message']}</h1>";
                } else {
                    echo "<h1 class='text-red-600 font-semibold mb-4'>{$_SESSION['message']}</h1>";
                }
            }
            unset($_SESSION['message']);
            unset($_SESSION['status']);
            ?>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <input type="submit" name="loginUserBtn" value="Login"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 cursor-pointer transition">
            </div>

            <p class="text-gray-700">Don't have an account yet?
                <a href="register.php" class="text-blue-600 hover:underline">Register here!</a>
            </p>
        </form>
    </div>
</body>

</html>