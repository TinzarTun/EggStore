<!-- Sidebar -->
<aside id="sidebar" class="sidebar-mobile fixed left-0 top-20 w-64 h-[calc(100vh-5rem)] bg-gray-900 flex flex-col z-30">
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-white bg-amber-600 rounded-lg">
            <i class="fas fa-chart-line"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('user.list') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
        {{-- <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-box"></i>
            <span>Products</span>
        </a> --}}
        {{-- <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-list"></i>
            <span>Categories</span>
        </a> --}}
        {{-- <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span>
        </a> --}}
        {{-- <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-star"></i>
            <span>Reviews</span>
        </a> --}}
        {{-- <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-truck"></i>
            <span>Deliveries</span>
        </a> --}}
        {{-- <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-credit-card"></i>
            <span>Payments</span>
        </a> --}}
        {{-- <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-lock"></i>
            <span>Roles & Permissions</span>
        </a> --}}
    </nav>
    <div class="px-4 py-4 border-t border-gray-700">
        <button class="w-full flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 rounded-lg">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </button>
    </div>
</aside>

<!-- Mobile Overlay -->
<div id="sidebarOverlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-20" style="top: 5rem;"></div>
