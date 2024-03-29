<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Other Head Content -->
</head>
<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Navigation -->
            <nav class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo and Links -->
                        </div>
                        <div class="flex items-center">
                            <!-- Authentication Links -->
                            @guest
                                <!-- Authentication Links for Guest -->
                            @endguest

                            @auth
                                <!-- Other Dashboard Content -->
                                <a href="{{ route('students.index') }}">Manage Students</a>
                            @endauth

                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Other Dashboard Content -->
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
