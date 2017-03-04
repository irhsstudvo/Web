
<?php
ob_start();
session_start();
require_once 'dbconnect.php';


$result1 = mysql_query("SELECT userWorkshop1 FROM users WHERE userWorkshop1='A1'");
$count1 = mysql_num_rows($result1);

$result2 = mysql_query("SELECT userWorkshop1 FROM users WHERE userWorkshop1='A2'");
$count2= mysql_num_rows($result2);

$result3 = mysql_query("SELECT userWorkshop1 FROM users WHERE userWorkshop1='A3'");
$count3 = mysql_num_rows($result3);

$result4 = mysql_query("SELECT userWorkshop1 FROM users WHERE userWorkshop1='A4'");
$count4 = mysql_num_rows($result4);

$result5 = mysql_query("SELECT userWorkshop1 FROM users WHERE userWorkshop1='A5'");
$count5 = mysql_num_rows($result5);

$result6 = mysql_query("SELECT userWorkshop1 FROM users WHERE userWorkshop1='A6'");
$count6 = mysql_num_rows($result6);

$result1b = mysql_query("SELECT userWorkshop2 FROM users WHERE userWorkshop2='B1'");
$count1b = mysql_num_rows($result1b);

$result2b = mysql_query("SELECT userWorkshop2 FROM users WHERE userWorkshop2='B2'");
$count2b= mysql_num_rows($result2b);

$result3b = mysql_query("SELECT userWorkshop2 FROM users WHERE userWorkshop2='B3'");
$count3b = mysql_num_rows($result3b);

$result4b = mysql_query("SELECT userWorkshop2 FROM users WHERE userWorkshop2='B4'");
$count4b = mysql_num_rows($result4b);

$result5b = mysql_query("SELECT userWorkshop2 FROM users WHERE userWorkshop2='B5'");
$count5b = mysql_num_rows($result5b);

$result6b = mysql_query("SELECT userWorkshop2 FROM users WHERE userWorkshop2='B6'");
$count6b = mysql_num_rows($result6b);

$max1 = 100;
$max2 = 80;
$max3 = 30;
$max4 = 40;
$max5 = 50;
$max6 = 25;
$max1b = 100;
$max2b = 80;
$max3b = 25;
$max4b = 30;
$max5b = 60;
$max6b = 30;

  if(isset($_POST['submit'])) {

    $uID = strip_tags(trim($_POST['user']));
    $whichEntry = strip_tags(trim($_POST['whichEntry']));
   $newEntry = strip_tags(trim($_POST['newEntry']));

  $query = "UPDATE users SET " . $whichEntry . "='" . $newEntry . "' WHERE userId=" . $uID;
    $res = mysql_query($query);

    if ($res){
      echo "Successfully updated.";
    }else{
      echo mysql_error();
    }
 }
   ?>
<html>

<head>
  <title>BridgeDay SOS</title></head>

  <body>

<table cellpadding="15">

  <tr>
    <td>A1
    </td>
    <td>Make it or Break It
    </td>
    <td>
      <?php echo $max1 - $count1; ?>
    </td>
  </tr>
  <tr>
    <td>A2
    </td>
    <td>Resisting Toxic Media
    </td>
    <td>
      <?php echo $max2 - $count2; ?>
    </td>
  </tr>
  <tr>
    <td>A3
    </td>
    <td>Live, Laugh, Learn
    </td>
    <td>
      <?php echo $max3 - $count3; ?>
    </td>
  </tr>
  <tr>
    <td>A4
    </td>
    <td>Balancing Relationships
    </td>
    <td>
      <?php echo $max4 - $count4; ?>
    </td>
  </tr>
  <tr>
    <td>A5
    </td>
    <td>Q&amp;A
    </td>
    <td>
      <?php echo $max5 - $count5; ?>
    </td>
  </tr>
  <tr>
    <td>A6
    </td>
    <td>Stereotypes in HS - GEM
    </td>
    <td>
      <?php echo $max6 - $count6; ?>
    </td>
  </tr>
  <tr>
    <td>B1
    </td>
    <td>Mirror Mirror
    </td>
    <td>
      <?php echo $max1b - $count1b; ?>
    </td>
  </tr>
  <tr>
    <td>B2
    </td>
    <td>Mental Health at The Ridge
    </td>
    <td>
      <?php echo $max2b - $count2b; ?>
    </td>
  </tr>
  <tr>
    <td>B3
    </td>
    <td>Music as Medicine for Mental Health
    </td>
    <td>
      <?php echo $max3b - $count3b; ?>
    </td>
  </tr>
  <tr>
    <td>B4
    </td>
    <td>Break Down the Roles
    </td>
    <td>
      <?php echo $max4b - $count4b; ?>
    </td>
  </tr>
  <tr>
    <td>B5
    </td>
    <td>Resolution: Confidence
    </td>
    <td>
      <?php echo $max5b - $count5b; ?>
    </td>
  </tr>
  <tr>
    <td>B6
    </td>
    <td>The Daring Way
    </td>
    <td>
      <?php echo $max6b - $count6b; ?>
    </td>
  </tr>
</table>


<form id="sos" method="post">
<select id="user" name="user">
      <option value="" disabled selected>Select User</option>
      <?php
      $query = "SELECT userId, userFName, userLName, userSchool, userWorkshop1, userWorkshop2 FROM users";

      $res = mysql_query($query);

      while ($results = mysql_fetch_array($res, MYSQL_ASSOC)) {
        $data[] = $results;
      }

      foreach ($data as $entry){
        echo "<option value='" . $entry["userId"] . "'>" . $entry["userId"] . " " . $entry["userFName"] . " " . $entry["userLName"] . " " . $entry["userSchool"] . " " . $entry["userWorkshop1"] . " " . $entry["userWorkshop2"] . "</option>";
      }
      mysql_free_result($res);

       ?>
</select>
<br><br>What do you want to update?
<select id="whichEntry" name="whichEntry">
      <option value="" disabled selected>Select Entry</option>
      <option value="userWorkshop1">Relationships Workshop</option>
      <option value="userWorkshop2">Resilliency Workshop</option>
</select>
<br><br>New Entry: <input type="text" name='newEntry' id='newEntry'></input>
<input id="submit" name="submit" type="submit" value="Update">
</input>
</form>

</body>

</html>
