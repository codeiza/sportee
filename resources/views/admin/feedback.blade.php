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
                <a href="/admin/graph">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Graphs</span>
                </a>
            </li>


            <li class="active">
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
                    <h1>Feedback</h1>
                </div>
            </div>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Chart</h3>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Feed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feed as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->feed }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>





                </div>




                {{-- <div class="todo" style="height: 60vh;">
                    <div class="head">
                        <h3>Client File</h3>
                        <button type="button" onclick="clearFilter()" class="best-button">Clear</button>
                    </div>





                </div> --}}
            </div>




        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="./../js/admin.js"></script>


</body>

</html>
