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

            @if(session('success'))
                <div class="mb-4 px-4 py-3 rounded-lg bg-green-100 border border-green-300 text-green-800 flex justify-between items-center">
                    <span>{{ session('success') }}</span>

                    <button onclick="this.parentElement.remove()" class="text-green-700 font-bold">
                        ×
                    </button>
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Image Upload -->
                <div>
                    {{-- <label class="block text-sm font-medium text-gray-700 mb-2">
                        Profile Image
                    </label> --}}

                    <div class="flex items-center gap-6">

                        <!-- Preview -->
                        <div class="w-24 h-24 rounded-full border border-gray-300 overflow-hidden bg-gray-100 flex items-center justify-center">
                            <img id="preview" class="object-cover w-full h-full hidden">
                            <span id="placeholder" class="text-gray-400 text-xs text-center px-2">
                                No Image
                            </span>
                        </div>

                        <!-- Upload Button -->
                        <div>
                            <label class="cursor-pointer inline-block px-4 py-2 bg-amber-600 text-white text-sm rounded-lg shadow hover:bg-amber-700">
                                Choose Image
                                <input type="file" name="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                            </label>

                            <p class="text-xs text-gray-500 mt-2">
                                JPG, PNG, GIF (Max 5MB)
                            </p>
                        </div>

                    </div>

                    @error('image')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <script>
                function previewImage(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    const reader = new FileReader();

                    reader.onload = function () {
                        const img = document.getElementById('preview');
                        const placeholder = document.getElementById('placeholder');

                        img.src = reader.result;
                        img.classList.remove('hidden');
                        placeholder.style.display = 'none';
                    };

                    reader.readAsDataURL(file);
                }
                </script>

                <!-- Name & Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            placeholder="Your Full Name"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="e.g., user@example.com"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Password & Retype Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password"
                            placeholder="Enter password"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Retype Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Retype Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password_confirmation"
                            placeholder="Retype password"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Phone & Gender -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                            placeholder="e.g., 09123456789"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select name="gender"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- City & Location -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- City -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <select name="city"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg">
                            <option value="">Select City</option>
                            <option value="yangon" {{ old('city') == 'yangon' ? 'selected' : '' }}>Yangon</option>
                            <option value="mandalay" {{ old('city') == 'mandalay' ? 'selected' : '' }}>Mandalay</option>
                        </select>
                        @error('city')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <select name="location"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">

                            <option value="">Select Location</option>

                            <!-- Yangon -->
                            <optgroup label="Yangon">
                                <option value="ahlone" {{ old('location') == 'ahlone' ? 'selected' : '' }}>Ahlone</option>
                                <option value="bahan" {{ old('location') == 'bahan' ? 'selected' : '' }}>Bahan</option>
                                <option value="botahtaung" {{ old('location') == 'botahtaung' ? 'selected' : '' }}>Botahtaung</option>
                                <option value="dagon" {{ old('location') == 'dagon' ? 'selected' : '' }}>Dagon</option>
                                <option value="hlaing" {{ old('location') == 'hlaing' ? 'selected' : '' }}>Hlaing</option>
                                <option value="insein" {{ old('location') == 'insein' ? 'selected' : '' }}>Insein</option>
                                <option value="kamayut" {{ old('location') == 'kamayut' ? 'selected' : '' }}>Kamayut</option>
                                <option value="kyauktada" {{ old('location') == 'kyauktada' ? 'selected' : '' }}>Kyauktada</option>
                                <option value="mayangone" {{ old('location') == 'mayangone' ? 'selected' : '' }}>Mayangone</option>
                                <option value="mingaladon" {{ old('location') == 'mingaladon' ? 'selected' : '' }}>Mingaladon</option>
                                <option value="north_dagon" {{ old('location') == 'north_dagon' ? 'selected' : '' }}>North Dagon</option>
                                <option value="north_okkalapa" {{ old('location') == 'north_okkalapa' ? 'selected' : '' }}>North Okkalapa</option>
                                <option value="sanchaung" {{ old('location') == 'sanchaung' ? 'selected' : '' }}>Sanchaung</option>
                                <option value="south_dagon" {{ old('location') == 'south_dagon' ? 'selected' : '' }}>South Dagon</option>
                                <option value="south_okkalapa" {{ old('location') == 'south_okkalapa' ? 'selected' : '' }}>South Okkalapa</option>
                                <option value="tamwe" {{ old('location') == 'tamwe' ? 'selected' : '' }}>Tamwe</option>
                                <option value="thingangyun" {{ old('location') == 'thingangyun' ? 'selected' : '' }}>Thingangyun</option>
                                <option value="thaketa" {{ old('location') == 'thaketa' ? 'selected' : '' }}>Thaketa</option>
                                <option value="yankin" {{ old('location') == 'yankin' ? 'selected' : '' }}>Yankin</option>
                            </optgroup>

                            <!-- Mandalay -->
                            <optgroup label="Mandalay">
                                <option value="aungmyaythazan" {{ old('location') == 'aungmyaythazan' ? 'selected' : '' }}>Aungmyaythazan</option>
                                <option value="chanayethazan" {{ old('location') == 'chanayethazan' ? 'selected' : '' }}>Chanayethazan</option>
                                <option value="mahaaungmyay" {{ old('location') == 'mahaaungmyay' ? 'selected' : '' }}>Mahaaungmyay</option>
                                <option value="pyigyidagun" {{ old('location') == 'pyigyidagun' ? 'selected' : '' }}>Pyigyidagun</option>
                                <option value="amarapura" {{ old('location') == 'amarapura' ? 'selected' : '' }}>Amarapura</option>
                            </optgroup>

                        </select>
                        @error('location')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <textarea name="address" rows="3" placeholder="Full address..." class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Terms and Conditions -->
                <div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="terms" value="1"
                        {{ old('terms') ? 'checked' : '' }}
                        class="rounded text-amber-600 focus:ring-amber-500">
                        <label class="text-sm text-gray-700">I agree to the Terms and Conditions</label>
                    </div>
                    @error('terms')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-6 border-t border-gray-200">
                    <button type="reset"
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
@endsection
