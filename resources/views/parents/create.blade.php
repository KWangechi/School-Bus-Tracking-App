<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create file</title>
    <!-- AIzaSyDWEsrVTTpn-yNuOdAnFJSXRAdq66CY7QE -->
</head>
<body>
    <form action="/parents/new" method="post">
        @csrf

        <label for="firstname">First name</label>
        <input type="text">

        <br>
        <br>

        <label for="lastname">Last name</label>
        <input type="text">

        <br>
        <br>

        <label for="phone_number">Phone number</label>
        <input type="number">

        <br>
        <br>

        <label for="home_address">Home Address</label>
        <input type="text" name="home_address" id="home_address">
        <input type="hidden" name="latitude" id="latitude"value="0">
        <input type="hidden" name="longitude" id="longitude" value="0">
        <br>
        <br>

        <label for="no_of_children">Number of Children</label>
        <input type="number">

        <br>
        <br>

<button type="submit" name="create">Create Parent</button>

    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWEsrVTTpn-yNuOdAnFJSXRAdq66CY7QE&libraries=places"
></script>
<script  type="text/javascript" src="{{asset('js/script.js')}}"></script> 
</body>


    
</html>