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
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <div class="col-span-1 md:col-span-5">
                <h1 class="text-3xl font-bold text-center mb-6">
                    Hello there <span class="text-green-600"><?php echo $_SESSION['username']; ?></span>!
                </h1>

                <div class="bg-white rounded-lg shadow p-6">
                    <form action="../core/handleForms.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                        <h2 class="text-xl font-bold mb-4">Create a Job Proposal Here!</h2>

                        <div>
                            <label class="block text-sm font-medium mb-1">Description</label>
                            <input type="text" name="description" required
                                placeholder="What product/service will you provide?"
                                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Category</label>
                                <select id="categorySelect" name="category" required
                                    class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                                    <option value="" disabled selected>Select a category</option>

                                    <?php foreach ($categoryObj->getCategories() as $category) { ?>
                                        <option value="<?php echo $category['category_id']; ?>">
                                            <?php echo $category['category_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Subcategory</label>
                                <select id="subcategorySelect" name="subcategory" required
                                    class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                                    <option value="" disabled selected>Select a subcategory</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Minimum Price</label>
                                <input type="number" name="min_price" required
                                    placeholder="Lowest you'd accept"
                                    class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Maximum Price</label>
                                <input type="number" name="max_price" required
                                    placeholder="Highest you'd accept"
                                    class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                            </div>
                        </div>


                        <div>
                            <label class="block text-sm font-medium mb-1">Image</label>
                            <input type="file" name="image" required
                                class="w-full border rounded px-3 py-2 file:mr-4 file:py-1 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer" />
                        </div>


                        <div class="flex justify-end">
                            <button type="submit" name="insertNewProposalBtn"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded cursor-pointer">
                                Submit Proposal
                            </button>
                        </div>

                        <?php if (isset($_SESSION['message'], $_SESSION['status'])): ?>
                            <p class="font-semibold 
                        <?php echo $_SESSION['status'] == '200' ? 'text-green-600' : 'text-red-600'; ?>">
                                <?php echo $_SESSION['message']; ?>
                            </p>
                            <?php unset($_SESSION['message'], $_SESSION['status']); ?>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <div class="col-span-1 md:col-span-7 space-y-6">
                <?php
                $getProposals = $proposalObj->getProposals();
                foreach ($getProposals as $proposal) { ?>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-semibold">
                            <a href="../visit_profile.php?user_id=<?php echo $proposal['user_id']; ?>"
                                class="text-blue-600 hover:underline">
                                <?php echo $proposal['username']; ?></a>
                            <span class="text-sm italic text-gray-500"> proposed on <?php echo date("F d, Y, g:i A", strtotime($proposal['proposals_date_added'])); ?></span>
                        </h2>

                        <img src="<?php echo '../images/' . $proposal['image']; ?>"
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
    </div>

    <script src="../core/scripts/proposalForm.js"></script>

</body>

</html>