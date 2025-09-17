<?php define("BASE_URL", "/php_fiverr_clone/src/"); ?>

<nav class="bg-[#023E8A] text-white px-6 py-4"> <!-- #TODO: #0077B6 Freelancer Color -->
    <div class="flex items-center justify-between">
        <!-- Brand -->
        <a href="index.php" class="text-lg font-bold">Client Panel</a>

        <!-- Mobile Toggle -->
        <button id="menu-toggle" class="lg:hidden p-2 focus:outline-none">
            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Menu -->
    <div id="menu" class="hidden lg:flex flex-col lg:flex-row mt-4 lg:mt-0 space-y-2 lg:space-y-0 lg:space-x-6">
        <a href="project_offers_submitted.php" class="hover:text-gray-300">
            Project Offers Submitted
        </a> <!-- #TODO: Client Only Button -->

        <a href="profile.php" class="hover:text-gray-300">
            Profile
        </a>

        <a href="your_proposals.php" class="hover:text-gray-300">
            Your Proposals
        </a> <!-- #TODO: Freelancer Only Button -->

        <a href="offers_from_clients.php" class="hover:text-gray-300">
            Offers From Clients
        </a> <!-- #TODO: Freelancer Only Button -->

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