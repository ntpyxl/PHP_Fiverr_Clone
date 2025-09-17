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

    <!-- Tailwind already linked in ../core/styles.css -->
    <link rel="stylesheet" href="../core/styles.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <style>
        body {
            font-family: "Arial", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <?php include '../components/navbar.php'; ?>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">
            Hello there and welcome!
            <span class="text-green-600"><?php echo $_SESSION['username']; ?></span>.
            Add Proposal Here!
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Add Proposal Form -->
            <div class="md:col-span-5">
                <div class="bg-white rounded-lg shadow p-6">
                    <form action="core/handleForms.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                        <?php if (isset($_SESSION['message'], $_SESSION['status'])): ?>
                            <p class="font-semibold 
                                <?php echo $_SESSION['status'] == '200' ? 'text-green-600' : 'text-red-600'; ?>">
                                <?php echo $_SESSION['message']; ?>
                            </p>
                            <?php unset($_SESSION['message'], $_SESSION['status']); ?>
                        <?php endif; ?>

                        <h2 class="text-xl font-bold mb-4">Add Proposal Here!</h2>

                        <div>
                            <label class="block text-sm font-medium mb-1">Description</label>
                            <input type="text" name="description" required
                                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Minimum Price</label>
                            <input type="number" name="min_price" required
                                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Max Price</label>
                            <input type="number" name="max_price" required
                                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Image</label>
                            <input type="file" name="image" required
                                class="w-full border rounded px-3 py-2">
                        </div>

                        <button type="submit" name="insertNewProposalBtn"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded float-right">
                            Submit Proposal
                        </button>
                    </form>
                </div>
            </div>

            <!-- Proposals List -->
            <div class="md:col-span-7">
                <?php $getProposals = $proposalObj->getProposals(); ?>
                <div class="space-y-6">
                    <?php foreach ($getProposals as $proposal) { ?>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-xl font-semibold">
                                <a href="other_profile_view.php?user_id=<?php echo $proposal['user_id']; ?>"
                                    class="text-blue-600 hover:underline">
                                    <?php echo $proposal['username']; ?>
                                </a>
                            </h2>

                            <img src="<?php echo '../images/' . $proposal['image']; ?>"
                                alt="Proposal Image"
                                class="w-full h-64 object-cover rounded mt-4">

                            <p class="text-sm text-gray-500 mt-3">
                                <i><?php echo $proposal['proposals_date_added']; ?></i>
                            </p>

                            <p class="mt-2 text-gray-700"><?php echo $proposal['description']; ?></p>

                            <h4 class="mt-3 font-semibold text-gray-800">
                                <i><?php echo number_format($proposal['min_price']) . " - " . number_format($proposal['max_price']); ?> PHP</i>
                            </h4>

                            <div class="mt-4 text-right">
                                <a href="#" class="text-blue-500 hover:underline">Check out services</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>