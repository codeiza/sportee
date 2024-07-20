

<head>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" integrity="sha512-XcPoWhhzQ3zSKsuBQyysOwTcBiiyh2dVj0tLRL3nvUFIhC7H/98x8GFDpAvqIittlJhPFUCJ5DGTcd3U53IQdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js" integrity="sha512-7IbO+IEofZ03ixCjeRlF6cSHn50WA1m2sfc8hW2lWK6YVjrvKu+pZ2hNBHYEVupZJTj4R2kh3QPVK1qF25Louw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</head>


<div class="container">

    <div>
        <a href="/reservation" class="btn">Request Appointment</a>
    </div> 

  

        @if ($errors->has('start'))
            <div class="alert alert-danger">
                {{ $errors->first('start') }}
            </div>
        @endif

        {{-- THIS IS FOR CALENDAR --}}
        <div class="panelbody">
            <div id='calendar' style='height: 400px;'></div>
            
        </div>
        {{-- END OF CALENDAR --}}




</div>


    <script>
        // Function to initialize FullCalendar
        function initializeCalendar(options) {
            var calendar = $('#calendar').fullCalendar(options);
        }

        // Customize the options as needed
        var clientCalendarOptions = {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },

            navLinks: true,
            editable: false,
            events: "getevent",
            displayEventTime: false,
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }

                element.addClass('fc-event'); // Add a custom class to the event element

                // Check if event.start and event.end are valid before formatting
                var dateHtml = '';
                if (event.start && event.end) {
                    // Update the HTML content of the event title with separate date and time
                    // + event.start.format('MMMM D, YYYY')
                    dateHtml = '<span class="fc-date">' + '</span><br>' +
                        '<span class="fc-time">' + event.start.format('h:mm A') + ' - ' + event.end
                        .format('h:mm A') + '</span>';
                }

                // Define formattedContent outside the if statement
                var formattedContent = '<strong>' + event.title + '<br>' + dateHtml;

                // Update the HTML content of the event title
                element.find('.fc-title').html(formattedContent);
            },
            // eventClick: function(calEvent, jsEvent, view) {
            //     // Redirect to the details view, replace 'appointment-details' with your actual route
            //     window.location.href = '/admin/events/' + calEvent.id;
            // }
        };



        // Call the function with the options for the client side
        $(document).ready(function() {
            initializeCalendar(clientCalendarOptions);
        });
    </script>
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
}

        .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #3CB371;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin-left: 10px;
        margin-bottom: 9px;
        margin-top: 20px;
    }



    .panelbody {
        background-color: #3CB371;
        color: #3CB371;
        height: 6vh;
        border-color: #3CB371;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
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

    .fc-time, .fc-title {
        display: block;
    }
    
    </style>


