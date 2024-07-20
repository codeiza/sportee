<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="./../css/adminstyle.css">

    <title>Sportee Admin </title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img class="brandimg" src="./../img/logosportee.png">
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

            <li>
                <a href="/admin/events/create">
                    <i class='bx bxs-calendar'></i>
                    <span class="text">Reservation</span>
                </a>
            </li>

            <li>
                <a href="admin/graph">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Graphs</span>
                </a>
            </li>

            <li>
                <a href="/feedback">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Feedback</span>
                </a>
            </li>


            <li class="active">
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
                <div class="left">
                    <h1>History</h1>
                </div>
            </div>


            <div class="table-data">
                <div class="order">
                    <div style="margin-bottom:30px; display: flex; align-items: center;">
                        <div>
                            <label for="userFullName" class="form-label fw-semibold"
                                style="margin-right: 10px;">Status</label>
                            <span class="small-label form-text text-muted">(Select a status to filter)</span>
                            <select class="form-control" name="title" id="title"
                                aria-label="Default select example"
                                style="padding: 8px; border: 1px solid #ccc; border-radius: 20px; margin-left: 10px;">
                                <option disabled selected>Select a Court</option>
                                <option value="Court-1">Court 1</option>
                                <option value="Court-2">Court 2</option>
                                <option value="Court-3">Court 3</option>
                            </select>
                        </div>
                        <div class="col-md-3" style="margin-left: 10px;">
                            <a href="/history">
                                Reset Table
                            </a>
                        </div>
                    </div>

                    <table class="content-table" id="events-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Event</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($doneEvent as $item)
                                <tr data-court="{{ $item->title }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->fname }}</td>
                                    <td>{{ $item->lname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->contact }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td><strong>{{ $item->status }}</strong>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <script>
                    document.getElementById('title').addEventListener('change', function() {
                        var selectedCourt = this.value;
                        var tableRows = document.querySelectorAll('#events-table tbody tr');

                        tableRows.forEach(function(row) {
                            var court = row.getAttribute('data-court');
                            if (court === selectedCourt || selectedCourt === "Select a Court") {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });
                    });
                </script>
                >
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="./../js/admin.js"></script>
</body>

</html>
