<title>Admin Panel</title>
<style>
  .btnGoBack {
    background-color: rgb(253, 93, 194);
    color: hsl(0, 0%, 100%);
    font-weight: 700;
    padding: 12px 36px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-radius: 6px;
    overflow: hidden;
  }

  .has-before,
  .has-after {
    position: relative;
    z-index: 1;
  }

  a {
    color: inherit;
    text-decoration: none;
  }

  .title-md {
    font-size: 16px;
  }

  .btnGoBack:is(:hover, :focus-visible)::before {
    transform: translateX(100%);
  }

  .btnGoBack::before {
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background-color: rgb(253, 93, 194);
    border-radius: 6px;
    transition: 0.5s ease;
    z-index: -1;
  }

  .has-before::before,
  .has-after::after {
    content: "";
    position: absolute;
  }

  table {
    width: 100%;
    margin-top: 66px;
  }

  a {
    border: 1px solid transparent;
    background-color: rgb(253, 93, 194);
    color: white;
    border-radius: 5px;
    padding: 2px 4px;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  tr th {
    background-color: rgb(253, 93, 194);
    color: white;
  }

  th,
  td {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
  }

  .inputform {
    margin-top: 51px;
    padding: 1px 6px;
    padding-bottom: 45px;
  }

  form {
    margin-bottom: 16px;
  }

  input[type=text],
  input[type=password] {
    text-align: center;
    padding: 8px;
    width: 235px;
    border-radius: 20px;
    border: 1px solid hsl(186, 100%, 19%);
  }

  input[type=submit] {
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;

  }

  input[type=submit]:hover {
    background-color: #45a049;
  }

  .addForm button:hover {
    color: #019BA9;
    cursor: pointer;
  }

  .boxForUserCount {
    padding: 20px;
    background-color: rgb(253, 93, 194);
    width: 15%;
    border-radius: 20px;
    color: white;
  }

  .boxForCount {
    padding: 20px;
    color: white;
    background-color: rgb(253, 93, 194);
    width: 15%;
    border-radius: 20px;
    margin: 10px;
    text-align: center;
    transition: transform 0.3s ease;
  }

  .boxForCount:hover {
    transform: scale(1.1);
  }

  .navCountAdminPanel {
    display: flex;
    justify-content: center;
    margin-top: 70px;
  }

  form button {
    transition: transform ease 0.3s;
  }

  form button:hover {
    transform: scale(1.1);
  }

  .edit {
    margin-left: 10px;
    padding: 2px 8px;
  }

  .edit:hover {
    color: hsl(322.13deg 97.56% 67.84%);
    background-color: white;

  }

  .delete:hover {
    background-color: white;
    color: hsl(322.13deg 97.56% 67.84%);
  }

  .add {
    color: white;
    background-color: hsl(186, 100%, 19%);
  }

  .add:hover {
    color: hsl(186, 100%, 19%);
    background-color: white;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div style="width: 10%; margin: 10px 10px; font-size: 10px">
  <a href="../index.html" class="btnGoBack has-before title-md" style="height: 15px">Go Back</a>

</div>
<hr>
<h1 align="center" style="padding: 8px; color: rgb(253, 93, 194);; position: relative;">Admin Panel</h1>
<hr>


<!-- Php code to count users in the database -->
<?php
include 'connectToDatabase.php';

// Php code to count users in the database
$query = "SELECT COUNT(*) AS userCount FROM register WHERE roleId = '2'";
$result = mysqli_query($connection, $query);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $userCount = $row['userCount'];
} else {
  echo "Error retrieving data from the database: " . mysqli_error($connection);
}

// Php code to count admins in the database
$query = "SELECT COUNT(*) AS adminCount FROM register WHERE roleId = '1'";
$result = mysqli_query($connection, $query);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $adminCount = $row['adminCount'];
} else {
  echo "Error retrieving data from the database: " . mysqli_error($connection);
}

$countQuery = "SELECT COUNT(*) AS itemCount FROM chocolateStore";
$countResult = mysqli_query($connection, $countQuery);

