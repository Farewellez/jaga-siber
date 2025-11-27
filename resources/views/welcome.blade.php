<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jaga-Siber - Bug Bounty Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.3s ease;
        }
        .hero-card {
            transform: translateY(0);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .hero-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .glow-circle {
            animation: pulse 3s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }
        .feature-card {
            min-height: 280px;
        }
    </style>
</head>
<body class="antialiased bg-gray-900 text-gray-100">
    <!-- Navbar -->
    <nav class="bg-gray-800 border-b border-gray-700 py-4 px-6 md:px-12">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <h1 class="text-xl font-bold gradient-text">Jaga-Siber</h1>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">Login</a>
                <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-500 px-4 py-2 rounded-lg transition-colors">Register</a>
            </div>
            <div class="md:hidden">
                <button class="text-gray-300 hover:text-indigo-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative py-20 px-6 md:px-12 overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-center lg:text-left">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 gradient-text leading-tight">
                    Secure the Digital World
                </h1>
                <p class="text-lg md:text-xl text-gray-400 mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    Join our bug bounty platform where ethical hackers and companies collaborate to make the internet safer. Report vulnerabilities, earn rewards, and contribute to cybersecurity.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-500 px-8 py-3 rounded-lg font-semibold transition-colors">
                        Get Started
                    </a>
                </div>
            </div>
            <!-- Right Content: Mock Bug Report Card -->
            <div class="relative flex justify-center lg:justify-end">
                <div class="hero-card bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-2xl max-w-md w-full">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-600 rounded-full mr-3"></div>
                        <div>
                            <div class="h-4 bg-gray-700 rounded w-24 mb-1"></div>
                            <div class="h-3 bg-gray-600 rounded w-16"></div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="h-4 bg-gray-700 rounded w-full"></div>
                        <div class="h-4 bg-gray-700 rounded w-5/6"></div>
                        <div class="h-4 bg-gray-700 rounded w-4/5"></div>
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <span class="text-sm text-gray-500">Status: New</span>
                        <span class="text-sm text-cyan-400">Severity: High</span>
                    </div>
                </div>
                <!-- Decorative Glow Circles -->
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-500 rounded-full opacity-20 glow-circle"></div>
                <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-cyan-500 rounded-full opacity-20 glow-circle"></div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-6 md:px-12 bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 gradient-text">
                Why Choose Jaga-Siber?
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card bg-gray-900 border border-gray-700 rounded-xl p-6 text-center">
                    <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-100">Secure Reporting</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Submit vulnerabilities anonymously with encrypted attachments and secure communication channels.
                    </p>
                </div>
                <div class="feature-card bg-gray-900 border border-gray-700 rounded-xl p-6 text-center">
                    <div class="w-16 h-16 bg-cyan-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-100">Community Driven</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Join a global network of ethical hackers and collaborate on real-world security challenges.
                    </p>
                </div>
                <div class="feature-card bg-gray-900 border border-gray-700 rounded-xl p-6 text-center">
                    <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-100">Rewarding Experience</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Earn competitive bounties for valid reports and build your reputation in the cybersecurity field.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-gray-700 py-8 px-6 md:px-12">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-gray-500">&copy; 2025 Jaga-Siber. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>