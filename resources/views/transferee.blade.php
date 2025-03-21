<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transferee Application - University M.</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .navbar {
            background-color: #d32f2f;
            padding: 1.5rem 2rem;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            color: #d32f2f;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 500;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .btn {
            background-color: #d32f2f;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #b71c1c;
        }

        .required {
            color: #d32f2f;
        }

        .back-link {
            display: block;
            margin-top: 1rem;
            text-align: center;
            color: #666;
            text-decoration: none;
        }

        .back-link:hover {
            color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>University M.</h2>
    </div>
    <div class="container">
        <h1>Transferee Application Form</h1>
        
        <form action="/submit-transferee" method="POST">
            @csrf
            <div class="form-group">
                <label>Full Name <span class="required">*</span></label>
                <input type="text" name="full_name" required>
            </div>

            <div class="form-group">
                <label>Email Address <span class="required">*</span></label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Contact Number <span class="required">*</span></label>
                <input type="tel" name="contact_number" required>
            </div>

            <div class="form-group">
                <label>Previous School <span class="required">*</span></label>
                <input type="text" name="previous_school" required>
            </div>

            <div class="form-group">
                <label>Intended Strand <span class="required">*</span></label>
                <select name="program" required>
                    <option value="">Select a strand</option>
                    <option value="STEM">STEM</option>
                    <option value="HUMSS">HUMSS</option>
                    <option value="ABM">ABM</option>
                    <option value="TVL">TVL</option>
                </select>
            </div>
            <div class="form-group">
                <label>Year Level <span class="required">*</span></label>
                <select name="academic_year" required>
                    <option value="">Select year level</option>
                    <option value="2025-2026">Grade 11</option>
                    <option value="2026-2027">Grade 12</option>
                </select>
            </div>
            <div class="form-group">
                <label>Additional Information</label>
                <textarea name="additional_info" rows="4"></textarea>
            </div>

            <button type="submit" class="btn">Submit Application</button>
        </form>

        <a href="/" class="back-link">← Back to Home</a>
    </div>
</body>
</html>