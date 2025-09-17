<?php
define("BASE_URL", "/php_fiverr_clone/src/");

$filePath = $_SERVER['PHP_SELF'];
$parts = explode("/", trim($filePath, "/"));

$dir = $parts[2] ?? "";
$file = basename($filePath);

$navbarTitle = [
    "freelancer" => "Freelancer Dashboard",
    "client"     => "Client Dashboard"
];
?>

<nav class="bg-[#0077B6] text-white px-6 py-4">
    <div class="flex items-center justify-between">
        <a href="index.php" class="text-lg font-bold">
            <?php echo $navbarTitle[$dir] ?? "FiClone"; ?>
        </a>

        <!-- TODO: Button not appearing regardless of screen size -->
        <!-- Mobile Toggle -->
        <button id="menu-toggle" class="lg:hidden p-2 focus:outline-none">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div id="menu" class="hidden lg:flex flex-col lg:flex-row mt-4 lg:mt-0 space-y-2 lg:space-y-0 lg:space-x-6">
        <a href="../profile.php" class="hover:text-gray-300">
            Profile
        </a>

        <?php if ($_SESSION['user_role'] == "Client") { ?>
            <a href="<?php echo BASE_URL; ?>client/client_sent_offers.php" class="hover:text-gray-300">
                Project Offers Submitted
            </a>
        <?php } ?>

        <?php if ($_SESSION['user_role'] == "Freelancer") { ?>
            <a href="freelancer_proposals.php" class="hover:text-gray-300">
                Your Proposals
            </a>

            <a href="client_offers.php" class="hover:text-gray-300">
                Offers From Clients
            </a>
        <?php } ?>

        <a href="<?php echo BASE_URL; ?>core/handleForms.php?logoutUserBtn=1" class="hover:text-red-400">
            Logout
        </a>

    </div>
</nav>

<!-- Mobile toggle script -->
<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("menu").classList.toggle("hidden");
    });
</script>