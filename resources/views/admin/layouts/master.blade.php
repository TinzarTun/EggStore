<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EggStore - Fresh Eggs Delivered Daily</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .sidebar-mobile {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .sidebar-mobile.active {
            transform: translateX(0);
        }

        @media (min-width: 768px) {
            .sidebar-mobile {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    {{-- Header --}}
    @include('admin.partials.header')

    <div class="flex">
        {{-- Sidebar --}}
        @include('admin.partials.sidebar')

        {{-- Main Content --}}
        @yield('content')
    </div>

    <script>
        // Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.add('hidden');
        });

        // Close sidebar when clicking on a link (mobile)
        const sidebarLinks = sidebar.querySelectorAll('a, button');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
