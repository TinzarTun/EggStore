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

        <form action="{{ route('user.list') }}" method="get">
            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Search -->
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search user by name, email, or phone..."
                        class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-amber-500 outline-none">
                </div>

                <!-- City Filter -->
                <select name="city" class="w-full lg:w-auto px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-amber-500 outline-none">
                    <option value="">All Cities</option>
                    <option value="yangon" {{ request('city') === 'yangon' ? 'selected' : '' }}>Yangon</option>
                    <option value="mandalay" {{ request('city') === 'mandalay' ? 'selected' : '' }}>Mandalay</option>
                    <option value="unknown" {{ request('city') === 'unknown' ? 'selected' : '' }}>Unknown</option>
                </select>

                <!-- Status Filter -->
                <select name="status" class="w-full lg:w-auto px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-amber-500 outline-none">
                    <option value="">All Status</option>
                    <option value="yes" {{ request('status') === 'yes' ? 'selected' : '' }}>Yes</option>
                    <option value="no" {{ request('status') === 'no' ? 'selected' : '' }}>No</option>
                </select>

                <!-- Filter Button -->
                <button type="submit" class="w-full lg:w-auto bg-gray-900 text-white px-6 py-3 rounded-xl hover:bg-black transition">
                    Filter
                </button>

            </div>
        </form>
    </div>

    @if(session('success'))
    <div class="mb-6 flex items-center justify-between gap-4 rounded-xl border border-green-200 bg-green-100 px-5 py-4 text-green-800 shadow-sm">

        <div class="flex items-center gap-3">
            <i class="fas fa-circle-check text-green-600"></i>

            <span class="font-medium">
                {{ session('success') }}
            </span>
        </div>

        <button type="button"
            onclick="this.closest('div').remove()"
            class="text-green-700 hover:text-green-900">
            <i class="fas fa-times"></i>
        </button>

    </div>
    @endif

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-visible">

        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="font-semibold text-gray-800">
                Users List
            </h3>

            <span class="text-sm text-gray-500">
                Total: {{ $users->total() }} Users
            </span>
        </div>

        <!-- Responsive Table -->
        <div class="w-full overflow-visible">

            <table class="w-full table-auto">

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

                    @forelse ($users as $user)

                    <tr class="hover:bg-gray-50 transition">

                        <!-- User -->
                        <td class="px-4 py-4">

                            <div class="flex items-center gap-3">

                                @if ($user->image)
                                    <img src="{{ Storage::url($user->image) }}"
                                        class="w-10 h-10 rounded-full object-cover border border-gray-200">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                                        class="w-10 h-10 rounded-full object-cover border border-gray-200">
                                @endif

                                <div class="min-w-0">
                                    <p class="font-medium text-gray-900 truncate">
                                        {{ $user->name }}
                                    </p>

                                    <p class="text-sm text-gray-500 truncate">
                                        {{ $user->email ?? 'Not provided' }}
                                    </p>
                                </div>

                            </div>

                        </td>

                        <!-- Phone -->
                        <td class="px-4 py-4 text-gray-700 hidden md:table-cell">
                            {{ $user->phone ?? 'No phone' }}
                        </td>

                        <!-- Gender -->
                        <td class="px-4 py-4 hidden md:table-cell">
                            @switch($user->gender)

                                @case('male')
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                        Male
                                    </span>
                                    @break

                                @case('female')
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-pink-100 text-pink-700">
                                        Female
                                    </span>
                                    @break

                                @case('other')
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                        Other
                                    </span>
                                    @break

                                @default
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                        N/A
                                    </span>

                            @endswitch
                        </td>

                        <!-- City -->
                        <td class="px-4 py-4 text-gray-700 hidden lg:table-cell">
                            {{ ucfirst($user->city ?? 'Unknown') }}
                        </td>

                        <!-- Status -->
                        <td class="px-4 py-4">
                            @php
                                $hasRole = $user->roles->count() > 0;

                                $hasPermission = $user->roles->some(function ($role) {
                                    return $role->permissions->count() > 0;
                                });

                                $isYes = $hasRole && $hasPermission;
                            @endphp

                            @if($isYes)
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Yes
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-200 text-red-700">
                                    No
                                </span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="px-4 py-4 text-center">

                            <div class="relative inline-block text-left">

                                <!-- Dropdown Button -->
                                <button
                                    type="button"
                                    onclick="toggleDropdown(this)"
                                    class="w-9 h-9 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition">

                                    <i class="fas fa-ellipsis-v"></i>
                                </button>

                                <!-- Dropdown Menu -->
                                <div
                                    class="absolute right-0 top-full mt-2 w-40 bg-white border border-gray-200 rounded-xl shadow-2xl z-[9999] hidden group-menu">

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

                                    <a href="{{ route('user.delete', $user['id']) }}"
                                        onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')"
                                        class="flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-gray-50">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>

                                </div>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="px-4 py-10 text-center text-gray-500">
                            No users found.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Pagination -->
    <div class="mt-6 flex flex-col md:flex-row items-center justify-between gap-4">

        <p class="text-sm text-gray-500">
            Showing {{ $users->firstItem() ?? 0 }}
            to {{ $users->lastItem() ?? 0 }}
            of {{ $users->total() }} users
        </p>

        <div class="flex items-center gap-1">
            {{-- Previous --}}
            @if ($users->onFirstPage())
                <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $users->previousPageUrl() }}"
                   class="px-3 py-2 bg-white border rounded-lg hover:bg-gray-100">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                @if ($page == $users->currentPage())
                    <span class="px-3 py-2 bg-amber-600 text-white rounded-lg">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}"
                       class="px-3 py-2 bg-white border rounded-lg hover:bg-gray-100">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            {{-- Next --}}
            @if ($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}"
                   class="px-3 py-2 bg-white border rounded-lg hover:bg-gray-100">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </span>
            @endif
        </div>

    </div>


    <!-- Footer -->
    <footer class="mt-auto pt-8 text-center text-sm text-gray-500">
        © 2026 EggStore Admin Panel. All rights reserved.
    </footer>

    <script>
        function toggleDropdown(button) {

            // close all dropdowns first
            document.querySelectorAll('.group-menu').forEach(menu => {
                if (menu !== button.nextElementSibling) {
                    menu.classList.add('hidden');
                }
            });

            // toggle current dropdown
            button.nextElementSibling.classList.toggle('hidden');
        }

        // close dropdown when clicking outside
        document.addEventListener('click', function(e) {

            if (!e.target.closest('.relative')) {

                document.querySelectorAll('.group-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });

            }

        });
    </script>

</main>
@endsection
