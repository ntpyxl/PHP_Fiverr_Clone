<?php
require_once 'core/classloader.php';

if (!$userObj->isLoggedIn()) {
    header("Location: login.php");
}

$userInfo = $userObj->getUsers($_GET['user_id']);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="core/styles.css">
</head>

<body class="font-sans bg-gray-50">
    <?php include 'components/navbar.php'; ?>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">
            Hello there <span class="text-green-600"><?php echo $_SESSION['username']; ?></span>!
            You're visiting someone else's profile!
        </h1>

        <div class="bg-white shadow rounded-xl p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center md:text-left">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                        alt="Profile Picture"
                        class="w-48 h-48 mx-auto md:mx-0 rounded-full mb-6 object-cover">

                    <h3 class="text-lg font-semibold">Username:
                        <span class="font-normal"><?php echo $userInfo['username']; ?></span>
                    </h3>
                    <h3 class="text-lg font-semibold">Email:
                        <span class="font-normal"><?php echo $userInfo['email']; ?></span>
                    </h3>
                    <h3 class="text-lg font-semibold">Phone Number:
                        <span class="font-normal"><?php echo $userInfo['contact_number']; ?></span>
                    </h3>
                </div>

                <form action="core/handleForms.php" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Username</label>
                        <input type="text" value="<?php echo $userInfo['username']; ?>"
                            class="w-full border rounded-s px-3 py-2 bg-gray-100" disabled>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" value="<?php echo $userInfo['email']; ?>"
                            class="w-full border rounded-s px-3 py-2 bg-gray-100" disabled>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Contact Number</label>
                        <input type="text" value="<?php echo $userInfo['contact_number']; ?>"
                            class="w-full border rounded-s px-3 py-2 bg-gray-100" disabled>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Bio</label>
                        <textarea class="w-full border rounded-s px-3 py-2 bg-gray-100" disabled><?php echo $userInfo['bio_description']; ?></textarea>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>