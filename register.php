<?php require_once 'core/classloader.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="core/styles.css">

    <style>
        body {
            font-family: "Arial";
            background-image: url("https://img.freepik.com/free-vector/winter-blue-pink-gradient-background-vector_53876-117275.jpg?t=st=1746104039~exp=1746107639~hmac=2f238261c795cf2f54851b4f9f1b1bda806f8a408384522f6de69dcd5115750f&w=1380");
            background-size: cover;
            background-position: center;
        }
    </style>
    <title>Freelancer Registration</title>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-8">
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Welcome to the freelancer panel, Register Now as freelancer!
            </h2>
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

            <!-- Username -->
            <div>
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" id="username" name="username" required
                    class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Contact Number -->
            <div>
                <label for="contact_number" class="block text-gray-700 font-medium">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" required
                    class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirm_password" class="block text-gray-700 font-medium">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required
                    class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <input type="submit" name="insertNewUserBtn" value="Register"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 cursor-pointer transition">
            </div>
        </form>
    </div>
</body>

</html>