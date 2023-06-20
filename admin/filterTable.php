<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');


// check if the form has been submitted and a date has been selected
if (isset($_POST['submit'])) {
    // retrieve the selected date from the form
    $selected_date = $_POST['selected_date'];

    // prepare SQL query to retrieve order items from the selected date
    $sql = "SELECT * FROM order_items WHERE created_at = :selected_date";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':selected_date', $selected_date);
    $stmt->execute();

    // start creating the HTML table
    echo "<table>";
    echo "<tr><th>Order ID</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Order Date</th></tr>";

    // loop through the results and add a row to the table for each item
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['order_id'] . "</td>";
        echo "<td>" . $row['product_name'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['order_date'] . "</td>";
        echo "</tr>";
    }

    // close the table
    echo "</table>";
} else {
    // if the form has not been submitted, display an error message
    echo "Please select a date to filter by.";
}




?>

<form method="post" action="#">
    <label for="selected_date">Select a date to filter by:</label>
    <input type="date" id="selected_date" name="selected_date">
    <input type="submit" value="Filter">
</form>
