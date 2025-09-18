<?php
require_once '../core/classloader.php';

if (!$userObj->isLoggedIn()) {
    header("Location: ../login.php");
}

if (!$userObj->isAdmin()) {
    header("Location: ../index.php");
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
            Manage proposal categories here!
        </h1>

        <div class="flex px-4 py-2 items-center space-x-8">
            <form action="../core/handleForms.php" method="POST" class="w-1/2 flex space-x-4 items-end">
                <div class="flex-1 flex flex-col">
                    <label class="text-sm font-medium mb-1">Category Name</label>
                    <input type="text" name="category" class="w-full border rounded px-3 py-1">
                </div>

                <button type="submit" name="insertCategoryButton"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">
                    Add Category
                </button>
            </form>

            <div class="flex w-fit mt-3">
                <?php if (isset($_SESSION['message'], $_SESSION['status'])): ?>
                    <p class="text-center font-semibold text-lg
                                    <?php echo $_SESSION['status'] == '200' ? 'text-green-600' : 'text-red-600'; ?>">
                        <?php echo $_SESSION['message']; ?>
                    </p>
                    <?php unset($_SESSION['message'], $_SESSION['status']); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-4 gap-6">
            <?php foreach ($categoryObj->getCategories() as $category) { ?>
                <div class="bg-white shadow-md rounded-lg px-6 py-4">
                    <p class="text-xs text-gray-500">
                        ID: <?php echo $category['category_id']; ?>
                    </p>
                    <p class="text-lg font-semibold">
                        <?php echo $category['category_name']; ?>
                    </p>

                    <ul class="ml-3 space-y-1 text-gray-700 text-sm">
                        <?php foreach ($categoryObj->getSubcategoryByParentId($category['category_id']) as $sub) { ?>
                            <li class="pl-2 border-l hover:text-blue-600">
                                <?php echo $sub['subcategory_name']; ?>
                            </li>
                        <?php } ?>
                    </ul>

                    <form action="../core/handleForms.php" method="POST" class="mt-5 flex border-t space-x-4 items-end">
                        <div class="flex-1 flex flex-col">
                            <label class="text-sm font-medium mb-1">Subcategory Name</label>
                            <input type="text" name="subcategory" class="w-full border rounded px-2 py-1">
                        </div>

                        <input type="hidden" name="parent_category_id" value="<?php echo $category['category_id']; ?>">

                        <button type="submit" name="insertSubcategoryButton"
                            class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 cursor-pointer">
                            Add Subcategory
                        </button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>

    </div>

    <script src="../core/scripts/offerCard.js"></script>
</body>

</html>