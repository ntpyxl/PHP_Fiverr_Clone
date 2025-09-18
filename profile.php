<?php
require_once 'core/classloader.php';

if (!$userObj->isLoggedIn()) {
    header("Location: login.php");
}

$userInfo = $userObj->getUsers($_SESSION['user_id']);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="core/styles.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body class="bg-gray-100">
    <?php include 'components/navbar.php'; ?>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">
            Hello there <span class="text-green-600"><?php echo $_SESSION['username']; ?></span>!
        </h1>

        <?php if (isset($_SESSION['message'], $_SESSION['status'])): ?>
            <p class="text-center font-semibold mb-6 
                <?php echo $_SESSION['status'] == '200' ? 'text-green-600' : 'text-red-600'; ?>">
                <?php echo $_SESSION['message']; ?>
            </p>
            <?php unset($_SESSION['message'], $_SESSION['status']); ?>
        <?php endif; ?>

        <section class="bg-white shadow rounded-lg p-6">
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

                <form action="core/handleForms.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Username</label>
                        <input type="text" name="username" value="<?php echo $userInfo['username']; ?>"
                            disabled
                            class="w-full border rounded px-3 py-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" value="<?php echo $userInfo['email']; ?>"
                            disabled
                            class="w-full border rounded px-3 py-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Contact Number</label>
                        <input type="text" name="contact_number" value="<?php echo $userInfo['contact_number']; ?>"
                            required
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Bio</label>
                        <textarea name="bio_description" rows="4"
                            class="w-full border rounded px-3 py-2"><?php echo $userInfo['bio_description']; ?></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Display Picture</label>
                        <input type="file" name="display_picture"
                            class="w-full border rounded px-3 py-2 bg-white">
                    </div>

                    <button type="submit" name="updateUserBtn"
                        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Update Profile
                    </button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>