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

<body class="bg-gray-100">
    <?php include '../components/navbar.php'; ?>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center">Hello there and welcome!</h1>

        <?php $getProposalsByUserID = $proposalObj->getProposalsByUserID($_SESSION['user_id']); ?>
        <div class="space-y-6 mt-6">
            <?php foreach ($getProposalsByUserID as $proposal) { ?>
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Proposal Info -->
                        <div>
                            <h2 class="text-xl font-semibold mb-2">
                                <a href="#" class="text-blue-600 hover:underline">
                                    <?php echo $proposal['username']; ?>
                                </a>
                            </h2>
                            <img src="<?php echo '../images/' . $proposal['image']; ?>"
                                alt="Proposal Image"
                                class="w-full h-64 object-cover rounded mb-4">

                            <p class="text-gray-700 mb-4">
                                <?php echo $proposal['description']; ?>
                            </p>

                            <h4 class="text-lg font-semibold text-gray-800">
                                <i><?php echo number_format($proposal['min_price']) . " - " . number_format($proposal['max_price']); ?> PHP</i>
                            </h4>

                            <div class="mt-4 text-right">
                                <a href="#" class="text-blue-500 hover:underline">Check out services</a>
                            </div>
                        </div>

                        <!-- Offers Section -->
                        <div class="bg-gray-50 border rounded-lg shadow-sm">
                            <div class="border-b px-4 py-2">
                                <h2 class="text-lg font-bold">All Offers</h2>
                            </div>
                            <div class="p-4 max-h-80 overflow-y-auto space-y-4">
                                <?php $getOffersByProposalID = $offerObj->getOffersByProposalID($proposal['proposal_id']); ?>
                                <?php foreach ($getOffersByProposalID as $offer) { ?>
                                    <div class="border-b pb-3">
                                        <h4 class="font-semibold text-gray-900">
                                            <?php echo $offer['username']; ?>
                                            <span class="text-blue-600">( <?php echo $offer['contact_number']; ?> )</span>
                                        </h4>
                                        <small class="text-gray-500"><i><?php echo $offer['offer_date_added']; ?></i></small>
                                        <p class="text-gray-700 mt-1"><?php echo $offer['description']; ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>