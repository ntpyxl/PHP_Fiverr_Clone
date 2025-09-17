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

        <!-- TODO: Button not appearing regardless of screen size -->
        <button class="block lg:hidden p-2 focus:outline-none">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    <div class="container mx-auto px-4">
        <div class="text-4xl font-semibold text-center mt-6 mb-6">
            Hello there and welcome to FiClone!
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Client Card -->
            <div class="bg-white rounded-lg shadow p-6 flex flex-col">
                <h1 class="text-2xl font-bold mb-3">Are you looking for a talent?</h1>
                <img src="https://images.unsplash.com/photo-1549923746-c502d488b3ea?q=80&w=1171&auto=format&fit=crop"
                    alt="Talent search" class="rounded-md w-full mb-4">
                <p class="text-gray-600 mb-6">
                    Find skilled freelancers to help grow your business, from content writing to design, development, and more.
                </p>
                <a href="client/index.php"
                    class="mt-auto inline-block text-center bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    Get Started as Client
                </a>
            </div>

            <!-- Freelancer Card -->
            <div class="bg-white rounded-lg shadow p-6 flex flex-col">
                <h1 class="text-2xl font-bold mb-3">Are you looking for a job?</h1>
                <img src="https://plus.unsplash.com/premium_photo-1661582394864-ebf82b779eb0?q=80&w=1170&auto=format&fit=crop"
                    alt="Job search" class="rounded-md w-full mb-4">
                <p class="text-gray-600 mb-6">
                    Join thousands of freelancers, showcase your skills, and connect with clients looking for your expertise.
                </p>
                <a href="freelancer/index.php"
                    class="mt-auto inline-block text-center bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700 transition">
                    Get Started as Freelancer
                </a>
            </div>
        </div>

        <div class="text-4xl font-semibold text-center mt-10">Testimonials From Our Users</div>

        <div class="grid md:grid-cols-2 gap-6 mt-5 py-5">
            <div class="bg-white shadow rounded-lg flex overflow-hidden h-36">
                <div class="w-1/3">
                    <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=600&q=80"
                        alt="Sophia M." class="w-full h-full object-cover">
                </div>
                <div class="w-2/3 p-4 flex flex-col justify-center">
                    <h5 class="font-bold text-xl">Sophia M.</h5>
                    <p class="text-gray-600 text-s mt-1">
                        This talent search app helped me discover amazing job opportunities quickly.
                        The personalized matches made all the difference!
                    </p>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg flex overflow-hidden h-36">
                <div class="w-1/3">
                    <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=600&q=80"
                        alt="Liam K." class="w-full h-full object-cover">
                </div>
                <div class="w-2/3 p-4 flex flex-col justify-center">
                    <h5 class="font-bold text-xl">Liam K.</h5>
                    <p class="text-gray-600 text-s mt-1">
                        Easy to use and very effective. Found a great match for my skills within a week. Highly recommend for job seekers.
                    </p>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg flex overflow-hidden h-36">
                <div class="w-1/3">
                    <img src="https://images.unsplash.com/photo-1520813792240-56fc4a3765a7?auto=format&fit=crop&w=600&q=80"
                        alt="Emma T." class="w-full h-full object-cover">
                </div>
                <div class="w-2/3 p-4 flex flex-col justify-center">
                    <h5 class="font-bold text-xl">Emma T.</h5>
                    <p class="text-gray-600 text-s mt-1">
                        The app’s user interface is smooth and the application process was seamless. It really boosted my career search experience.
                    </p>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg flex overflow-hidden h-36">
                <div class="w-1/3">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80"
                        alt="Olivia W." class="w-full h-full object-cover">
                </div>
                <div class="w-2/3 p-4 flex flex-col justify-center">
                    <h5 class="font-bold text-xl">Olivia W.</h5>
                    <p class="text-gray-600 text-s mt-1">
                        I love how the app customizes recommendations based on my profile. It truly feels personalized and effective.
                    </p>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg flex overflow-hidden h-36">
                <div class="w-1/3">
                    <img src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?auto=format&fit=crop&w=600&q=80"
                        alt="Ethan L." class="w-full h-full object-cover">
                </div>
                <div class="w-2/3 p-4 flex flex-col justify-center">
                    <h5 class="font-bold text-xl">Ethan L.</h5>
                    <p class="text-gray-600 text-s mt-1">
                        The interview scheduling feature saved me so much time. The app is intuitive and recruiter communication is excellent.
                    </p>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg flex overflow-hidden h-36">
                <div class="w-1/3">
                    <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=600&q=80"
                        alt="Adam R." class="w-full h-full object-cover">
                </div>
                <div class="w-2/3 p-4 flex flex-col justify-center">
                    <h5 class="font-bold text-xl">Adam R.</h5>
                    <p class="text-gray-600 text-s mt-1">
                        Found roles that matched my skill set perfectly. The app helped me showcase my talents in the best light. So thankful!
                    </p>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg flex overflow-hidden h-36">
                <div class="w-1/3">
                    <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&w=600&q=80"
                        alt="Ava J." class="w-full h-full object-cover">
                </div>
                <div class="w-2/3 p-4 flex flex-col justify-center">
                    <h5 class="font-bold text-xl">Ava J.</h5>
                    <p class="text-gray-600 text-s mt-1">
                        Quick, efficient, and easy-to-use. This app significantly improved my job search and helped me land my dream position.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>