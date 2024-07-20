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

            <li class="active">
                <a href="/admin/graph">
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

            <form action="{{ route('admin.searchUsers') }}" method="GET" class="form-inline">
                <div class="form-input">
                    <input type="search" placeholder="Search..." name="search" value="{{ $searchKeyword ?? '' }}">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>


        </nav>
        <!-- NAVBAR -->


        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Chart</h1>
                </div>
            </div>


            <div class="table-data">
                <div class="order">

                    <div id="piechart" style=" 700px; height: 600px;"></div>

                </div>




                <div class="todo" style="height: 60vh;">
                    <div class="head">
                        <h3>Client File</h3>
                        <button type="button" onclick="clearFilter()" class="best-button">Clear</button>
                    </div>




                    @if (isset($searchKeyword))
                        <div class="btn-position">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="list-group">
                                        @forelse ($users as $user)
                                            <a href="{{ route('admin.viewUserProfile', ['userId' => $user->id]) }}"
                                                class="list-group-item list-group-item-action">
                                                <div>
                                                    <p class="record"><strong>ID:</strong> {{ $user->id }}</p>
                                                    <p class="record"><strong>Name:</strong> {{ $user->fname }}</p>
                                                    <p class="record"><strong>Email:</strong> {{ $user->email }}</p>
                                                    <p class="record"><strong>Contact:</strong> {{ $user->contact }}
                                                    </p>

                                                </div>
                                            </a>
                                        @empty
                                            <p>No users found.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
            </div>




        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="./../js/admin.js"></script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $chartData; ?>
            ]);

            var options = {
                title: 'Status Chart',
                backgroundColor: '#F9F9F9',
                pieSliceBorderColor: '#F9F9F9',
                titleTextStyle: {
                    color: '#333', // Title text color
                    fontSize: 18,
                    bold: true,
                },
                legend: {
                    textStyle: {
                        color: '#555', // Legend text color
                        fontSize: 12,
                    }
                },
                pieHole: 0.3, // Add a pie hole for a donut chart effect
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</body>

</html>
