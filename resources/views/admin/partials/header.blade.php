<!-- Header -->
<header class="bg-white border-b border-gray-200 sticky top-0 z-40">
    <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-3">
            <button id="sidebarToggle" class="md:hidden p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center">
                <i class="fas fa-egg text-white text-lg"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">EggStore</h1>
        </div>
        <div class="flex items-center gap-4">
            <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                <i class="fas fa-bell text-xl"></i>
                <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>
            <div class="relative group">
                <button class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded-lg">
                    <img src="https://via.placeholder.com/40" alt="Admin" class="w-10 h-10 rounded-full">
                    <span class="text-sm text-gray-700 hidden sm:block">Admin User</span>
                    <i class="fas fa-chevron-down text-sm text-gray-600 hidden sm:block"></i>
                </button>
                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-50 border-b border-gray-200">
                        <i class="fas fa-user text-gray-600"></i>
                        <span>My Profile</span>
                    </a>
                    <a href="admin-profile.html" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-50 border-b border-gray-200">
                        <i class="fas fa-cog text-gray-600"></i>
                        <span>Settings</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-sign-out-alt text-gray-600"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
