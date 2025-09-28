<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Site</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Updated Navigation -->
                            <x-nav-link href="/" :active="request()->is('/')">
                                Home
                            </x-nav-link>
                            <x-nav-link href="/jobs" :active="request()->is('jobs')">
                                Jobs
                            </x-nav-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Page Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">
                {{ $heading }}
            </h1>

            <!-- ✅ Create Job Button -->
            <a href="/jobs/create"
                class="inline-block rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                Create Job
            </a>
        </div>
    </header>


    <!-- Page Content -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0 bg-white rounded-lg shadow">
                {{ $slot }}
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} My Site. All rights reserved.</p>
    </footer>

</body>

</html>