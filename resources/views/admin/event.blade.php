<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sportee</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css"
        integrity="sha512-XcPoWhhzQ3zSKsuBQyysOwTcBiiyh2dVj0tLRL3nvUFIhC7H/98x8GFDpAvqIittlJhPFUCJ5DGTcd3U53IQdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"
        integrity="sha512-7IbO+IEofZ03ixCjeRlF6cSHn50WA1m2sfc8hW2lWK6YVjrvKu+pZ2hNBHYEVupZJTj4R2kh3QPVK1qF25Louw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>


    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    {{-- <link rel="stylesheet" href="./../css/adminstyle.css"> --}}




</head>


<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a style="text-decoration: none" href="#" class="brand">
            <img class="brandimg" src="./../img/logosportee.png">
            <span style="color: rgb(103, 103, 103)" class="text">Admin</span>
        </a>

        <ul class="side-menu top">

            <li>
                <a style="text-decoration: none" href="/admin/index">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li class="active">
                <a style="text-decoration: none" href="/getevent">
                    <i class='bx bxs-calendar'></i>
                    <span class="text">Calendar</span>
                </a>
            </li>

            <li>
                <a style="text-decoration: none" href="/admin/events/create">
                    <i class='bx bxs-calendar'></i>
                    <span class="text">Reservation</span>
                </a>
            </li>

            <li>
                <a style="text-decoration: none" href="/admin/graph">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Graphs</span>
                </a>
            </li>

            <li>
                <a style="text-decoration: none" href="#">
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

            <div class="table-data">
                <div class="order">

                    <div class="button-container">

                        <a href="/admin/events/create" class="btn">Make Reservation</a>
                    </div>

                    <div class="panel panel-primary mt-3">
                        <div class="panelheading"></div>
                        <div class="panel-body">
                            <div id='calendar'></div>
                        </div>
                    </div>



                </div>

            </div>




        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->




    {{-- start for reflecting data to full calendar --}}
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: {!! json_encode($events) !!},
                dayClick: function(date, jsEvent, view) {
                    var selectedDate = moment(date).format('YYYY-MM-DD');
                    var filteredEvents = {!! json_encode($events) !!}.filter(function(event) {
                        return event.start.includes(selectedDate) || event.end.includes(
                            selectedDate);
                    });
                    if (filteredEvents.length > 0) {
                        var eventDetails = filteredEvents.map(function(event) {
                            return 'Title: ' + event.title + '\n' +
                                'Start: ' + moment(event.start).format('YYYY-MM-DD HH:mm:ss') +
                                '\n' +
                                'End: ' + moment(event.end).format('YYYY-MM-DD HH:mm:ss');
                        }).join('\n\n');
                        alert('Events on ' + selectedDate + ':\n\n' + eventDetails);
                    } else {
                        alert('No events on ' + selectedDate);
                    }
                }
            });
        });
    </script>
    {{-- end for reflecting data to full calendar --}}

</body>

</html>



