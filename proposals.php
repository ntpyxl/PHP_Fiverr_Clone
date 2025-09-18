<?php
require_once 'core/classloader.php';

if (!$userObj->isLoggedIn()) {
    header("Location: login.php");
}
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

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">
            Hello there <span class="text-green-600"><?php echo $_SESSION['username']; ?></span>!
            Here are proposals sorted by:
            <?php if (isset($_GET['subcategory'])) { ?>
                <span class="text-green-600"><?php echo $categoryObj->getSubcategoryById($_GET['subcategory'])[0]['subcategory_name']; ?></span>
            <?php } else if (isset($_GET['category'])) { ?>
                <span class="text-blue-600"><?php echo $categoryObj->getCategoryById($_GET['category'])[0]['category_name']; ?></span>
            <?php } ?>
        </h1>

        <?php
        $getProposals = null;

        if (isset($_GET['subcategory'])) {
            $getProposals = $proposalObj->getProposalsBySubcategoryID($_GET['subcategory']);
        } else if (isset($_GET['category']) && !isset($_GET['subcategory'])) {
            $getProposals = $proposalObj->getProposalsByCategoryID($_GET['category']);
        } else {
            $getProposals = $proposalObj->getProposals();
        }

        foreach ($getProposals as $proposal) { ?>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold">
                    <a href="visit_profile.php?user_id=<?php echo $proposal['user_id']; ?>"
                        class="text-blue-600 hover:underline">
                        <?php echo $proposal['username']; ?></a>
                    <span class="text-sm italic text-gray-500"> proposed on <?php echo date("F d, Y, g:i A", strtotime($proposal['proposals_date_added'])); ?></span>
                </h2>

                <img src="<?php echo 'images/' . $proposal['image']; ?>"
                    alt="Proposal Image"
                    class="w-full h-80 object-contain border border-gray-400 rounded mt-4">

                <div class="mt-2 flex items-center space-x-2">
                    <span class="font-medium text-gray-600">Category:</span>
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full font-medium">
                        <?php echo $proposal['category_name']; ?>
                    </span>
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full font-medium">
                        <?php echo $proposal['subcategory_name']; ?>
                    </span>
                </div>


                <p class="mt-2 text-gray-700"><?php echo $proposal['description']; ?></p>

                <h4 class="mt-3 font-semibold text-gray-800">
                    <i>Price Range: <?php echo number_format($proposal['min_price']) . " - " . number_format($proposal['max_price']); ?> PHP</i>
                </h4>
            </div>
        <?php } ?>

    </div>
    </div>

    <script src="core/scripts/proposalForm.js"></script>

</body>

</html>