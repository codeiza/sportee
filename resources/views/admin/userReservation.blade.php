<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

    <div class="container">     
        @if($errors->has('start'))
                <div class="alert alert-danger">
                    {{$errors->first('start')}}
                </div> 
        @endif  
        
        <header class="headertitle">Reservation Form</header>
    
        <form method="post" action="{{ route('user.store') }}">
            @csrf

                <div class="column">
                    <div class="input-box">
                        <label>First name</label>
                        <input type="text" name="fname" placeholder="First name" required value="{{$user->fname}}">
                    </div>
                    <div class="input-box">
                        <label>Last name</label>
                        <input type="text" name="lname" placeholder="Last Name" required  value="{{$user->lname}}">
                    </div>
                </div>

                <div class="column">
                    <div class="input-box">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Email" required  value="{{$user->email}}">
                    </div>
                    <div class="input-box">
                        <label>Contact Number</label>
                        <input type="text" name="contact" placeholder="Contact" required  value="{{$user->contact}}">
                    </div>
                </div>


            <div class="">
                <label for="service">Sports Courts:</label>
                    <select class="form-control" id="title" name="title" required  value="{{ old('title') }}">
                        <option value="" disabled selected>Select a Court</option>
                        <option value="Court1">Court 1</option>
                        <option value="Court2">Court 2</option>
                        <option value="Court3 ">Court 3</option>
                    </select>
            </div>
                
            <div class="">
                <label for="start">Date:</label>
                <div class="datetime-input-container">
                    <input type="datetime-local" class="hidden" id="start" name="start" required>
                    <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Date" required>
                    <p>Start Time:</p>
                    <select class="form-control" id="startTime" name="startTime" required>
                        <!-- Options for operating hours from 9 am to 5 pm -->
                        <option value="07:00">7:00 AM</option>
                        <option value="08:00">8:00 AM</option>
                        <option value="09:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                        <option value="17:00">5:00 PM</option>
                        <option value="18:00">6:00 PM</option>
                        <option value="19:00">7:00 PM</option>
                        <option value="20:00">8:00 PM</option>
                        <option value="21:00">9:00 PM</option>
                        <option value="22:00">10:00 PM</option>
                        <option value="23:00">11:00 PM</option>
                    </select>
                </div>
            </div>
            
            <div class="">
                <label for="end">End Time:</label>
                <div class="datetime-input-container">
                    <input type="datetime-local" class="hidden" id="end" name="end" >
                    <input type="date" class="form-control" id="endDate" name="endDate" placeholder="Date" hidden>
                    <select class="" id="endTime" name="endTime" required>
                        <!-- Options for operating hours from 9 am to 5 pm -->
                        <option value="07:00">7:00 AM</option>
                        <option value="08:00">8:00 AM</option>
                        <option value="09:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                        <option value="17:00">5:00 PM</option>
                        <option value="18:00">6:00 PM</option>
                        <option value="19:00">7:00 PM</option>
                        <option value="20:00">8:00 PM</option>
                        <option value="21:00">9:00 PM</option>
                        <option value="22:00">10:00 PM</option>
                        <option value="23:00">11:00 PM</option>

                    </select>
                </div>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
    
    
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
        document.getElementById('startDate').addEventListener('input', function () {
            updateDatetimeLocal('startDate', 'startTime', 'start');
        });
    
        document.getElementById('startTime').addEventListener('input', function () {
            updateDatetimeLocal('startDate', 'startTime', 'start');
        });
    
        document.getElementById('endDate').addEventListener('input', function () {
            updateDatetimeLocal('endDate', 'endTime', 'end');
        });
    
        document.getElementById('endTime').addEventListener('input', function () {
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

        // Check if the success message is present in the session
        var successMessage = {!! json_encode(session('success')) !!};
        
        // If there is a success message, display it using SweetAlert
        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage,
            });
        }
    
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
        margin-top: 50px;
        margin-bottom: 50px;
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
        flex-wrap: wrap; /* Allows items to wrap onto the next line if there's not enough space */
    }

    .input-box {
        margin-bottom: 20px; /* Increased margin for more vertical spacing between input boxes */
        width: 48%; /* Set to slightly less than 50% to provide some space between input fields */
    }

    input[type="text"],
    select,
    input[type="datetime-local"],
    input[type="date"] {
        width: 100%;
        padding: 12px; /* Increased padding for more space inside the input fields */
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: var(--dark-green);
    }



    

</style>

    
