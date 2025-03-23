<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Old Student Registration - University M.</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

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

        .requirements {
            background: #fff3e0;
            padding: 1rem;
            border-radius: 6px;
            margin: 1rem 0;
        }

        .requirements h4 {
            color: #e65100;
            margin-bottom: 0.5rem;
        }

        .requirements ul {
            list-style-type: none;
            padding-left: 0;
        }

        .requirements li {
            margin-bottom: 0.5rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .requirements li:before {
            content: "•";
            color: #e65100;
            position: absolute;
            left: 0;
        }
        
        .btn {
            background: #d32f2f;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #b71c1c;
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .loading {
            display: none;
            color: #666;
            margin-top: 0.5rem;
        }

        .error-message {
            color: #d32f2f;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        .success-message {
            color: #2e7d32;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        input:disabled {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }
        .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.9); /* Darker background */
    z-index: 1000;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px); /* Added blur effect */
}

.modal-content {
    background: linear-gradient(to bottom, #ffffff, #f8f9fa); /* Gradient background */
    padding: 3rem;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    position: relative;
    animation: slideIn 0.3s ease-out;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2); /* Enhanced shadow */
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.modal h2 {
    color: #d32f2f;
    margin-bottom: 2rem;
    text-align: center;
    font-size: 1.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.modal input {
    background-color: rgba(255, 255, 255, 0.9);
    border: 2px solid #ddd;
    transition: all 0.3s ease;
    padding: 1rem;
}

.modal input:focus {
    border-color: #d32f2f;
    outline: none;
    box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.1);
    transform: translateY(-1px);
}
@keyframes slideIn {
    from { 
        transform: translateY(-20px); 
        opacity: 0; 
    }
    to { 
        transform: translateY(0); 
        opacity: 1; 
    }
}
    .modal h2 {
        color: #d32f2f;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .modal-footer {
        margin-top: 1.5rem;
        display: flex;
        gap: 1rem;
    }

    .btn-secondary {
        background: #666;
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #555;
    }

    .verify-btn, .cancel-btn {
        flex: 1;
    }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>University M.</h2>
    </div>

    <div class="form-container">
        <h1>Old Student Registration</h1>
        
        <div class="requirements">
            <h4>Requirements</h4>
            <ul>
                <li>Valid Student ID</li>
                <li>Down-payment for enrollment</li>
            </ul>
        </div>

        <form action="{{ route('old-student') }}" method="POST" id="registrationForm">
            @csrf
            <div class="form-grid">
                <div class="form-section">
                    <h3>Personal Information</h3>
                    @if(!Session::has('verified_student_id'))
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="text" id="student_id" name="student_id" required>
                        <div class="loading">Verifying student ID...</div>
                        <div class="message"></div>
                    </div>
                    @endif
                    
                    <div class="student-info" style="{{ Session::has('verified_student_id') ? '' : 'display: none;' }}">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" value="{{ $student->full_name ?? '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $student->email ?? '' }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Academic Details</h3>
                    <div class="student-info" style="{{ Session::has('verified_student_id') ? '' : 'display: none;' }}">
                        <div class="form-group">
                            <label for="course">Strand</label>
                            <input type="text" id="course" name="course" value="{{ $student->course ?? '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="year_level">Year Level</label>
                            <input type="text" id="year_level" name="year_level" value="{{ $student->year_level == 1 ? 'Grade 11' : 'Grade 12' }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <a href="/" class="back-link">← Back to Home</a>
                <button type="submit" class="btn" style="{{ Session::has('verified_student_id') ? '' : 'display: none;' }}">
                    Submit Registration
                </button>
            </div>
        </form>
    </div>
           
        

    <script>
    $(document).ready(function() {
        // Show modal on page load
        $('#verifyModal').css('display', 'flex');

        // Handle verification
        $('.verify-btn').on('click', function() {
            const studentId = $('#verify_student_id').val();
            
            if (studentId.length >= 5) {
                $('.loading').show();
                $('.message').removeClass('error-message success-message').text('');
                
                $.ajax({
                    url: '{{ route("verify") }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { student_id: studentId },
                    success: function(response) {
                        $('.loading').hide();
                        if (response.found) {
                            $('.message')
                                .removeClass('error-message')
                                .addClass('success-message')
                                .text('Student verified successfully!');
                            
                            // Fill form fields
                            $('#full_name').val(response.student.full_name);
                            $('#email').val(response.student.email);
                            $('#course').val(response.student.course);
                            $('#year_level').val(response.student.year_level === 1 ? 'Grade 11' : 'Grade 12');
                            
                            // Show form sections
                            $('.student-info').slideDown();
                            $('.btn').slideDown();
                            
                            // Close modal after delay
                            setTimeout(function() {
                                $('#verifyModal').fadeOut();
                            }, 1000);
                        } else {
                            $('.message')
                                .removeClass('success-message')
                                .addClass('error-message')
                                .text('Student ID not found. Please check and try again.');
                        }
                    },
                    error: function() {
                        $('.loading').hide();
                        $('.message')
                            .removeClass('success-message')
                            .addClass('error-message')
                            .text('Error verifying student ID. Please try again.');
                    }
                });
            } else {
                $('.message')
                    .removeClass('success-message')
                    .addClass('error-message')
                    .text('Please enter a valid student ID (minimum 5 characters).');
            }
        });

        // Handle cancel button
        $('.cancel-btn').on('click', function() {
            window.location.href = '/';
        });
    });
</script>
</body>
</html>