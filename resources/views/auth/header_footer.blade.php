<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZoroKart Home Page</title>
  <script src="https://kit.fontawesome.com/29d1847fa7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<style>

 /* Custom CSS for Auth Pages */
.auth-container {
    background-color: #ffffff; /* White background */
}

.auth-image {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.auth-form {
    border: 1px solid #e0e0e0;
    background-color: #ffffff;
}

.auth-input {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 12px;
    font-size: 16px;
}

.auth-input:focus {
    border-color: #ff5b00;
    box-shadow: 0 0 5px rgba(255, 91, 0, 0.5);
}

.auth-btn {
    background-color: #ff5b00;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    padding: 12px;
    font-size: 18px;
}

.auth-btn:hover {
    background-color: #e64a19; /* Darker shade for hover */
}

.auth-social-btn {
    background-color: #ff5b00;
    border: none;
    color: white;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-social-btn:hover {
    background-color: #e64a19; /* Darker shade for hover */
}

.auth-link {
    color: #ff5b00;
    text-decoration: none;
}

.auth-link:hover {
    color: #e64a19; /* Darker shade for hover */
}

.auth-checkbox {
    accent-color: #ff5b00; /* Custom checkbox color */
}

.divider {
    color: #000000; /* Black color for divider text */
}

   
</style>



<script src="{{asset('zerokart/home/script.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>