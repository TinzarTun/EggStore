@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<main class="flex-1 ml-0 md:ml-64 p-6 md:p-8 min-h-screen flex flex-col">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, Admin!</h2>
        <p class="text-gray-600">Here's what's happening with your store today.</p>
    </div>

    <!-- Key Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-900 mt-2">$24,500</p>
                    <p class="text-green-600 text-sm mt-1">+12% from last month</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-900 mt-2">1,234</p>
                    <p class="text-green-600 text-sm mt-1">+8% from last month</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shopping-bag text-amber-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Active Users</p>
                    <p class="text-2xl font-bold text-gray-900 mt-2">856</p>
                    <p class="text-green-600 text-sm mt-1">+15% from last month</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Pending Deliveries</p>
                    <p class="text-2xl font-bold text-gray-900 mt-2">47</p>
                    <p class="text-orange-600 text-sm mt-1">5 urgent</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-truck text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Tables Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Recent Orders Table -->
        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Orders</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-gray-600 font-medium">Order ID</th>
                            <th class="text-left py-3 px-4 text-gray-600 font-medium">Customer</th>
                            <th class="text-left py-3 px-4 text-gray-600 font-medium">Amount</th>
                            <th class="text-left py-3 px-4 text-gray-600 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">#ORD-001</td>
                            <td class="py-3 px-4">John Doe</td>
                            <td class="py-3 px-4">$450.00</td>
                            <td class="py-3 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Delivered</span></td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">#ORD-002</td>
                            <td class="py-3 px-4">Jane Smith</td>
                            <td class="py-3 px-4">$320.00</td>
                            <td class="py-3 px-4"><span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Pending</span></td>
                        </tr>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">#ORD-003</td>
                            <td class="py-3 px-4">Mike Johnson</td>
                            <td class="py-3 px-4">$680.00</td>
                            <td class="py-3 px-4"><span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Processing</span></td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">#ORD-004</td>
                            <td class="py-3 px-4">Sarah Williams</td>
                            <td class="py-3 px-4">$520.00</td>
                            <td class="py-3 px-4"><span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Delivered</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Products</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-100 rounded">
                            <i class="fas fa-egg text-amber-600 text-lg h-10 flex items-center justify-center"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 text-sm">Organic Eggs</p>
                            <p class="text-gray-600 text-xs">234 sold</p>
                        </div>
                    </div>
                    <p class="font-semibold text-gray-900">$560</p>
                </div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-100 rounded">
                            <i class="fas fa-egg text-amber-600 text-lg h-10 flex items-center justify-center"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 text-sm">Free Range Eggs</p>
                            <p class="text-gray-600 text-xs">189 sold</p>
                        </div>
                    </div>
                    <p class="font-semibold text-gray-900">$425</p>
                </div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-100 rounded">
                            <i class="fas fa-egg text-amber-600 text-lg h-10 flex items-center justify-center"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 text-sm">Brown Eggs</p>
                            <p class="text-gray-600 text-xs">156 sold</p>
                        </div>
                    </div>
                    <p class="font-semibold text-gray-900">$315</p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-100 rounded">
                            <i class="fas fa-egg text-amber-600 text-lg h-10 flex items-center justify-center"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 text-sm">Cage Free Eggs</p>
                            <p class="text-gray-600 text-xs">142 sold</p>
                        </div>
                    </div>
                    <p class="font-semibold text-gray-900">$285</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Analytics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Product Inventory -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Inventory</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between mb-2">
                        <p class="text-sm font-medium text-gray-700">Organic Eggs</p>
                        <p class="text-sm text-gray-600">1,240 units</p>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 85%;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <p class="text-sm font-medium text-gray-700">Free Range</p>
                        <p class="text-sm text-gray-600">890 units</p>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 72%;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <p class="text-sm font-medium text-gray-700">Brown Eggs</p>
                        <p class="text-sm text-gray-600">450 units</p>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-amber-500 h-2 rounded-full" style="width: 65%;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <p class="text-sm font-medium text-gray-700">Cage Free</p>
                        <p class="text-sm text-gray-600">120 units</p>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-red-500 h-2 rounded-full" style="width: 35%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reviews -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Reviews</h3>
            <div class="space-y-4">
                <div class="pb-4 border-b border-gray-200">
                    <div class="flex items-start justify-between mb-2">
                        <p class="font-medium text-gray-900 text-sm">Amazing product!</p>
                        <div class="flex text-amber-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 text-xs">by John Doe • 2 hours ago</p>
                </div>
                <div class="pb-4 border-b border-gray-200">
                    <div class="flex items-start justify-between mb-2">
                        <p class="font-medium text-gray-900 text-sm">Great quality eggs</p>
                        <div class="flex text-amber-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 text-xs">by Jane Smith • 5 hours ago</p>
                </div>
                <div>
                    <div class="flex items-start justify-between mb-2">
                        <p class="font-medium text-gray-900 text-sm">Fast delivery</p>
                        <div class="flex text-amber-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 text-xs">by Mike Johnson • 1 day ago</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
