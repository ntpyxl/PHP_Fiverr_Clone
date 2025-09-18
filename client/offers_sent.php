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
                <?php foreach ($offerObj->getOffersByOfferorID($_SESSION['user_id']) as $offer) { ?>

                    <div class="bg-white rounded-lg shadow mb-6 p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h2 class="text-xl font-semibold mb-2">
                                <a href="../visit_profile.php?user_id=<?php echo $offer['proposer_user_id'] ?>" class="text-blue-600 hover:underline">
                                    <?php echo $offer['proposer_username']; ?>
                                </a>
                            </h2>

                            <img
                                src="<?php echo '../images/' . $offer['proposal_image']; ?>"
                                class="w-full h-80 border border-gray-400 rounded object-contain"
                                alt="">

                            <div class="mt-2 flex items-center space-x-2">
                                <span class="font-medium text-gray-600">Category:</span>
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full font-medium">
                                    <?php echo $offer['category_name']; ?>
                                </span>
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full font-medium">
                                    <?php echo $offer['subcategory_name']; ?>
                                </span>
                            </div>

                            <p class="mt-4 mb-4 text-gray-700"><?php echo $offer['proposal_description']; ?></p>

                            <h4 class="text-lg font-semibold italic">
                                Price Range: <?php echo number_format($offer['proposal_min_price']) . " - " . number_format($offer['proposal_max_price']); ?> PHP
                            </h4>
                        </div>

                        <div class="px-3 py-1 border-l">
                            <h3 class="text-lg font-semibold">
                                You offered
                                <span class="font-normal text-gray-500 italic">
                                    on <?php echo date("F d, Y, g:i A", strtotime($offer['offer_date_added'])); ?>
                                </span>
                            </h3>

                            <p class="mt-2 px-3 py-1 overflow-y-auto">
                                <?php echo $offer['offer_description']; ?>
                            </p>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>