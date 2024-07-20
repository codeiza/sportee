

<div class="container">   

    <h1>Edit Form</h1>

    <form method="post" action="/admin/events/{{$event->id}}">
        @csrf
        @method('PATCH')

        <div class="input-group">
            <label for="title">Sports Courts:</label>
            <select id="title" name="title" required value="{{$event->title}}">
                <option value="" disabled selected>Select a Court</option>
                <option value="Court1">Court 1</option>
                <option value="Court2">Court 2</option>
                <option value="Court3">Court 3</option>
                <!-- Add more options for other services as needed -->
            </select>
        </div>

        <div class="input-group">
            <label for="name">First Name</label>
            <input type="text" name="fname" placeholder="Name" required value="{{$event->fname}}">
        </div>

        <div class="input-group">
            <label for="name">Last Name</label>
            <input type="text" name="lname" placeholder="Name" required value="{{$event->lname}}">
        </div>

        <div class="input-group">
            <label for="name">Contact</label>
            <input type="text" name="contact" placeholder="Contact Number" required value="{{$event->contact}}">
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email" required value="{{$event->email}}">
        </div>

        <div class="input-group">
            <label for="start">Date:</label>
            <input type="datetime-local" id="start" name="start" required value="{{$event->start}}">
        </div>
        
        <div class="input-group">
            <label for="end">End Time:</label>
            <input type="datetime-local" id="end" name="end" required value="{{$event->end}}">
        </div>


        <div style="text-align: right;">
            <button type="submit">Update Event</button>
        </div>
    </form>

</div>
    
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


    /* Genral Styles */

    *,
    *::before,
    *::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    html {
    scroll-behavior: smooth;
    }

    body,
    button,
    input,
    textarea {
    font-family: "Poppins", sans-serif;
    }

    body {
    min-height: 100vh;.
    background-image: url('../../img/bgg.png'); 
    background-size: cover;
    background-position: center;
    }
        h1{
            font-weight: bolder;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .container {
            width: 60%;
            margin: auto;
            padding: 40px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            background-color: var(--light-one);
        }


        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="datetime-local"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box; /* Ensure padding and border are included in the element's total width and height */
        }


        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 20%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

