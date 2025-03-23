<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - University M.</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
        
            background: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background: #d32f2f;
            padding: 2rem;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            margin-bottom: 0.5rem;
            transition: background 0.3s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }

        .logout-btn {
            background: white;
            color: #d32f2f;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .recent-applications {
            margin-top: 2rem;
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            font-weight: 600;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="sidebar">
    <h2>Admin Panel</h2>
    <nav>
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-user-graduate"></i> Students
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-users"></i> Transferees
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-book"></i> Programs
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-cog"></i> Settings
        </a>
    </nav>
</div>

    <div class="main-content">
        <div class="header">
            <h1>Welcome, {{ Auth::guard('admin')->user()->username }}</h1>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Students</h3>
                <p>{{ $stats['total_students'] ?? 0 }}</p>
            </div>
            <div class="stat-card">
                <h3>New Applications</h3>
                <p>{{ $stats['new_applications'] ?? 0 }}</p>
            </div>
            <div class="stat-card">
                <h3>Active Programs</h3>
                <p>{{ $stats['active_programs'] ?? 2 }}</p>
            </div>
            <div class="stat-card">
                <h3>Faculty Members</h3>
                <p>{{ $stats['faculty_members'] ?? 89 }}</p>
            </div>
        </div>

        <div class="recent-applications">
            <h2>Recent Applications</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Program</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recent_applications ?? [] as $application)
                    <tr>
                        <td>{{ $application->full_name }}</td>
                        <td>{{ $application->program }}</td>
                        <td>{{ $application->created_at->format('M d, Y') }}</td>
                        <td>Pending</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No recent applications</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>	