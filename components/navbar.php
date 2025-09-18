<?php
define("BASE_URL", "/php_fiverr_clone/src/");

$filePath = $_SERVER['PHP_SELF'];
$parts = explode("/", trim($filePath, "/"));

$dir = $parts[2] ?? "";
$file = basename($filePath);

$navbarTitle = [
    "freelancer" => "Freelancer Dashboard",
    "client"     => "Client Dashboard",
    "admin"     => "Admin Client Dashboard",
];
?>

<nav class="bg-[#0077B6] text-white px-6 py-4">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
        <a href="<?php echo "../" . $dir; ?>" class="text-lg font-bold mb-2 lg:mb-0">
            <?php echo $navbarTitle[$dir] ?? "FiClone"; ?>
        </a>

        <div class="flex items-center justify-between">
            <!-- Mobile toggle -->
            <button id="menu-toggle" class="lg:hidden p-2 focus:outline-none">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div id="menu" class="hidden lg:flex flex-col lg:flex-row mt-2 lg:mt-0 space-y-2 lg:space-y-0 lg:space-x-6">
                <a href="<?php echo BASE_URL . strtolower($_SESSION['user_role']); ?>" class="hover:text-gray-300">
                    Dashboard
                </a>

                <a href="<?php echo BASE_URL; ?>profile.php" class="hover:text-gray-300">Profile</a>

                <div class="relative">
                    <button id="categoriesBtn" class="hover:text-gray-300 flex items-center space-x-1 cursor-pointer">
                        <span>Categories</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="categoriesMenu" class="absolute left-0 mt-2 w-56 bg-white text-black rounded shadow-lg hidden z-50">
                        <?php foreach ($categoryObj->getCategories() as $category) { ?>
                            <div class="border-b border-gray-200">
                                <a href="<?php echo BASE_URL; ?>proposals.php?category=<?php echo $category['category_id']; ?>"
                                    class="block px-4 py-2 font-semibold hover:bg-gray-100 cursor-pointer">
                                    <?php echo $category['category_name']; ?>
                                </a>

                                <ul class="pl-6 pb-2 text-sm text-gray-700">
                                    <?php foreach ($categoryObj->getSubcategoryByParentId($category['category_id']) as $sub) { ?>
                                        <li>
                                            <a href="<?php echo BASE_URL; ?>proposals.php?category=<?php echo $category['category_id']; ?>&subcategory=<?php echo $sub['subcategory_id']; ?>"
                                                class="block px-2 py-1 hover:bg-gray-100 cursor-pointer">
                                                <?php echo $sub['subcategory_name']; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <?php if ($_SESSION['user_role'] == "Client") { ?>
                    <a href="<?php echo BASE_URL; ?>client/offers_sent.php" class="hover:text-gray-300">
                        Offers Submitted
                    </a>
                <?php } ?>

                <?php if ($_SESSION['user_role'] == "Admin") { ?>
                    <a href="<?php echo BASE_URL; ?>admin/offers_sent.php" class="hover:text-gray-300">
                        Offers Submitted
                    </a>
                    <a href="<?php echo BASE_URL; ?>admin/manage_categories.php" class="hover:text-gray-300">
                        Manage Categories
                    </a>
                <?php } ?>

                <?php if ($_SESSION['user_role'] == "Freelancer") { ?>
                    <a href="freelancer_proposals.php" class="hover:text-gray-300">
                        Your Proposals
                    </a>
                    <a href="offer_inbox.php" class="hover:text-gray-300">
                        Offer Inbox
                    </a>
                <?php } ?>

                <a href="<?php echo BASE_URL; ?>core/handleForms.php?logoutUserBtn=1" class="hover:text-red-400">Logout</a>
            </div>

        </div>
    </div>
</nav>

<script src="<?php echo BASE_URL; ?>core/scripts/navbarDropdown.js"></script>

<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("menu").classList.toggle("hidden");
    });
</script>