<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reservation</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
</head>

<body style=" background-image: url('/img/bghome.png');">
    <div class="container shadow p-3 mb-5 bg-white rounded mt-5">
        <!-- Header Row -->
        <div class="row" style="margin-left:7px;">
            <div class="col">
                <h3>Make a Reseravation</h3>
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
        <div class="row">
            <!-- Main Content Row -->
            <div class="col-sm-6" style=" margin-left: 20px; margin-right: -20px;">
                <form method="post" action="{{ route('user.store') }}">
                    @csrf
                    {{-- hidden input fields --}}
                    <input hidden type="text" class="form-control" id="user_id" name="user_id"
                        placeholder="{{ $user->id }}" value="{{ $user->id }}">

                    <input hidden type="text" class="form-control" id="fname" name="fname"
                        placeholder="{{ $user->fname }}" value="{{ $user->fname }}">

                    <input hidden type="text" class="form-control" id="lname" name="lname"
                        placeholder="{{ $user->lname }}" value="{{ $user->lname }}">
                    {{-- end of hidden input fields --}}
                    <div class="mb-3">
                        <label for="userFullName" class="form-label fw-semibold">Fullname</label>
                        <input type="text" class="form-control" id="userFullName"
                            placeholder="{{ $user->fname }} {{ $user->lname }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="userEmail" class="form-label fw-semibold">Email</label>
                            <input type="text" class="form-control" name="userEmail" id="userEmail"
                                placeholder="{{ $user->email }}" value="{{ $user->email }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userContact" class="form-label fw-semibold">Contact</label>
                            <input type="text" class="form-control" name="userContact" id="userContact"
                                placeholder="{{ $user->contact }}" value="{{ $user->contact }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="userFullName" class="form-label fw-semibold">Court</label> <span
                            class="small-label form-text text-muted">(Select a court to reserve)</span>
                        <select class="form-select" name="title" id="title" aria-label="Default select example">
                            <option disabled selected>Select a Court</option>
                            <option value="Court-1">Court 1</option>
                            <option value="Court-2">Court 2</option>
                            <option value="Court-3">Court 3</option>
                        </select>
                        @if ($errors->has('unique'))
                            <span class="text-danger">{{ $errors->first('unique') }}</span>
                        @endif
                    </div>

                    {{-- for date picking and time picking --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label fw-semibold">Start Date</label>
                            <span class="small-label form-text text-muted">(Select date/time to reserve)</span>
                            <input type="datetime-local" id="startDateID" class="form-control" name="startDate"
                                value="">
                            @if ($errors->has('unique'))
                                <span class="text-danger">{{ $errors->first('unique') }}</span>
                            @endif

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label fw-semibold">End Date</label>
                            <span class="small-label form-text text-muted">(Select date/time to reserve)</span>
                            <input type="datetime-local" id="endDateID" class="form-control" name="endDate"
                                value="">
                            @if ($errors->has('unique'))
                                <span class="text-danger">{{ $errors->first('unique') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- end for date picking and time picking --}}
                    <div class="mb-4">
                        <label for="rentFee" class="form-label fw-semibold">Rent Fee</label>
                        <span class="small-label form-text text-muted">(php per hour)</span>
                        <input type="text" class="form-control" id="rentFeeID" name="rentFee" placeholder="">
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <a href="{{ route('home') }}" class="btn btn-secondary col-12 mb-2">Go back</a>
                        </div>

                        <div class="col-md">
                            <button type="submit" class="btn btn-success col-12">Add reservation</button>
                        </div>

                        <div class="col-md-3">
                            <a class="icon-link icon-link-hover" href="{{ route('show.schedule') }}">
                                View All Schedules
                            </a><span class="small-label form-text text-muted">(View all schedules)</span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Calendar Column -->
            <div class="col-sm-6 mb-5" style="max-width: 550px; margin: 0 auto;">
                <div id="calendar"></div>
            </div>
        </div>

        {{-- start of scripts --}}

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
</body>

</html>
