<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacation Budget Calculator</title>
    <style>

        body { 
            font-family: Arial, sans-serif;
            background-color: rgb(255, 254, 254); 
        }

        h1 {
            text-align: center;
            color:rgb(0, 0, 0);
        }

        .card {
            border: 1px solid rgb(54, 14, 59);
            background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
            padding: 10px;
            margin: 10px;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 200px;
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 10px; /** rounded corner**/
            
        }

    </style>
</head>
<body> 

<div style="text-align: center">
    <div class="card">
<h1>Vacation Budget Calculator</h1> 
<form method="post" action="">
    <label for="name">Traveller Name:</label> 
    <input type="text" id="name" name="name" required><br><br>

    <div class="destinasi">
    <label for="destination">Destination:</label>
    <select name="destination" id="destination">
        <option value="">-- Select --</option>
        <option value="london">London</option>
        <option value="korea">Korea</option>
        <option value="germany">Germany</option>
        <option value="italy">Italy</option>
        <option value="argentina">Argentina</option>
        <option value="australia">Australia</option>
        <option value="austria">Austria</option>
        <option value="brazil">Brazil</option>
        <option value="brunei">Brunei</option>
        <option value="cambodia">Cambodia</option>
    </select><br><br>
    </div>

    <label for="notraveller">No traveller:</label>
    <input type="number" id="notraveller" name="notraveller" required><br><br>

    <label for="nodays">Numbers Of Days:</label>
    <input type="number" id="nodays" name="nodays" required><br><br>

    <label for="accdays">Accommodation Type:</label>
    <select name="accdays" id="accdays">
        <option value="">-- Select --</option>
        <option value="budget">Budget</option>
        <option value="standard">Standard</option>
        <option value="luxury">Luxury</option>
    </select><br><br>
    
    <div style="text-align: center">
    <input type="submit" value="Calculate Budget">
    </div>
</div>   


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $destination = $_POST['destination'];
        $notraveller = $_POST['notraveller'];
        $nodays = $_POST['nodays'];
        $accdays = $_POST['accdays'];

        $flightFares = [
            "london" => 500,
            "korea" => 500,
            "germany" => 500,
            "italy" => 500,
            "argentina" => 500,
            "asutralia" => 500,
            "austria" => 500,
            "brazil" => 500,
            "brunei" => 500,
            "cambodia" => 400
        ];

        $dailyExpense = 50;
        $accommodationCosts = [
            "budget" => 50,
            "standard" => 100,
            "luxury" => 200
        ];

        $flightCost = $flightFares[$destination] * $notraveller;
    $dailyExpenses = $dailyExpense * $nodays * $notraveller;
    $accommodationCost = $accommodationCosts[$accdays] * $nodays * $notraveller;

    $totalCost = $flightCost + $dailyExpenses + $accommodationCost;

    if ($notraveller > 5) {
        $totalCost *= 0.9; // Apply 10% discount
    }

    echo "<h2>Estimated Vacation Budget</h2>"; // Output the results
    echo "<table border='1' style='margin-left:auto; margin-right:auto'>"; 
    echo "<tr><th>Traveller Name</th><td>$name</td></tr>";
    echo "<tr><th>Destination</th><td>$destination</td></tr>";
    echo "<tr><th>No. of Travellers</th><td>$notraveller</td></tr>";
    echo "<tr><th>No. of Days</th><td>$nodays</td></tr>";
    echo "<tr><th>Accommodation Type</th><td>$accdays</td></tr>";
    echo "<tr><th>Total Cost</th><td>$" . number_format($totalCost, 2) . "</td></tr>";
    echo "</table>";


    echo "<h3>Breakdown Calculation</h3>";
    echo "<p>Flight Cost: $" . number_format($flightCost, 2) . "</p>";
    echo "<p>Daily Expenses: $" . number_format($dailyExpenses, 2) . "</p>";
    echo "<p>Accommodation: $" . number_format($accommodationCost, 2) . "</p>";
    if ($notraveller > 4) {
        echo "<p>Discount (10% off for groups of 5+): $" . number_format($totalCost * 0.1, 2) . "</p>";
    }
    echo "<p>Total Estimated Cost: $" . number_format($totalCost, 2) . "</p>";
}

?>

</body>
</html>