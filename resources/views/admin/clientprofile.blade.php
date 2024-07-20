@extends('layouts.adminnav')

@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="./../css/clientstyle.css">
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1></h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
            
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                        {{-- <th>  <span class="icon-arrow">&UpArrow;</span></th> --}}
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> Bernadeth De Jesus </td>
                        <td> dejesusbrndth@gmail.com </td>
                        <td> <strong> Pending</strong></td>
                        <td>  </td>
                        {{-- <td>
                            <p class="status delivered">Delivered</p>
                        </td> --}}
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script src="./../js/clientscript.js"></script>

</body>
  
@endsection