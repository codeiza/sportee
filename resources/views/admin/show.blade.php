
@php
    $formattedStartDate = \Carbon\Carbon::parse($event->start)->format('Y-m-d');
    $formattedStartTime = \Carbon\Carbon::parse($event->start)->format('H:i');
     $formattedEndTime = \Carbon\Carbon::parse($event->end)->format('H:i');
@endphp


<body>


    <a href="/admin/event" class="button">Back</a>

   <div class="container">

            <div class="wrapper">

                <div class="left">
                    <P>Reservation ID:<strong>{{$event->id}}</strong></h3>
                    <h3>{{ $event->fname}} {{ $event->lname}}</h3>
                </div>
            
                <div class="right">
                    <div class="info">
                        <h3>Reservation Details</h3>
            
                        <div class="info_data">
                             <div class="data">
                                <h4>First name</h4>
                                <p>{{$event->fname}}</p>
                             </div>
                             <div class="data">
                               <h4>Last name</h4>
                               <p>{{$event->lname}}</p>
                            </div>
                            <div class="data">
                              <h4>Email</h4>
                               <p>{{$event->email}}</p>
                           </div>
                        </div>
            
                    </div>
                  
                  <div class="projects">
                        <div class="projects_data">
                             <div class="data">
                                <h4>Date</h4>
                                <p>Date: {{ $formattedStartDate }}</p>
                             </div>
                             <div class="data">
                               <h4>Time</h4>
                               <p>Time: {{ $formattedStartTime }}-{{ $formattedEndTime }}</p>
                            </div>

                        </div>
                    </div>
            
                    <div class="projects">
                      <div class="projects_data">
                            <div class="data">
                            </div>
                           {{-- <div class="data" style="text-align: right;">
                            <a href="/send/{{$event->id}}" class="btn">Notify Customer</a>
                           </div> --}}

                           <div class="data" style="text-align: right;">
                            <a href="/admin/events/{{ $event->id }}/edit" class="btn">Edit</a>
                           </div>
                           
                      </div>
                  </div>
                  
                </div>
            </div>
    </div> 

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

        body {
            min-height: 100vh;
            background-image: url('/img/bgg.png'); /* Note the leading slash */
            background-size: cover;
            background-position: center;
        }

        a{
            text-decoration: none;
        }
            

        .wrapper{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 60%;
        height: 50%;
        display: flex;
        box-shadow: 0 1px 20px 0 rgba(69,90,100,.10);
        }

        .wrapper .left{
        width: 20%;
        background: linear-gradient(to right,#6acaa8,rgb(194, 245, 194));
        padding: 30px 25px;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        text-align: center;
        color: #000;
        text-align: left;
        }

        .wrapper .left P{
            color: var(--dark-one);
            font-size: 25px;
            font-weight: 600;
        }

        .wrapper .left strong{
            color: var(--dark-one);
            font-size: 25px;
            font-weight: 600;
        }

        .wrapper .left H3{
            color:var(--dark-one);
            font-size: 20px;
            font-weight: 600;
        }

        h4{
            margin-bottom: 10px;
            font-weight: bold;
            color: #000;
        }

        


        p {
            font-size: 20px;
            font-weight: 400;
        }


        .wrapper .right{
        width: 85%;
        background: #eff3ef;
        padding: 30px 25px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        }

        .wrapper .right .info,
        .wrapper .right .projects{
        margin-bottom: 60px;
        }

        .wrapper .right .info h3,
        .wrapper .right .projects h3{
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e0e0e0;
            color: #000000;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-weight: bolder;
        }

        .wrapper .right .info_data,
        .wrapper .right .projects_data{
        display: flex;
        justify-content: space-between;
        }

        .wrapper .right .info_data .data,
        .wrapper .right .projects_data .data{
        width: 45%;
        }

        .wrapper .right .info_data .data h4,
        .wrapper .right .projects_data .data h4{
            color: #353c4e;
            margin-bottom: 5px;
        }   

        

         /*BUTTONS*/
        .button {
            display: inline-block;
            background-color: var(--main-color);
            color: var(--light-one);
            padding: .75rem 2.5rem;
            font-weight: var(--font-semi);
            border-radius: .5rem;
            transition: .3s;
            margin: 40px;
        }

        .button:hover {
            box-shadow: 0px 10px 36px rgba(0, 0, 0, 0.15);
            background-color: var(--dark-green);
        }


        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3CB371; /* Green background */
            color: #ffffff; /* White text */
            border: none;
            border-radius: 4px; /* Rounded corners */
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            transition-duration: 0.3s; /* Smooth transition for hover effect */
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2CA363; /* Slightly darker green on hover */
        }


    </style>
