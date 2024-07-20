<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body style=" background-image: url('/img/bghome.png');">

    <div class="container">
        <div class="row justify-content-center" style="margin-top:5%;">
            <div class="card col-12 shadow" style="border:none;">
                <div class="card-body">
                    <div>
                        <p class="card-title mb-3 fs-4 fw-semibold">Court Schedule <small class="fs-6 fw-lighter"
                                style="color: gray;">(Select a
                                court
                                to filter the
                                court schedule
                                data.)</small>
                        <p>
                    </div>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <select id="courtSelect" class="form-select" aria-label="Default select example"
                                style="cursor:pointer;">
                                <option selected>Courts</option>
                                <option value="Court-1">Court 1</option>
                                <option value="Court-2">Court 2</option>
                                <option value="Court-3">Court 3</option>
                            </select>
                            <small id="" class="form-text text-muted">Select a court to filter.</small>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <a class="icon-link icon-link-hover"href="{{ route('show.schedule') }}">
                                    View All Schedules
                                </a><br><span class="small-label form-text text-muted">(View all schedules)</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" style="max-height: 300px; overflow-y: auto;">
                        <table id="scheduleTable" class="table table-striped shadow-sm">
                            <thead>
                                <tr>
                                    <th style="background-color: #229954; color: white;" scope="col">Schedule #</th>
                                    <th style="background-color: #229954; color: white;" scope="col">Court #</th>
                                    <th style="background-color: #229954; color: white;" scope="col">Client Full Name
                                    </th>
                                    <th style="background-color: #229954; color: white;" scope="col">Contact</th>
                                    <th style="background-color: #229954; color: white;" scope="col">Email</th>
                                    <th style="background-color: #229954; color: white;" scope="col">Start of
                                        reservation</th>
                                    <th style="background-color: #229954; color: white;" scope="col">End of
                                        reservation</th>
                                    <th style="background-color: #229954; color: white;" scope="col">Rent Fee</th>
                                    <th style="background-color: #229954; color: white;" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr class="courtRow {{ $event->title }}">
                                        <th scope="row">{{ $event->id }}</th>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->fname }} {{ $event->lname }}</td>
                                        <td>{{ $event->contact }}</td>
                                        <td>{{ $event->email }}</td>
                                        <td>{{ $event->start_date }}</td>
                                        <td>{{ $event->end_date }}</td>
                                        <td>{{ $event->rent_fee }}</td>
                                        <td>{{ $event->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination links -->
                    <div class="d-flex justify-content-center">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($events->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $events->previousPageUrl() }}" rel="prev"
                                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($events->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $events->nextPageUrl() }}" rel="next"
                                        aria-label="@lang('pagination.next')">&rsaquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <a href="{{ route('home') }}" class="btn btn-secondary col-12 mb-2">Go back</a>
                        </div>
                        <div class="col-3">
                            <div>
                                <a href="{{ route('userReservation') }}" class="btn btn-success mb-2">Add another
                                    reservation</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        var courtSelect = document.getElementById("courtSelect");


        courtSelect.addEventListener("change", function() {
            var selectedCourt = this.value;

            // Redirect to the route with the selected court as a parameter
            window.location.href = "{{ route('court-schedules.index') }}" + (selectedCourt !== "Courts" ? "/" +
                selectedCourt : "");
        });


        var rows = document.querySelectorAll("#scheduleTable tbody tr");

        courtSelect.addEventListener("change", function() {
            var selectedCourt = this.value;

            rows.forEach(function(row) {
                var court = row.cells[1].textContent;

                if (selectedCourt === "Courts" || court === selectedCourt) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>

</body>

</html>
