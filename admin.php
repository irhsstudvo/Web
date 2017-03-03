
<?php
ob_start();
session_start();
require_once 'dbconnect.php';
?>
<html>
<head>
    <title>BridgeDay Admin</title>
</head>

<body>
  <?php
  $query = "SELECT userId, userFName, userLName, userEmail, userSchool, userTeacher, userGender, userMedInfo, userEmgName, userEmgNum, userWorkshop1, lunch, userWorkshop2, userQResponse, timeEntered FROM users";

  $res = mysql_query($query);

  while ($results = mysql_fetch_array($res, MYSQL_ASSOC)) {
    $data[] = $results;
  }

  foreach ($data as $entry){
    echo $entry["userId"];
    echo "NEWFIELD";
 echo $entry["userFName"];
 echo "NEWFIELD";
    echo $entry["userLName"];
    echo "NEWFIELD";
    echo $entry["userEmail"];
    echo "NEWFIELD";
  echo $entry["userGender"];
  echo "NEWFIELD";
      echo $entry["userSchool"];
      echo "NEWFIELD";
          echo $entry["userTeacher"];
          echo "NEWFIELD";
    echo $entry["userMedInfo"];
    echo "NEWFIELD";
      echo $entry["userEmgName"];
      echo "NEWFIELD";
     echo $entry["userEmgNum"];
     echo "NEWFIELD";
  echo $entry["userQResponse"];
  echo "NEWFIELD";
echo $entry["lunch"];
echo "NEWFIELD";
     echo $entry["userWorkshop1"];
     echo "NEWFIELD";
       echo $entry["userWorkshop2"];
       echo "NEWFIELD";
     echo $entry["timeEntered"];
     echo "NEWENTRY";
  }
  mysql_free_result($res);
   ?>
</body>

</html>
