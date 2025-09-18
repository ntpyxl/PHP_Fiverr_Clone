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
</head>

<body class="bg-gray-50">
    <?php include '../components/navbar.php'; ?>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center mb-6">
            Hello there <span class="text-green-600"><?php echo $_SESSION['username']; ?></span>!
            Here are some proposals you could offer to!
        </h1>

        <?php foreach ($proposalObj->getProposals() as $proposal): ?>
            <div class="bg-white rounded-lg shadow mb-6 p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="../visit_profile.php?user_id=<?php echo $proposal['user_id'] ?>" class="text-blue-600 hover:underline">
                            <?php echo $proposal['username']; ?>
                        </a>
                    </h2>
                    <img
                        src="<?php echo '../images/' . $proposal['image']; ?>"
                        class="w-full h-80 border border-gray-400 rounded object-contain"
                        alt="">

                    <div class="mt-2 flex items-center space-x-2">
                        <span class="font-medium text-gray-600">Category:</span>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full font-medium">
                            <?php echo $proposal['category_name']; ?>
                        </span>
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full font-medium">
                            <?php echo $proposal['subcategory_name']; ?>
                        </span>
                    </div>

                    <p class="mt-4 mb-4 text-gray-700"><?php echo $proposal['description']; ?></p>

                    <h4 class="text-lg font-semibold italic">
                        Price Range: <?php echo number_format($proposal['min_price']) . " - " . number_format($proposal['max_price']); ?> PHP
                    </h4>
                </div>

                <div class="flex flex-col bg-gray-50 border rounded-s shadow-sm">
                    <div class="px-4 py-2 border-b">
                        <h2 class="text-lg font-semibold">All Offers</h2>
                    </div>

                    <div class="flex-1 overflow-y-auto p-4 space-y-4">
                        <?php foreach ($offerObj->getOffersByProposalID($proposal['proposal_id']) as $offer): ?>
                            <div class="offer border-b pb-4">
                                <h4 class="font-semibold text-lg">
                                    <?php echo $offer['username']; ?>
                                    <span class="text-blue-600 text-xs italic">#<?php echo $offer['contact_number']; ?></span>
                                </h4>
                                <p class="text-gray-500 text-xs italic"><?php echo date("F d, Y, g:i A", strtotime($offer['offer_date_added'])); ?></p>
                                <p class="mt-2"><?php echo $offer['description']; ?></p>

                                <?php if ($offer['user_id'] == $_SESSION['user_id']): ?>
                                    <div class="flex mt-2 space-x-3 justify-end">
                                        <button
                                            class="editOfferButton bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded cursor-pointer">
                                            Edit
                                        </button>

                                        <form action="../core/handleForms.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this offer?');">
                                            <input type="hidden" name="offer_id" value="<?php echo $offer['offer_id']; ?>">
                                            <button type="submit" name="deleteOfferBtn" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 cursor-pointer">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <form action="../core/handleForms.php" method="POST" class="updateOfferForm hidden mt-4">
                                        <label class="block text-sm font-medium mb-1">Description</label>
                                        <input type="text" name="description" value="<?php echo $offer['description']; ?>"
                                            class="w-full border rounded px-3 py-2 mb-2">

                                        <input type="hidden" name="offer_id" value="<?php echo $offer['offer_id']; ?>">
                                        <input type="hidden" name="return_to" value="<?php echo strtolower($_SESSION['user_role']) . '/'; ?>">

                                        <button type="submit"
                                            name="updateOfferBtn"
                                            class="bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700 cursor-pointer">
                                            Update
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="px-4 py-2 border-t">
                        <form action="../core/handleForms.php" method="POST">
                            <label class="block text-sm font-medium mb-1">Description</label>
                            <input type="text" name="description"
                                class="w-full border rounded px-3 py-1 mb-2">

                            <input type="hidden" name="proposal_id" value="<?php echo $proposal['proposal_id']; ?>">

                            <div class="flex flex-row justify-between items-center">
                                <button type="submit" name="insertOfferBtn"
                                    class="w-fit bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">
                                    Submit Offer
                                </button>

                                <div class="flex w-fit">
                                    <?php if (isset($_SESSION['message'], $_SESSION['status'])): ?>
                                        <p class="text-center font-semibold text-lg
                                    <?php echo $_SESSION['status'] == '200' ? 'text-green-600' : 'text-red-600'; ?>">
                                            <?php echo $_SESSION['message']; ?>
                                        </p>
                                        <?php unset($_SESSION['message'], $_SESSION['status']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="../core/scripts/offerCard.js"></script>
</body>

</html>