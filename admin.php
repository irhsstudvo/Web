
<?php
ob_start();
session_start();
require_once 'dbconnect.php';

?>


<html>

<head>
    <title>BridgeDay Admin</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"></link>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-pink.min.css" />
</head>

<body>
  <table cellpadding="5"><thead>
    <tr><td>User ID</td>
<td>First</td>
<td>Last</td>
<td>Email</td>
<td>Gender</td>
<td>School</td>
<td>Medical Info</td>
<td>Emergency Contact</td>
<td>Emergency Number</td>
<td>What do you want to learn?</td>
<td>Workshop 1</td>
<td>Workshop 2</td>
<td>Workshop 3</td>
<td>Time</td>
    </tr>
  </thead>
  <?php
  $query = "SELECT * FROM users";

  $res = mysql_query($query);

  while ($results = mysql_fetch_array($res, MYSQL_ASSOC)) {
    $data[] = $results;
  }

  foreach ($data as $entry){
    ?>
    <tr>
      <td><?php echo $entry["userId"]; ?></td>
      <td><?php echo $entry["userFName"]; ?></td>
    <td><?php echo $entry["userLName"]; ?></td>
    <td><?php echo $entry["userEmail"]; ?></td>
  <td><?php echo $entry["userGender"]; ?></td>
      <td><?php echo $entry["userSchool"]; ?></td>
    <td><?php echo $entry["userMedInfo"]; ?></td>
      <td><?php echo $entry["userEmgName"]; ?></td>
    <td><?php echo $entry["userEmgNum"]; ?></td>
  <td><?php echo $entry["userQResponse"]; ?></td>
    <td><?php echo $entry["userWorkshop1"]; ?></td>
      <td><?php echo $entry["userWorkshop2"]; ?></td>
    <td><?php echo $entry["userWorkshop3"]; ?></td>
    <td><?php echo $entry["timeEntered"]; ?></td>
  </tr>
    <?php
  }
  mysql_free_result($res);
   ?>
 </table>
    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
</body>

</html>