<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    :root {
        --poppins: 'Poppins', sans-serif;
        --lato: 'Lato', sans-serif;

        --light: #F9F9F9;
        --main-color: #3CB371;
        --light-blue: #CFE8FF;
        --grey: #eee;
        --dark-grey: #AAAAAA;
        --dark: #342E37;
        --red: #DB504A;
        --yellow: #FFCE26;
        --light-yellow: #FFF2C6;
        --orange: #FD7238;
        --light-orange: #FFE0D3;

        --primary-color: #0E4BF1;
        --panel-color: #FFF;
        --text-color: #000;
        --black-light-color: #707070;
        --border-color: #e6e5e5;
        --toggle-color: #DDD;
        --box1-color: #7cb8f8;
        --box2-color: #FFE6AC;
        --box3-color: #E7D1FC;
        --box4-color: #8df0c2;
        --title-icon-color: #fff;
    }

    html {
        overflow-x: hidden;
    }

    body.dark {
        --light: #0C0C1E;
        --grey: #060714;
        --dark: #FBFBFB;
    }

    body {
        background: var(--grey);
        overflow-x: hidden;
    }




    /* SIDEBAR */
    #sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 280px;
        height: 100%;
        background: var(--light);
        z-index: 2000;
        font-family: var(--poppins);
        transition: .3s ease;
        overflow-x: hidden;
        scrollbar-width: none;
    }

    #sidebar::--webkit-scrollbar {
        display: none;
    }

    #sidebar.hide {
        width: 60px;
    }

    #sidebar .brand {
        font-size: 24px;
        font-weight: 700;
        height: 56px;
        display: flex;
        align-items: center;
        color: var(--main-color);
        position: sticky;
        top: 0;
        left: 0;
        background: var(--light);
        z-index: 500;
        padding-bottom: 20px;
        box-sizing: content-box;
    }

    #sidebar .brand .bx {
        min-width: 50px;
        display: flex;
        justify-content: center;
    }

    #sidebar .brandimg {
        width: 70px;
        height: 50px;
        border-radius: 100%;
        margin: auto 5px;
    }

    .brandimg {
        width: 60px;
        height: 70px;
    }

    #sidebar .side-menu {
        width: 100%;
        margin-top: 48px;
    }

    #sidebar .side-menu li {
        height: 48px;
        background: transparent;
        margin-left: 6px;
        border-radius: 48px 0 0 48px;
        padding: 4px;
    }

    #sidebar .side-menu li.active {
        background: var(--grey);
        position: relative;
    }

    #sidebar .side-menu li.active::before {
        content: '';
        position: absolute;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        top: -40px;
        right: 0;
        box-shadow: 20px 20px 0 var(--grey);
        z-index: -1;
    }

    #sidebar .side-menu li.active::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        bottom: -40px;
        right: 0;
        box-shadow: 20px -20px 0 var(--grey);
        z-index: -1;
    }

    #sidebar .side-menu li a {
        width: 100%;
        height: 100%;
        background: var(--light);
        display: flex;
        align-items: center;
        border-radius: 48px;
        font-size: 16px;
        color: var(--dark);
        white-space: nowrap;
        overflow-x: hidden;
    }

    #sidebar .side-menu.top li.active a {
        color: var(--main-color);
    }

    #sidebar.hide .side-menu li a {
        width: calc(48px - (4px * 2));
        transition: width .3s ease;
    }

    #sidebar .side-menu li a.logout {
        color: var(--red);
    }

    #sidebar .side-menu.top li a:hover {
        color: var(--main-color);
    }

    #sidebar .side-menu li a .bx {
        min-width: calc(60px - ((4px + 6px) * 2));
        display: flex;
        justify-content: center;
    }

    /* SIDEBAR */





    /* CONTENT */
    #content {
        position: relative;
        width: calc(100% - 280px);
        left: 280px;
        transition: .3s ease;
    }

    #sidebar.hide~#content {
        width: calc(100% - 60px);
        left: 60px;
    }


    /* NAVBAR */
    #content nav {
        height: 56px;
        background: var(--light);
        padding: 0 24px;
        display: flex;
        align-items: center;
        grid-gap: 24px;
        font-family: var(--poppins);
        position: sticky;
        top: 0;
        left: 0;
        z-index: 1000;
    }

    #content nav::before {
        content: '';
        position: absolute;
        width: 40px;
        height: 40px;
        bottom: -40px;
        left: 0;
        border-radius: 50%;
        box-shadow: -20px -20px 0 var(--light);
    }

    #content nav a {
        color: var(--dark);
    }

    #content nav .bx.bx-menu {
        cursor: pointer;
        color: var(--dark);
    }


    #content nav form {
        max-width: 400px;
        width: 100%;
        margin-right: auto;
    }

    #content nav form .form-input {
        display: flex;
        align-items: center;
        height: 36px;
    }

    #content nav form .form-input input {
        flex-grow: 1;
        padding: 0 16px;
        height: 100%;
        border: none;
        background: var(--grey);
        border-radius: 36px 0 0 36px;
        outline: none;
        width: 100%;
        color: var(--dark);
    }

    #content nav form .form-input button {
        width: 36px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: var(--main-color);
        color: var(--light);
        font-size: 18px;
        border: none;
        outline: none;
        border-radius: 0 36px 36px 0;
        cursor: pointer;
    }



    /* NAVBAR */




    /* MAIN */
    #content main {
        width: 100%;
        padding: 36px 24px;
        font-family: var(--poppins);
        max-height: calc(100vh - 56px);
        overflow-y: auto;
    }

    #content main .head-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        grid-gap: 16px;
        flex-wrap: wrap;
    }

    #content main .head-title .left h1 {
        font-size: 36px;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--dark);
    }



    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: var(--main-color);
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin-left: 10px;
        margin-bottom: 9px;
    }



    .panelheading {
        background-color: #3CB371;
        color: #3CB371;
        height: 8vh;
        border-color: #3CB371;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
    }

    #calendar {
        border: none;
    }

    #calendar .fc-event {
        color: #f5fbff;
        text-align: center;
        border-radius: 2px;
        padding: 3px;
        font-size: 12px;
        cursor: pointer;
    }

    .fc-event {
        background-color: var(--main-color) !important;
        color: #f5fbff !important;
        border: none;
        /* Other styles */
    }



    .fc-day-grid-event {
        margin: 2px;
    }

    .fc-time,
    .fc-title {
        display: block;
    }
</style>
