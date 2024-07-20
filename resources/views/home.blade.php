@extends('layouts.navigation')

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

    </head>

    <body>

        <!-------Home  Section------->
        <section class="home" id="home">
            <div class="home-text">
                <h1>WELCOME!</h1>
                <h2 style="font-size: 24px; font-weight: bold; color: #333; text-align: center; margin-top: 20px;">
                    Experience the <span style="color: #ff6b6b;">future</span> of sports facilities with <span
                        style="color: #2ecc71;">SPORTE'e.</span></h2>
                <a href="/reservation" class="btn">Make A Reservation</a>
                <br>
                <a href="{{ route('show.schedule') }}" class="btn pl-2">View court schedules</a>
            </div>


            <div class="home-img">
                <img src="/img/home.png">
            </div>
            </div>
        </section>

        <!-------about  Section------->
        <section class="about" id="about">
            <div class="about-img">
                <img src="/img/about.png">
            </div>

            <div class="about-text">
                <span>About Us</span>
                <h2> Welcome to Sporte'e! <br> Your Sports Future is Here!</h2>
                <p>Sportee is more than just a platform; it's a community hub where the love for
                    sports meets efficient management. Whether you're a facility owner, manager,
                    or sports enthusiast, Sportee welcomes you to a world where sports facility
                    management is transformed. Get ready to elevate your sports experience – welcome home to Sportee!
                </p>
                <a href="/reservation" class="btn">Reserve Now</a>

            </div>
        </section>

        <!-- Trickshot About Section -->

        <section class="about" id="about">


            <div class="about-text">
                <span>About Us</span>
                <h2> Welcome To Trickshot!</h2>
                <p>Are you ready to elevate your badminton game to the next level? Look no further! At Trickshot Badminton
                    Center, we're not just about playing the game; we're about mastering it with style and finesse!
                </p>

                <div class="social">

                    <a href="https://www.facebook.com/profile.php?id=100083535664231"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.messenger.com/t/100122852701376"><i class='bx bxl-messenger'></i></a>
                    <a href="trickshotcourt@gmail.com"><i class='bx bxl-gmail'></i></a>
                    <a href="https://www.tiktok.com/@trickshotbadmintoncourt" class="fa-brands fa-tiktok"></a>
                </div>
            </div>

            <div class="about-img">
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
        <!------------------ Gallery Section ------------------->

        <section class="gallery-section" id="gallery">
            <div class="heading">
                <span> Court Side</span>
                <h2> Have a Sight!</h2>
            </div>

            <div class="wrapper">
                <div class="main-content">

                    <div class="box">
                        <img src=".././img/gallery/ts.jpg" alt="">
                        <div class="img-text">
                            <div class="content1">
                                <h2>Trickshot Badminton Court 1</h2>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <img src=".././img/gallery/ts2.jpg" alt="">
                        <div class="img-text">
                            <div class="content1">
                                <h2>Trickshot Badminton Court 2</h2>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <img src=".././img/gallery/ts1.jpg" alt="">
                        <div class="img-text">
                            <div class="content1">
                                <h2>Trickshot Badminton Court 3</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-container">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.6718820344604!2d120.28526340998046!3d14.843662171021215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339671ebbbbed6c9%3A0x26ae8d5731316ed!2sTrickshot%20Badminton%20Court!5e0!3m2!1sen!2sph!4v1710859583954!5m2!1sen!2sph"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </section>

        <!-- ------------ dev section ------------->
        <section class="menu" id="menu">
            <div class="heading">
                <span> DEVELOPERS</span>
                <h2> Network Knights</h2>
            </div>
            <div class="menu-container">
                <div class="profile-card">
                    <div class="card front-face">
                        <img src="/img/p2.png">
                    </div>
                    <div class="card back-face">
                        <img src="/img/1.png">
                        <div class="info">
                            <div class="title">
                                Bernadeth De Jesus
                            </div>
                            <p>
                                Hacker <br>Developer
                            </p>
                        </div>
                        <ul>
                            <a href="https://www.facebook.com/bernadeth.dejesus.1"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/bernapotato_"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/_bernadejesus/"><i class="fab fa-instagram"></i></a>

                        </ul>
                    </div>
                </div>


                <div class="profile-card">
                    <div class="card front-face">
                        <img src="/img/p1.png">
                    </div>
                    <div class="card back-face">
                        <img src="/img/2.png">
                        <div class="info">
                            <div class="title">
                                Jericho Falsario
                            </div>
                            <p>
                                Hustler <br>Developer
                            </p>
                        </div>
                        <ul>
                            <a href="https://www.facebook.com/Morningstar1126/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/flsri0"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/flsri0/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.instagram.com/flsri0/"><i class="fa-brands fa-linkedin-in"></i></a>
                        </ul>
                    </div>
                </div>


                <div class="profile-card">
                    <div class="card front-face">
                        <img src="/img/p3.png">
                    </div>
                    <div class="card back-face">
                        <img src="/img/3.png">
                        <div class="info">
                            <div class="title">
                                Anne Claire Racela
                            </div>
                            <p>
                                Hipster <br>Developer
                            </p>
                        </div>
                        <ul>
                            <a href="https://www.facebook.com/acracela"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/ac_eyce/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.instagram.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        </section>
        <!------------------- Contact Us ---------------->
        <section class="contact" id="contactus">


            <div class="contactform">

                <div class="section-header">
                    <h3 class="title">Feedback</h3>
                </div>



                <form method="post" action="{{ url('/feedback') }}">
                    @csrf
                    <label for="feedback_name">Name:</label>
                    <input type="text" name="feedback_name" required class="form-input" value="{{ $user->fname }}">

                    <label for="feedback_name">Last Name:</label>
                    <input type="text" name="feedback_name" required class="form-input" value="{{ $user->lname }}">

                    <label for="feedback_email">Email:</label>
                    <input type="email" name="feedback_email" required class="form-input" value="{{ $user->email }}">

                    <label for="feedback_feed">Feedback:</label>
                    <textarea name="feedback_feed" required class="form-input" rows="5"></textarea>

                    <button type="submit" class="btn">Submit Feedback</button>
                </form>

            </div>

        </section>

        <!----------- Footer Section  ------------>
        <section id="contact">
            <div class="footer">
                <div class="main">
                    <div class="col">
                        <h4>Menu Links</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Menu</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>



                    <div class="col">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Marketing</a></li>
                            <!-- Add more services as needed -->
                        </ul>
                    </div>



                    <div class="col">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms And Conditions</a></li>
                        </ul>
                    </div>


                    <div class="col">
                        <h4>Contact Us</h4>
                        <div class="social">

                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-messenger'></i></a>
                            <a href="#"><i class='bx bxl-gmail'></i></a>
                            <a href="#"><i class='bx bxl-telegram'></i></a>
                        </div>
                    </div>
                </div>
        </section>

        <!--JavaScript-->

        <script type="text/javascript" src="/script.js"></script>


    </body>
@endsection
