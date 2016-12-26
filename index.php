
<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['submit'])) {

 $email = strip_tags(trim($_POST['email']));
 $fname = strip_tags(trim($_POST['firstname']));
 $lname = strip_tags(trim($_POST['lastname']));
 $school = strip_tags(trim($_POST['school']));
 $medInfo = strip_tags(trim($_POST['medInfo']));
 $emgContact = strip_tags(trim($_POST['emgContact']));
 $emgPhone = strip_tags(trim($_POST['emgPhone']));
 $learnQ = strip_tags(trim($_POST['learnQ']));
 $gender = $_POST['gender'];

 $error = false;

 if (empty($email) || empty($fname) || empty($lname) || empty($school) || empty($medInfo) || empty($emgContact) || empty($emgPhone) || empty($learnQ) || empty($gender)){
   $error = true;
   $errMSG = "You must complete all fields.";
 }

//TODO
 if (false){
      $error = true;
      $errMSG = "Workshop choices must be different";
  }

//todo: change false to !$error
 if (false) {
    $query = "INSERT INTO users(userFName, userLName, userEmail) VALUES('$fname', '$lname', '$email')";
    $res = mysql_query($query);

    if ($res) {
      $errMSG = "Successfully registered!";
    }
}
}

?>


<html>

<head>
    <title>BridgeDay 2017</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"></link>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-pink.min.css" />
</head>

<body>
    <div class="fullscreen-bg">
        <video loop muted autoplay poster="img/videoframe.jpg" class="fullscreen-bg__video">
            <source src="video/bridgeday2016.mp4" type="video/mp4">
        </video>
    </div>

    <div class="overlay">
        <div class="title fadeIn">IRHS BRIDGEDAY <span style="color: red;">2017</span></div>
        <div id="downArrowWrapper">
            <center>
                <img id="downArrow" src="img/icons/whiteArrow.png">
            </center>
        </div>
    </div>

    <div class="section second">
        <div class="subTitle fadeIn">What is BridgeDay?</div>
    </div>

    <div class="transition">
    </div>

    <div class="section">
        <div class="subTitle fadeIn">Register for BridgeDay 2017</div>

        <center>

        <form id="reg" method='post'>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fadeIn">
                <input class="mdl-textfield__input" type="text" id="firstname" name="firstname">
                <label class="mdl-textfield__label" for="firstname">First Name</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fadeIn">
                <input class="mdl-textfield__input" type="text" id="lastname" name="lastname">
                <label class="mdl-textfield__label" for="lastname">Last Name</label>
            </div>

            <!-- -->  </br>
              </br>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fadeIn">
                <input class="mdl-textfield__input" type="text" id="email" name="email">
                <label class="mdl-textfield__label" for="email">Email</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fadeIn">
                <input class="mdl-textfield__input" type="text" id="school" name="school">
                <label class="mdl-textfield__label" for="school">School</label>
            </div>

            <!-- -->  </br>
              </br>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fadeIn">
                <input class="mdl-textfield__input" type="text" id="medInfo" name="medInfo">
                <label class="mdl-textfield__label" for="medInfo">Medical Information</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fadeIn">
                <input class="mdl-textfield__input" type="text" id="emgContact" name="emgContact">
                <label class="mdl-textfield__label" for="emgContact">Emergency Contact Name</label>
            </div>

            <!-- -->  </br>
              </br>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fadeIn">
                <input class="mdl-textfield__input" type="text" id="emgPhone" name="emgPhone">
                <label class="mdl-textfield__label" for="emgPhone">Emergency Contact Phone Number</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label fadeIn">
                <input class="mdl-textfield__input" type="text" id="learnQ" name="learnQ">
                <label class="mdl-textfield__label" for="learnQ">What do you hope to learn?</label>
            </div>

            </br>
            </br>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect fadeIn" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button" name="gender" value="M">
                <span class="mdl-radio__label">Male</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect fadeIn" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" name="gender" value="F">
                <span class="mdl-radio__label">Female</span>
            </label>

            </br>
            </br>

            <select id="work1" name="work1" class="select-style fadeIn">
                <option value="" disabled selected>1st Choice Workshop</option>

            </select>

            <br/>
            <br/>

            <select id="work2" name="work2" class="select-style fadeIn">
                <option value="" disabled selected>2nd Choice Workshop</option>

            </select>
            <br/>
            <br/>

            <select id="work3" name="work3" class="select-style fadeIn">
                <option value="" disabled selected>3rd Choice Workshop</option>

            </select>
            </br>
            <br>
            <br>

            <input id="submit" name="submit" class="fadeIn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit" value="Register">
            </input>
        </form>
      </center>
    </div>

    <div class="footer">
      <?php echo $errMSG; ?>
    </div>

    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>

</html>
