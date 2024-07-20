@extends('layouts.profile_navigation')

@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sportee</title>
        <link rel="stylesheet" type="text/css" href="./../css/home.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <script src="script.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </head>

    <body>

        <!-------Home  Section------->
        <section class="home" id="home">
            <div class="about-img">
                <img src="/img/logo.png">
            </div>
            <div class="contactform shadow border-solid" style=" margin-top:80px;">
                <div class="section-header">
                    <h3 class="title">User Profile</h3>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <input hidden readonly type="text" name="user_id" required class="form-input"
                                value="{{ $user->id }}">
                            <label for="feedback_name">First Name:</label>
                            <input type="text" name="userFname" required class="form-input" value="{{ $user->fname }}">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="feedback_name">Last Name:</label>
                            <input type="text" name="userLname" required class="form-input" value="{{ $user->lname }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="userEmail">Email:</label> <span class="text-form text-muted">(User Email
                                address)</span>
                            <input type="email" name="userEmail" required class="form-input" value="{{ $user->email }}""
                                placeholder="{{ $user->email }}">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="userContact">Contact:</label> <span class="text-form text-muted">(User
                                Contact)</span>
                            <input type="text" name="userContact" required class="form-input"
                                value="{{ $user->contact }}">
                            @if ($errors->has('userContact'))
                                <span class="text-danger">{{ $errors->first('userContact') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="userContact">Password:</label> <span class="text-form text-muted">(Update password
                            optional)</span>
                        <input type="password" name="password" class="form-input" placeholder="*********">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="usercreatedAt">Account created at:</label> <span class="text-form text-muted">(User
                            account created at)</span>
                        <input readonly disable type="text" name="usercreatedAt" required class="form-input"
                            value="{{ $user->created_at }}">
                    </div>
                    <button type="submit" class="btn btn-secondary">Update Account</button>
                </form>
            </div>
        </section>

        <!-- Trickshot About Section -->
        <section class="about" id="about">
            <div class="about-text">
                <div class="contactform shadow border-solid" style="height:580px; width:1000px; margin-top:80px;">
                    <div class="section-header">
                        <h3 class="title">User History</h3>
                    </div>
                    <form method="post" action="#">
                        <div class="mb-3 col-6">
                            <label for="userFullName" class="form-label fw-semibold">Status</label>
                            <span class="small-label form-text text-muted">(Select a status to filter)</span>
                            <select class="form-select" name="status" id="status"
                                aria-label="Default select example">
                                <option disabled selected>Status</option>
                                <option value="pending">Pending</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                        <div class="col-12" style="max-height: 300px; overflow-y: auto;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Court</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col-12">Fee</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="eventTable">
                                    @foreach ($events as $event)
                                        <tr data-status="{{ $event->status }}">
                                            <td class="fw-semibold">{{ $event->title }}</td>
                                            <td>{{ $event->start_date }}</td>
                                            <td>{{ $event->end_date }}</td>
                                            <td>{{ $event->rent_fee }} php</td>
                                            <td>{{ $event->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="social">

                </div>
            </div>

            <div class="about-img" style="margin-left:70px; height:250; width:300px;">
                <img src="/img/22.png">
            </div>
        </section>


        <!------------------ Service Section ------------------->
        <section class="service" id="services">
            <div class="heading">
                <span>TRICKSHOT BADMINTON CENTER</span>
                <h2> Other Services!</h2>
            </div>
            <div class="service-container">
                <div class="s-box">
                    <img src="img/s1.png">
                    <h3>Online Booking</h3>
                    <p>Smash your way to convenience with our SPORTE'e online badminton booking!</p>
                </div>
                <div class="s-box">
                    <img src="img/s2.png">
                    <h3>String Tension</h3>
                    <p>Elevate your game, one string at a time. Badminton tensioning made effortless. </p>
                </div>
                <div class="s-box">
                    <img src="img/s3.png">
                    <h3>Sports Clothing </h3>
                    <p>Dominate the court in style and comfort with our badminton gear. </p>
                </div>

            </div>
            </div>
        </section>

        <!----------- Footer Section  ------------>
        <section id="contact">
            <div class="footer">
                <div class="main">
                    <div class="col">
                        <h4>Menu Links</h4>
                        <ul>
                            <li><a href="#home" class="text-decoration-none">Profile</a></li>
                            <li><a href="#about" class="text-decoration-none">History</a></li>
                            <li><a href="#services" class="text-decoration-none">Services</a></li>
                        </ul>
                    </div>



                    <div class="col">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="#" class="text-decoration-none">Web Design</a></li>
                            <li><a href="#" class="text-decoration-none">Development</a></li>
                            <li><a href="#" class="text-decoration-none">Marketing</a></li>
                            <!-- Add more services as needed -->
                        </ul>
                    </div>



                    <div class="col">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="#" class="text-decoration-none">About Us</a></li>
                            <li><a href="#" class="text-decoration-none">Delivery Information</a></li>
                            <li><a href="#" class="text-decoration-none">Privacy Policy</a></li>
                            <li><a href="#" class="text-decoration-none">Terms And Conditions</a></li>
                        </ul>
                    </div>


                    <div class="col">
                        <h4>Contact Us</h4>
                        <div class="social">

                            <a href="#"><i class='bx bxl-facebook text-decoration-none'></i></a>
                            <a href="#"><i class='bx bxl-messenger text-decoration-none'></i></a>
                            <a href="#"><i class='bx bxl-gmail text-decoration-none'></i></a>
                            <a href="#"><i class='bx bxl-telegram text-decoration-none'></i></a>
                        </div>
                    </div>
                </div>
        </section>

        <!--JavaScript-->
        {{-- scripts for filtering start --}}

        <script>
            document.getElementById('status').addEventListener('change', function() {
                var selectedStatus = this.value;
                var rows = document.querySelectorAll('#eventTable tr');

                rows.forEach(function(row) {
                    var rowStatus = row.getAttribute('data-status');
                    if (selectedStatus === 'all' || rowStatus === selectedStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
        {{-- scripts for filtering end --}}


        <script type="text/javascript" src="/script.js"></script>

    </body>
@endsection
