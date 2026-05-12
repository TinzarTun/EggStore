@extends('admin.layouts.master')

@section('content')
<main class="flex-1 min-w-0 ml-0 md:ml-64 p-4 sm:p-6 md:p-8 min-h-screen flex flex-col bg-gray-50">

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h2 class="text-3xl font-bold text-gray-900">
                Users Management
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Manage all registered users
            </p>
        </div>

        <!-- Add User -->
        <a href="{{ route('user.create') }}"
            class="inline-flex items-center gap-2 bg-amber-600 text-white px-5 py-3 rounded-lg hover:bg-amber-700 transition shadow-sm">

            <i class="fas fa-plus"></i>
            New User
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5 mb-6">

        <div class="flex flex-col lg:flex-row gap-4">

            <!-- Search -->
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                <input type="text"
                    placeholder="Search user by name or email..."
                    class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-amber-500 outline-none">
            </div>

            <!-- Gender Filter -->
            <select class="w-full lg:w-auto px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-amber-500 outline-none">
                <option value="">All Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <!-- City Filter -->
            <select class="w-full lg:w-auto px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-amber-500 outline-none">
                <option value="">All Cities</option>
                <option value="yangon">Yangon</option>
                <option value="mandalay">Mandalay</option>
            </select>

            <!-- Filter Button -->
            <button class="w-full lg:w-auto bg-gray-900 text-white px-6 py-3 rounded-xl hover:bg-black transition">
                Filter
            </button>

        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200">

        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="font-semibold text-gray-800">
                Users List
            </h3>

            <span class="text-sm text-gray-500">
                Total: 25 Users
            </span>
        </div>

        <!-- Responsive Table -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[700px] table-auto">

                <thead class="bg-gray-50 border-b border-gray-200">

                    <tr>
                        <th class="px-4 py-4 text-left text-sm font-semibold text-gray-700">
                            User
                        </th>

                        <th class="px-4 py-4 text-left text-sm font-semibold text-gray-700 hidden md:table-cell">
                            Phone
                        </th>

                        <th class="px-4 py-4 text-left text-sm font-semibold text-gray-700 hidden md:table-cell">
                            Gender
                        </th>

                        <th class="px-4 py-4 text-left text-sm font-semibold text-gray-700 hidden lg:table-cell">
                            City
                        </th>

                        <th class="px-4 py-4 text-left text-sm font-semibold text-gray-700">
                            Status
                        </th>

                        <th class="px-4 py-4 text-center text-sm font-semibold text-gray-700">
                            Actions
                        </th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">

                    <tr class="hover:bg-gray-50 transition">

                        <!-- User -->
                        <td class="px-4 py-4">

                            <div class="flex items-center gap-3">

                                <img src="https://i.pravatar.cc/100?img=12"
                                    class="w-10 h-10 rounded-full object-cover border border-gray-200">

                                <div class="min-w-0">
                                    <p class="font-medium text-gray-900 truncate">
                                        John Doe
                                    </p>

                                    <p class="text-sm text-gray-500 truncate">
                                        johndoe@example.com
                                    </p>
                                </div>

                            </div>

                        </td>

                        <!-- Phone -->
                        <td class="px-4 py-4 text-gray-700 hidden md:table-cell">
                            09123456789
                        </td>

                        <!-- Gender -->
                        <td class="px-4 py-4 hidden md:table-cell">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                Male
                            </span>
                        </td>

                        <!-- City -->
                        <td class="px-4 py-4 text-gray-700 hidden lg:table-cell">
                            Yangon
                        </td>

                        <!-- Status -->
                        <td class="px-4 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                Active
                            </span>
                        </td>

                        <!-- Actions -->
                        <td class="px-4 py-4 text-center">

                            <div class="relative inline-block text-left group">

                                <!-- Dropdown Button -->
                                <button
                                    class="w-9 h-9 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition">

                                    <i class="fas fa-ellipsis-v"></i>
                                </button>

                                <!-- Dropdown Menu -->
                                <div class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10">

                                    <a href="#"
                                        class="flex items-center gap-3 px-4 py-3 text-sm text-amber-600 hover:bg-gray-50">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>

                                    <a href="#"
                                        class="flex items-center gap-3 px-4 py-3 text-sm text-blue-600 hover:bg-gray-50">
                                        <i class="fas fa-pen"></i>
                                        Edit
                                    </a>

                                    <button
                                        class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-gray-50">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>

                                </div>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <!-- Pagination -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 mt-6">

        <p class="text-sm text-gray-500">
            Showing 1 to 10 of 25 users
        </p>

        <div class="flex items-center gap-2">

            <button
                class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                Previous
            </button>

            <button
                class="w-10 h-10 rounded-lg bg-amber-600 text-white">
                1
            </button>

            <button
                class="w-10 h-10 rounded-lg border border-gray-300 hover:bg-gray-100">
                2
            </button>

            <button
                class="w-10 h-10 rounded-lg border border-gray-300 hover:bg-gray-100">
                3
            </button>

            <button
                class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                Next
            </button>

        </div>

    </div>

    <!-- Footer -->
    <footer class="mt-auto pt-8 text-center text-sm text-gray-500">
        © 2026 EggStore Admin Panel. All rights reserved.
    </footer>

</main>
@endsection
