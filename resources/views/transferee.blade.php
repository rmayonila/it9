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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 5rem;
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

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        input:invalid, select:invalid {
            border-color: #dc3545;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        // Add to the existing <style> section
.form-section {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
}

.form-section h3 {
    color: #d32f2f;
    margin-bottom: 1rem;
    border-bottom: 2px solid #d32f2f;
    padding-bottom: 0.5rem;
}

input[type="file"] {
    padding: 0.5rem;
    border: 1px dashed #ddd;
    background: white;
}

input[type="file"]:hover {
    border-color: #d32f2f;
}

.file-help {
    display: block;
    color: #666;
    font-size: 0.85rem;
    margin-top: 0.25rem;
}

.file-preview {
    margin-top: 0.5rem;
    max-width: 200px;
    display: none;
}
    </style>
</head>
<body>
    <div class="navbar">
        <h2>University M.</h2>
    </div>
    <div class="container">
        <h1>Transferee Application Form</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('transferee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Full Name <span class="required">*</span></label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required>
            </div>

            <div class="form-group">
                <label>Email Address <span class="required">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Contact Number <span class="required">*</span></label>
                <input type="tel" name="contact_number" value="{{ old('contact_number') }}" required 
                       pattern="[0-9]{11}" title="Please enter a valid 11-digit phone number">
            </div>

            <div class="form-group">
                <label>Previous School <span class="required">*</span></label>
                <input type="text" name="previous_school" value="{{ old('previous_school') }}" required>
            </div>

            <div class="form-group">
                <label>Intended Strand <span class="required">*</span></label>
                <select name="program" required>
                    <option value="" disabled selected>Select a strand</option>
                    <option value="STEM" {{ old('program') == 'STEM' ? 'selected' : '' }}>STEM</option>
                    <option value="ABM" {{ old('program') == 'ABM' ? 'selected' : '' }}>ABM</option>
                </select>
            </div>

            <div class="form-group">
                <label>Year Level <span class="required">*</span></label>
                <select name="academic_year" required>
                    <option value="" disabled selected>Select year level</option>
                    <option value="2025-2026" {{ old('academic_year') == '2025-2026' ? 'selected' : '' }}>Grade 11</option>
                    <option value="2026-2027" {{ old('academic_year') == '2026-2027' ? 'selected' : '' }}>Grade 12</option>
                </select>
            </div>

            <div class="form-group">
                <label>Additional Information</label>
            </div>
            <div class="form-section">
    <h3>Required Documents</h3>
    <div class="form-group">
        <label>Report Card <span class="required">*</span></label>
        <input type="file" name="report_card" accept=".pdf,.jpg,.jpeg,.png" required>
        <small class="file-help">Accepted formats: PDF, JPG, PNG (Max: 2MB)</small>
    </div>

    <div class="form-group">
        <label>Good Moral Certificate <span class="required">*</span></label>
        <input type="file" name="good_moral" accept=".pdf,.jpg,.jpeg,.png" required>
        <small class="file-help">Accepted formats: PDF, JPG, PNG (Max: 2MB)</small>
    </div>

    <div class="form-group">
        <label>Birth Certificate <span class="required">*</span></label>
        <input type="file" name="Birth_certificate" accept=".pdf,.jpg,.jpeg,.png" required>
        <small class="file-help">Accepted formats: PDF, JPG, PNG (Max: 2MB)</small>
    </div>
</div>
        <button type="submit" class="btn">Submit Application</button>
        </form>
        <a href="/" class="back-link">← Back to Home</a>
    </div>

    <script>
    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        input.addEventListener('change', function(e) {
            // Check file size
            if (this.files[0] && this.files[0].size > 2 * 1024 * 1024) {
                alert('File size must be less than 2MB');
                this.value = '';
                return;
            }

            // Show preview for images
            if (this.files[0] && this.files[0].type.startsWith('image/')) {
                let preview = this.nextElementSibling.nextElementSibling || 
                            document.createElement('img');
                preview.className = 'file-preview';
                preview.src = URL.createObjectURL(this.files[0]);
                if (!this.nextElementSibling.nextElementSibling) {
                    this.parentNode.appendChild(preview);
                }
                preview.style.display = 'block';
            }
        });
    });
</script>
</body>
</html>