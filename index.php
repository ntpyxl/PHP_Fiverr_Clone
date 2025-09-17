<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="core/styles.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body class="font-sans">
    <!-- Navbar -->
    <nav class="flex items-center justify-between bg-[#0077B6] text-white px-6 py-4">
        <a href="#" class="text-lg font-bold">Fiverr Clone Homepage</a>
        <button class="block lg:hidden p-2 focus:outline-none">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    <div class="container mx-auto px-4">
        <div class="text-4xl font-semibold text-center mt-6 mb-6">
            Hello there and welcome to the Fiverr Clone!
        </div>

        <!-- Two main cards -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Client Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <h1 class="text-2xl font-bold mb-4">Are you looking for a talent?</h1>
                <img src="https://images.unsplash.com/photo-1549923746-c502d488b3ea?q=80&w=1171&auto=format&fit=crop"
                    alt="Talent search" class="rounded-md w-full mb-4">
                <p class="mb-4">
                    Content writers create clear, engaging, and informative content that helps businesses communicate their services or products effectively, build brand authority, attract and retain customers, and drive web traffic and conversions.
                </p>
                <h3 class="text-lg font-semibold text-blue-600">
                    <a href="client/index.php">Get started here as client</a>
                </h3>
            </div>

            <!-- Freelancer Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <h1 class="text-2xl font-bold mb-4">Are you looking for a job?</h1>
                <img src="https://plus.unsplash.com/premium_photo-1661582394864-ebf82b779eb0?q=80&w=1170&auto=format&fit=crop"
                    alt="Job search" class="rounded-md w-full mb-4">
                <p class="mb-4">
                    Admin writers play a key role in content team development. They are the highest-ranking editorial authority responsible for managing the entire editorial process, and aligning all published material with the publication’s overall vision and strategy.
                </p>
                <h3 class="text-lg font-semibold text-blue-600">
                    <a href="freelancer/index.php">Get started here as freelancer</a>
                </h3>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="text-4xl font-semibold text-center mt-10">Testimonials From Users</div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <!-- Card Template -->
            <div class="bg-white rounded-lg shadow h-full overflow-hidden">
                <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=600&q=80" alt="User 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="font-bold text-lg">Sophia M.</h5>
                    <p class="text-gray-600">This talent search app helped me discover amazing job opportunities quickly. The personalized matches made all the difference!</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow h-full overflow-hidden">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=600&q=80" alt="User 2" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="font-bold text-lg">Liam K.</h5>
                    <p class="text-gray-600">Easy to use and very effective. Found a great match for my skills within a week. Highly recommend for job seekers.</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow h-full overflow-hidden">
                <img src="https://images.unsplash.com/photo-1520813792240-56fc4a3765a7?auto=format&fit=crop&w=600&q=80" alt="User 3" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="font-bold text-lg">Emma T.</h5>
                    <p class="text-gray-600">The app’s user interface is smooth and the application process was seamless. It really boosted my career search experience.</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow h-full overflow-hidden">
                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80" alt="User 5" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="font-bold text-lg">Olivia W.</h5>
                    <p class="text-gray-600">I love how the app customizes recommendations based on my profile. It truly feels personalized and effective.</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow h-full overflow-hidden">
                <img src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?auto=format&fit=crop&w=600&q=80" alt="User 6" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="font-bold text-lg">Ethan L.</h5>
                    <p class="text-gray-600">The interview scheduling feature saved me so much time. The app is intuitive and recruiter communication is excellent.</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow h-full overflow-hidden">
                <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=600&q=80" alt="User 7" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="font-bold text-lg">Adam R.</h5>
                    <p class="text-gray-600">Found roles that matched my skill set perfectly. The app helped me showcase my talents in the best light. So thankful!</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow h-full overflow-hidden">
                <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&w=600&q=80" alt="User 9" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="font-bold text-lg">Ava J.</h5>
                    <p class="text-gray-600">Quick, efficient, and easy-to-use. This app significantly improved my job search and helped me land my dream position.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>