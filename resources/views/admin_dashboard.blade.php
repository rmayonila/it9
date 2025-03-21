<!DOCTYPE html>
<html lang="en">
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
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 250px;
            background-color: #d32f2f;
            color: white;
            padding: 2rem;
        }

        .sidebar h2 {
            margin-bottom: 2rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: white;
            text-decoration: none;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 0.5rem;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
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
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .stat-card h3 {
            color: #666;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            color: #333;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logout-btn {
            background-color: #fff;
            color: #d32f2f;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <a href="#" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#" class="nav-link"><i class="fas fa-user-graduate"></i> Students</a>
            <a href="#" class="nav-link"><i class="fas fa-book"></i> Courses</a>
            <a href="#" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Students</h3>
                <p>1,234</p>
            </div>
            <div class="stat-card">
                <h3>New Applications</h3>
                <p>56</p>
            </div>
            <div class="stat-card">
                <h3>Active Courses</h3>
                <p>24</p>
            </div>
            <div class="stat-card">
                <h3>Faculty Members</h3>
                <p>89</p>
            </div>
        </div>
    </div>
</body>
</html>