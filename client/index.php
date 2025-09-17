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

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
        body {
            font-family: "Arial", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    <?php include '../components/navbar.php'; ?>

    <main class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center mb-6">
            Hello there and welcome!
            <span class="text-green-600"><?php echo $_SESSION['username']; ?>.</span>
            Double click to edit your offers and then press enter to save!
        </h1>

        <?php if (isset($_SESSION['message'], $_SESSION['status'])): ?>
            <p class="text-center font-semibold text-lg mb-6
                <?php echo $_SESSION['status'] == '200' ? 'text-green-600' : 'text-red-600'; ?>">
                <?php echo $_SESSION['message']; ?>
            </p>
            <?php unset($_SESSION['message'], $_SESSION['status']); ?>
        <?php endif; ?>

        <?php foreach ($proposalObj->getProposals() as $proposal): ?>
            <section class="bg-white rounded-lg shadow mb-6 p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div>
                    <h2 class="text-xl font-bold mb-2">
                        <a href="other_profile_view.php?user_id=<?php echo $proposal['user_id'] ?>" class="text-blue-600 hover:underline">
                            <?php echo $proposal['username']; ?>
                        </a>
                    </h2>
                    <img src="<?php echo '../images/' . $proposal['image']; ?>" class="w-full h-auto rounded" alt="">
                    <p class="mt-4 mb-4 text-gray-700"><?php echo $proposal['description']; ?></p>
                    <h4 class="text-lg font-semibold italic">
                        <?php echo number_format($proposal['min_price']) . " - " . number_format($proposal['max_price']); ?> PHP
                    </h4>
                </div>

                <!-- Right Column -->
                <div class="bg-gray-50 rounded-lg border border-gray-200 h-[600px] flex flex-col">
                    <header class="px-4 py-2 border-b">
                        <h2 class="text-lg font-semibold">All Offers</h2>
                    </header>

                    <!-- Offers List -->
                    <div class="flex-1 overflow-y-auto p-4 space-y-4">
                        <?php foreach ($offerObj->getOffersByProposalID($proposal['proposal_id']) as $offer): ?>
                            <article class="offer border-b pb-4">
                                <h4 class="font-semibold">
                                    <?php echo $offer['username']; ?>
                                    <span class="text-blue-600">( <?php echo $offer['contact_number']; ?> )</span>
                                </h4>
                                <small class="text-gray-500 italic"><?php echo $offer['offer_date_added']; ?></small>
                                <p class="mt-2"><?php echo $offer['description']; ?></p>

                                <?php if ($offer['user_id'] == $_SESSION['user_id']): ?>
                                    <!-- Delete Offer -->
                                    <form action="core/handleForms.php" method="POST" class="mt-2">
                                        <input type="hidden" name="offer_id" value="<?php echo $offer['offer_id']; ?>">
                                        <button type="submit" name="deleteOfferBtn"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>

                                    <!-- Update Offer (hidden until dblclick) -->
                                    <form action="core/handleForms.php" method="POST" class="updateOfferForm hidden mt-4">
                                        <label class="block text-sm font-medium mb-1">Description</label>
                                        <input type="text" name="description" value="<?php echo $offer['description']; ?>"
                                            class="w-full border rounded px-3 py-2 mb-2">
                                        <input type="hidden" name="offer_id" value="<?php echo $offer['offer_id']; ?>">
                                        <button type="submit" name="updateOfferBtn"
                                            class="bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700">
                                            Update
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <!-- New Offer -->
                    <footer class="px-4 py-2 border-t bg-white">
                        <form action="core/handleForms.php" method="POST">
                            <label class="block text-sm font-medium mb-1">Description</label>
                            <input type="text" name="description"
                                class="w-full border rounded px-3 py-2 mb-2">
                            <input type="hidden" name="proposal_id" value="<?php echo $proposal['proposal_id']; ?>">
                            <button type="submit" name="insertOfferBtn"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Submit Offer
                            </button>
                        </form>
                    </footer>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <script>
        $('.offer').on('dblclick', function() {
            $(this).find('.updateOfferForm').toggleClass('hidden');
        });
    </script>
</body>

</html>