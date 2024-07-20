<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/adminstyle.css">

    <title>Sportee Admin </title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img class="brandimg" src="../../img/logosportee.png">
            <span style="color: rgb(103, 103, 103)" class="text">Admin</span>
        </a>

        <ul class="side-menu top">

            <li>
                <a href="/admin/index">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/getevent">
                    <i class='bx bxs-calendar'></i>
                    <span class="text">Calendar</span>
                </a>
            </li>

            <li class="active">
                <a href="/admin/events/create">
                    <i class='bx bxs-calendar'></i>
                    <span class="text">Reservation</span>
                </a>
            </li>

            <li>
                <a href="/admin/graph">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Graphs</span>
                </a>
            </li>


            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Feedback</span>
                </a>
            </li>

            <li>
                <a href="/history">
                    <i class='bx bx-file'></i>
                    <span class="text">History</span>
                </a>
            </li>

            <li>
                <a href="/admin/userlist">
                    <i class='bx bx-file'></i>
                    <span class="text">User</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">

            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a style="text-decoration: none" href="{{ route('logout') }}" class="logout"
                    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i class="bx bxs-log-out-circle"></i>
                    <span class="nav-items">Logout</span>
                </a>

            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->

    <section id="content">
        <!-- NAVBAR -->

        <nav>
            <i class='bx bx-menu'></i>

            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>


        </nav>
        <!-- NAVBAR -->


        <!-- MAIN -->
        <main>
            <div class="head-title">
                <style>
                    .alert.alert-success {
                        background-color: #d4edda;
                        border-color: #c3e6cb;
                        color: #155724;
                        padding: 0.75rem 1.25rem;
                        margin-bottom: 1rem;
                        border: 1px solid transparent;
                        border-radius: 0.25rem;
                        width: 1100px;
                    }

                    .alert.alert-danger {
                        background-color: #f8d7da;
                        border-color: #f5c6cb;
                        color: #721c24;
                        padding: 0.75rem 1.25rem;
                        margin-bottom: 1rem;
                        border: 1px solid transparent;
                        border-radius: 0.25rem;
                        width: 1100px;

                    }

                    .text-danger {
                        color: red;
                    }
                </style>
                <div class="left">
                    <h1>Reservation</h1>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->has('unique'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('unique') }}
                        </div>
                    @endif
                    @if ($errors->has('generic'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('generic') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                    <form method="post" action="{{ route('admin.store') }}">
                        @csrf
                        <div class="column">
                            <div class="input-box">
                                <label>First name</label>
                                <input type="text" name="fname" placeholder="First name" required
                                    value="{{ old('fname') }}">
                            </div>
                            <div class="input-box">
                                <label>Last name</label>
                                <input type="text" name="lname" placeholder="Last Name" required
                                    value="{{ old('lname') }}">
                            </div>
                        </div>

                        <div class="column">
                            <div class="input-box">
                                <label>Email</label>
                                <input type="text" name="userEmail" placeholder="Email" required
                                    value="{{ old('email') }}">
                            </div>
                            <div class="input-box">
                                <label>Contact Number</label>
                                <input type="text" name="userContact" placeholder="Contact" required
                                    value="{{ old('contact') }}">
                            </div>
                        </div>

                        <div class="" style="margin-bottom:20px;">
                            <label for="service">Sports Courts:</label>
                            <select class="form-control" id="title" name="title" required>
                                <option value="" disabled selected>Select a Court</option>
                                <option value="Court-1">Court 1</option>
                                <option value="Court-2">Court 2</option>
                                <option value="Court-3 ">Court 3</option>
                            </select>
                            @if ($errors->has('unique'))
                                <span class="text-danger">{{ $errors->first('unique') }}</span>
                            @endif
                        </div>

                        {{-- for date picking and time picking --}}
                        <div class="column">
                            <div class="input-box" style="margin-bottom">
                                <label for="startDate" class="form-label fw-semibold">Start Date</label>
                                <span class="small-label form-text text-muted">(Select date/time to reserve)</span>
                                <input type="datetime-local" id="startDateID" class="form-control" name="startDate"
                                    value="">
                                @if ($errors->has('unique'))
                                    <span class="text-danger"
                                        style="color:red;">{{ $errors->first('unique') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <label for="endDate" class="form-label fw-semibold">End Date</label>
                                <span class="small-label form-text text-muted">(Select date/time to reserve)</span>
                                <input type="datetime-local" id="endDateID" class="form-control" name="endDate"
                                    value="">
                                @if ($errors->has('unique'))
                                    <span class="text-danger">{{ $errors->first('unique') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="rentFee" class="form-label fw-semibold">Rent Fee</label>
                            <span class="small-label form-text text-muted">(php per hour)</span>
                            <input type="text" class="form-control" id="rentFeeID" name="rentFee"
                                placeholder="">
                        </div>
                        {{-- end for date picking and time picking --}}


                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </form>

                </div>

            </div>

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    {{-- script for php rent value to display in rent_fee --}}
    <script>
        const startDateInput = document.getElementById('startDateID');
        const endDateInput = document.getElementById('endDateID');
        const rentFeeInput = document.getElementById('rentFeeID');

        function calculatePrice() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            // Check if the end time is before the start time
            if (endDate < startDate) {
                rentFeeInput.value = "Invalid rent time";
                return;
            }

            // Check if both times are in the same half of the day (AM or PM)
            if (startDate.getHours() < 12 && endDate.getHours() >= 12 || startDate.getHours() >= 12 && endDate.getHours() <
                12) {
                rentFeeInput.value = "Invalid rent time";
                return;
            }

            const hourDifference = Math.abs(endDate - startDate) / 36e5; // 1 hour = 36e5 milliseconds

            const price = hourDifference * 70; // Assuming the price per hour is 70 PHP

            return price.toFixed(2); // Round to 2 decimal places
        }

        function updateRentFee() {
            const price = calculatePrice();
            if (price !== undefined) {
                rentFeeInput.value = price;
            }
        }

        startDateInput.addEventListener('change', updateRentFee);
        endDateInput.addEventListener('change', updateRentFee);
    </script>

    {{-- end of scripts --}}

    <script src="./../js/admin.js"></script>
    <script>
        function updateDatetimeLocal(dateId, timeId, datetimeId) {
            const dateInput = document.getElementById(dateId).value;
            const timeInput = document.getElementById(timeId).value;

            // Combine date and time values
            const datetimeValue = dateInput + 'T' + timeInput;

            // Set the value of the hidden datetime-local input
            document.getElementById(datetimeId).value = datetimeValue;


        }

        // Update datetime-local input when date or time inputs change
        document.getElementById('startDate').addEventListener('input', function() {
            updateDatetimeLocal('startDate', 'startTime', 'start');
        });

        document.getElementById('startTime').addEventListener('input', function() {
            updateDatetimeLocal('startDate', 'startTime', 'start');
        });

        document.getElementById('endDate').addEventListener('input', function() {
            updateDatetimeLocal('endDate', 'endTime', 'end');
        });

        document.getElementById('endTime').addEventListener('input', function() {
            updateDatetimeLocal('endDate', 'endTime', 'end');
        });

        $(document).ready(function() {
            // Function to update end time options based on the selected start time
            function updateEndTimeOptions(startHour) {
                $('#endTime option').prop('disabled', false); // Enable all options first

                // Disable options that are not within 1-2 hours from the selected start time
                $('#endTime option').each(function() {
                    var endHour = parseInt($(this).val().split(':')[0]);
                    if (endHour < startHour + 1 || endHour > startHour + 2) {
                        $(this).prop('disabled', true);
                    }
                });
            }

            // Event handler for changes in the start time dropdown
            $('#startTime').change(function() {
                var startHour = parseInt($(this).val().split(':')[0]);
                updateEndTimeOptions(startHour);
            });

            $(document).ready(function() {
                // Set min attribute for startDate to disable past dates
                $('#startDate').attr('min', getTodayDate());

                // Set event listener for startDate changes
                $('#startDate').change(function() {
                    // Set endDate value to match startDate value
                    $('#endDate').val($('#startDate').val());
                });

                // Set min attribute for endDate to disable past dates
                $('#endDate').attr('min', getTodayDate());

                // Function to get today's date in the required format (YYYY-MM-DD)
                function getTodayDate() {
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                    var yyyy = today.getFullYear();
                    return yyyy + '-' + mm + '-' + dd;
                }
            });
        });
    </script>

</body>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

    :root {
        --dark-one: #333;
        --dark-two: #7a7a7a;
        --main-color: #3CB371;
        --light-one: #fff;
        --light-two: #f9fafb;
        --light-three: #f6f7fb;
        --dark-green: #306754;
        --dark-red: #fa2424;
        --light-bg: #C9FAC6;
    }

    /* Genral Styles */

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .datetime-input-container {
        /* display: flex; */
        align-items: center;
    }

    .datetime-input-container .hidden {
        display: none;
    }

    .datetime-input-container input {
        margin-right: 10px;
    }

    .container {
        width: 60%;
        margin: auto;
        padding: 40px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        background-color: var(--light-one);
        margin-top: 40px;
        margin-bottom: 40px;
    }

    header {
        font-size: 24px;
        margin-bottom: 20px;
        font-weight: 600;
        text-align: center;
    }

    .column {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        /* Allows items to wrap onto the next line if there's not enough space */
    }

    .input-box {
        margin-bottom: 20px;
        /* Increased margin for more vertical spacing between input boxes */
        width: 48%;
        /* Set to slightly less than 50% to provide some space between input fields */
    }

    input[type="text"],
    select,
    input[type="datetime-local"],
    input[type="date"] {
        width: 100%;
        padding: 12px;
        /* Increased padding for more space inside the input fields */
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        background-color: #3CB371;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>



</html>
