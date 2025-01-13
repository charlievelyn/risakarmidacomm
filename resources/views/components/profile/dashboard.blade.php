<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @stack('metas')
    
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
        }

        .sidebar a {
            text-decoration: none;
            color: #adb5bd;
            display: block;
            padding: 0.75rem 1.25rem;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .sidebar .active {
            background-color: #495057;
        }

        .logout button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            width: 100%;
        }

        .logout button:hover {
            background-color: #c82333;
        }

        .main-content {
            padding: 2rem;
            margin-left: 250px;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column">
            <div>
                <div class="text-center py-3 border-bottom border-secondary">
                    <h4>Admin Dashboard</h4>
                </div>
                <a href="{{ route('admin.mainpage') }}" class="{{ request()->is('admin/mainpage') ? 'active' : '' }}">
                    <i class="bi bi-house-door-fill"></i> Dashboard
                </a>
                <a href="{{ route('admin.listuser') }}" class="{{ request()->is('admin/listuser') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Admin List
                </a>
                {{-- <a href="{{ route('admin.edit.banner') }}" class="{{ request()->is('admin/edit-banner') ? 'active' : '' }}">
                    <i class="bi bi-image-fill"></i> Edit Banner
                </a> --}}
                {{-- <a href="{{ route('admin.edit.team') }}" class="{{ request()->is('admin/edit-team') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Edit Team
                </a> --}}
                {{-- <a href="{{ route('admin.edit.client') }}" class="{{ request()->is('admin/edit-client') ? 'active' : '' }}">
                    <i class="bi bi-person-square"></i> Edit Client
                </a> --}}
                <a href="{{ route('trainingevents.listevents') }}" class="{{ request()->is('trainingevents/listevents') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event-fill"></i> Edit Training Event
                </a>
                <a href="{{ route('article.listarticle') }}" class="{{ request()->is('article/listarticle') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text-fill"></i> Edit Article
                </a>
            </div>
            <div class="logout p-3">
                <form method="POST" action="{{ route('keluarGerbang') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content w-100">
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    @stack('scripts')
</body>
</html>