// Check if the query was successful
if ($countResult) {
  $row = mysqli_fetch_assoc($countResult);
} else {
  echo "Error executing query: " . mysqli_error($connection);
}

?>

<!-- Display the counts -->
<div class="navCountAdminPanel">
  <a href="#tableUserAdmin" class="boxForCount" style="text-decoration: none; color: white;">
    <h1>Users</h1>
    <h1>
      <?php echo $userCount; ?>
    </h1>
  </a>
  <a href="#tableUserAdmin" class="boxForCount" style="text-decoration: none; color: white;">
    <h1>Admins</h1>
    <h1>
      <?php echo $adminCount; ?>
    </h1>
  </a>
  <!-- <a href="../orderHistory.php" class="boxForCount" style="text-decoration: none; color: white;">
    <h1>Order</h1>
    <h1>
      <?php echo "7" ?>
    </h1>
  </a> -->
  <a href="../try.php" class="boxForCount" style="text-decoration: none; color: white;">
    <h1>Store</h1>
    <h1>
      <?php echo $row['itemCount']; ?>
    </h1>
  </a>
  <a href="https://dashboard.stripe.com/test/payments" class="boxForCount" style="text-decoration: none; color: white;">
    <h1 style="padding: 25px;">Payments</h1>
    
  </a>
  

  <!-- Add more sections for as needed -->
</div>



<!-- Display Table -->
<table id="tableUserAdmin">
  <tr>
    <th style="border-radius: 22px 0px 0px 0px;">Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Phone Number</th>
    <th>Password</th>
    <th>Address</th>
    <th>Role</th>
    <th style="border-radius: 0px 22px 0px 0px;">Actions</th>
  </tr>
  <?php
  // Database query to fetch user data and corresponding role names
  $selectQuery = "SELECT register.id, firstName, lastName, phoneNumber, password, address, roleName
  FROM register
  INNER JOIN role ON register.roleId = role.roleId;  
  ";
  $result = mysqli_query($connection, $selectQuery);

  // Check if there was an error in the query execution
  if (!$result) {
    die("Query execution failed: " . mysqli_error($connection));
  }

  // Check if there are any rows in the result set
  if ($result->num_rows > 0) {
    // Loop through the result set and display user data in table rows
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$row['id']}</td>";
      echo "<td>{$row['firstName']}</td>";
      echo "<td>{$row['lastName']}</td>";
      echo "<td>{$row['phoneNumber']}</td>";
      echo "<td>{$row['password']}</td>";
      echo "<td>{$row['address']}</td>";
      echo "<td>{$row['roleName']}</td>";
      echo "<td>";
      // Edit button with a pencil icon linking to editData.php with user's ID as a parameter
      echo "<a href='editData.php?id={$row['id']}' class='edit'><i class='fas fa-pencil-alt'></i></a>";
      // Delete button with a trash icon linking to deleteData.php with user's ID as a parameter
      echo " " . "<a href='deleteData.php?id={$row['id']}' class='delete'><i class='fas fa-trash'></i></a>";
      echo "</td>";
      echo "</tr>";
    }
  } else {
    // Display a message if no data found in the result set
    echo "<tr><td colspan='8'>No data found.</td></tr>";
  }

  // Close the result set and database connection
  $result->close();
  $connection->close();
  ?>

</table><br>

<!-- Add new user form -->
<br><br><br>
<hr>
<!-- <form method="post" action="addData.php" class="inputForm">
  <h1>Add</h1>
  <div class="addForm">
    <label>First Name:</label>
    <input type="text" name="firstName" placeholder="First Name" required autocomplete="off">

    <label>Last Name:</label>
    <input type="text" name="lastName" placeholder="Last Name" required autocomplete="off">

    <label>Phone Number:</label>
    <input type="text" name="phoneNumber" placeholder="Phone Number" required autocomplete="off">

    <label>Password:</label>
    <input type="password" name="password" placeholder="Password" required autocomplete="off">

    <label>Address:</label>
    <input type="text" name="address" placeholder="Address" required autocomplete="off">

    <button class="add" type="submit"
      style="width: 75px; height: 34px; border: 1px solid transparent; border-radius: 20px">Add</button>
  </div>
</form> -->