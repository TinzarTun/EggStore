@extends('admin.layouts.master')

@section('content')
<main class="flex-1 min-w-0 ml-0 md:ml-64 p-4 sm:p-6 md:p-8 min-h-screen flex flex-col bg-gray-50">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h2 class="text-3xl font-bold text-gray-900">
                User Details
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                View complete user information
            </p>
        </div>

        <a href="{{ route('user.list') }}"
            class="inline-flex items-center gap-2 bg-gray-900 text-white px-5 py-3 rounded-lg hover:bg-black transition shadow-sm">

            <i class="fas fa-arrow-left"></i>
            Back
        </a>

    </div>

    <!-- User Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

        <!-- Top Section -->
        <div class="bg-gradient-to-r from-amber-500 to-orange-500 p-8 text-white">

            <div class="flex flex-col md:flex-row items-center gap-6">

                <!-- Profile Image -->
                <div>
                    @if ($user['image'])
                        <img src="{{ Storage::url($user['image']) }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user['name']) }}&size=200"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                    @endif
                </div>

                <!-- Basic Info -->
                <div class="text-center md:text-left">

                    <h1 class="text-3xl font-bold">
                        {{ $user['name'] }}
                    </h1>

                    <p class="text-white/90 mt-2">
                        {{ $user['email'] ?? 'No email provided' }}
                    </p>

                    <div class="mt-4 flex flex-wrap gap-3 justify-center md:justify-start">

                        <!-- Gender -->
                        @switch($user['gender'])

                            @case('male')
                                <span class="px-4 py-1.5 rounded-full text-sm bg-blue-100 text-blue-700 font-medium">
                                    Male
                                </span>
                                @break

                            @case('female')
                                <span class="px-4 py-1.5 rounded-full text-sm bg-pink-100 text-pink-700 font-medium">
                                    Female
                                </span>
                                @break

                            @case('other')
                                <span class="px-4 py-1.5 rounded-full text-sm bg-purple-100 text-purple-700 font-medium">
                                    Other
                                </span>
                                @break

                            @default
                                <span class="px-4 py-1.5 rounded-full text-sm bg-slate-100 text-slate-700 font-medium">
                                    N/A
                                </span>

                        @endswitch

                    </div>

                </div>

            </div>

        </div>

        <!-- Information Section -->
        <div class="p-6 md:p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Phone -->
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                    <p class="text-sm text-gray-500 mb-1">
                        Phone Number
                    </p>

                    <h3 class="text-lg font-semibold text-gray-900 break-all">
                        {{ $user['phone'] ?? 'No phone number' }}
                    </h3>
                </div>

                <!-- City -->
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                    <p class="text-sm text-gray-500 mb-1">
                        City
                    </p>

                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ ucfirst($user['city'] ?? 'Unknown') }}
                    </h3>
                </div>

                <!-- Location -->
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                    <p class="text-sm text-gray-500 mb-1">
                        Location
                    </p>

                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ ucwords(str_replace('_', ' ', $user['location'] ?? 'Unknown')) }}
                    </h3>
                </div>

                <!-- Created At -->
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                    <p class="text-sm text-gray-500 mb-1">
                        Account Created
                    </p>

                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ date('d M Y', strtotime($user['created_at'])) }}
                    </h3>
                </div>

            </div>

            <!-- Address -->
            <div class="mt-6 bg-gray-50 rounded-xl p-5 border border-gray-200">

                <p class="text-sm text-gray-500 mb-2">
                    Address
                </p>

                <p class="text-gray-800 leading-relaxed">
                    {{ $user['address'] ?? 'No address provided' }}
                </p>

            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">

                <a href="#"
                    class="inline-flex items-center justify-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">

                    <i class="fas fa-pen"></i>
                    Edit User
                </a>

                <a href="{{ route('user.delete', $user['id']) }}"
                    onclick="return confirm('This action cannot be undone. Delete {{ $user['name'] }}?')"
                    class="inline-flex items-center justify-center gap-2 bg-red-600 text-white px-6 py-3 rounded-xl hover:bg-red-700 transition">

                    <i class="fas fa-trash"></i>
                    Delete User
                </a>

            </div>

        </div>

    </div>

    <!-- Footer -->
    <footer class="mt-auto pt-8 text-center text-sm text-gray-500">
        © 2026 EggStore Admin Panel. All rights reserved.
    </footer>

</main>
@endsection
