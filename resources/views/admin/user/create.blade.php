@extends('admin.layouts.master')

@section('content')
<main class="flex-1 ml-0 md:ml-64 p-6 md:p-8 min-h-screen flex flex-col">

    <!-- Breadcrumb -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Create New User</h2>
        <p class="text-sm text-gray-500 flex items-center gap-2">
            <a href="#" class="hover:text-gray-700">User List</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-medium">Create User</span>
        </p>
    </div>

    <!-- Form Wrapper -->
    <div class="w-full">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 md:p-8 max-w-5xl">

            <form class="space-y-6">

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                    <input type="text" name="name"
                        placeholder="e.g., John Doe"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                    <input type="email" name="email"
                        placeholder="e.g., john@example.com"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password *</label>
                    <input type="password" name="password"
                        placeholder="Enter password"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone"
                        placeholder="e.g., +959123456789"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                </div>

                <!-- City & Location -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- City -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <select name="city"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                            <option value="">Select City</option>
                            <option value="yangon">Yangon</option>
                            <option value="mandalay">Mandalay</option>
                        </select>
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <select name="location"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">

                            <option value="">Select Location</option>

                            <!-- Yangon -->
                            <optgroup label="Yangon">
                                <option>Ahlone</option>
                                <option>Bahan</option>
                                <option>Botahtaung</option>
                                <option>Dagon</option>
                                <option>Hlaing</option>
                                <option>Insein</option>
                                <option>Kamayut</option>
                                <option>Kyauktada</option>
                                <option>Mayangone</option>
                                <option>Mingaladon</option>
                                <option>North Dagon</option>
                                <option>North Okkalapa</option>
                                <option>Sanchaung</option>
                                <option>South Dagon</option>
                                <option>South Okkalapa</option>
                                <option>Tamwe</option>
                                <option>Thingangyun</option>
                                <option>Thaketa</option>
                                <option>Yankin</option>
                            </optgroup>

                            <!-- Mandalay -->
                            <optgroup label="Mandalay">
                                <option>Aungmyaythazan</option>
                                <option>Chanayethazan</option>
                                <option>Mahaaungmyay</option>
                                <option>Pyigyidagun</option>
                                <option>Amarapura</option>
                            </optgroup>

                        </select>
                    </div>

                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <textarea name="address" rows="3"
                        placeholder="Full address..."
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none"></textarea>
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>

                    <label class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-amber-500 transition">
                        <i class="fas fa-user-circle text-gray-400 text-3xl mb-2"></i>
                        <p class="text-sm text-gray-600">Click to upload</p>
                        <input id="userImageInput" type="file" name="image" class="hidden" accept="image/*">
                    </label>

                    <!-- Preview -->
                    <div id="userPreview" class="mt-4"></div>
                </div>

                <!-- Email Verified -->
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="email_verified_at" value="1"
                        class="rounded text-amber-600 focus:ring-amber-500">
                    <label class="text-sm text-gray-700">Mark email as verified</label>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
                    <button type="button"
                        class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-6 py-2.5 rounded-lg bg-amber-600 text-white hover:bg-amber-700 shadow-sm">
                        Create User
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto pt-6 text-center text-sm text-gray-500">
        © 2026 EggStore Admin Panel. All rights reserved.
    </footer>

</main>

<script>
// Image Preview Script (Single Image)
const userImageInput = document.getElementById('userImageInput');
const userPreview = document.getElementById('userPreview');

userImageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    const reader = new FileReader();

    reader.onload = function (e) {
        userPreview.innerHTML = `
            <div class="relative inline-block">
                <img src="${e.target.result}" class="w-32 h-32 object-cover rounded-lg border">

                <button type="button"
                    id="removeImage"
                    class="absolute top-1 right-1 bg-red-500 text-white text-xs px-2 py-1 rounded">
                    ✕
                </button>
            </div>
        `;

        document.getElementById('removeImage').onclick = () => {
            userPreview.innerHTML = '';
            userImageInput.value = '';
        };
    };

    reader.readAsDataURL(file);
});
</script>
@endsection
