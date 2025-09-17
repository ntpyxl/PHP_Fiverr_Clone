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

    <!-- Tailwind already included in ../core/styles.css -->
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

    <main class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Double click to edit!</h1>

        <?php if (isset($_SESSION['message'], $_SESSION['status'])): ?>
            <p class="text-center font-semibold mb-6 
                <?php echo $_SESSION['status'] == '200' ? 'text-green-600' : 'text-red-600'; ?>">
                <?php echo $_SESSION['message']; ?>
            </p>
            <?php unset($_SESSION['message'], $_SESSION['status']); ?>
        <?php endif; ?>

        <div class="space-y-6">
            <?php $getProposalsByUserID = $proposalObj->getProposalsByUserID($_SESSION['user_id']); ?>
            <?php foreach ($getProposalsByUserID as $proposal) { ?>
                <div class="proposalCard bg-white shadow rounded-lg p-6">
                    <h2 class="text-xl font-semibold">
                        <a href="#" class="text-blue-600 hover:underline">
                            <?php echo $proposal['username']; ?>
                        </a>
                    </h2>

                    <img src="<?php echo "../images/" . $proposal['image']; ?>"
                        alt="Proposal Image"
                        class="w-full h-64 object-cover rounded mt-4">

                    <p class="text-sm text-gray-500 mt-3">
                        <i><?php echo $proposal['proposals_date_added']; ?></i>
                    </p>

                    <p class="mt-2 text-gray-700"><?php echo $proposal['description']; ?></p>

                    <h4 class="mt-3 font-semibold text-gray-800">
                        <i><?php echo number_format($proposal['min_price']) . " - " . number_format($proposal['max_price']); ?> PHP</i>
                    </h4>

                    <!-- Delete Form -->
                    <form action="core/handleForms.php" method="POST" class="mt-4">
                        <input type="hidden" name="proposal_id" value="<?php echo $proposal['proposal_id']; ?>">
                        <input type="hidden" name="image" value="<?php echo $proposal['image']; ?>">
                        <button type="submit"
                            name="deleteProposalBtn"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded float-right">
                            Delete
                        </button>
                    </form>

                    <!-- Update Form (hidden until double click) -->
                    <form action="core/handleForms.php" method="POST" class="updateProposalForm hidden mt-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Minimum Price</label>
                                <input type="number" name="min_price"
                                    value="<?php echo $proposal['min_price']; ?>"
                                    class="w-full border rounded px-3 py-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Maximum Price</label>
                                <input type="number" name="max_price"
                                    value="<?php echo $proposal['max_price']; ?>"
                                    class="w-full border rounded px-3 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Description</label>
                            <input type="hidden" name="proposal_id" value="<?php echo $proposal['proposal_id']; ?>">
                            <textarea name="description"
                                class="w-full border rounded px-3 py-2"><?php echo $proposal['description']; ?></textarea>
                        </div>
                        <button type="submit"
                            name="updateProposalBtn"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Update Proposal
                        </button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </main>

    <script>
        $('.proposalCard').on('dblclick', function() {
            $(this).find('.updateProposalForm').toggleClass('hidden');
        });
    </script>
</body>

</html>