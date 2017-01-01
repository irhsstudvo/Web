
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
 $w1 = strip_tags(trim($_POST['work1']));
 $w2 = strip_tags(trim($_POST['work2']));
 $w3 = strip_tags(trim($_POST['work3']));
 $gender = $_POST['gender'];

 if ($medInfo == ""){
   $medInfo = "None";
 }
 $error = false;

  if ($w1 == $w2 || $w2 == $w3 || $w3 == $w1){
       $error = true;
       $errMSG = "Workshop choices must be different";
   }
 if (empty($email) || empty($fname) || empty($lname) || empty($school) || empty($emgContact) || empty($emgPhone) || empty($learnQ) || empty($gender)){
   $error = true;
   $errMSG = "You must complete all fields.";
 }


 if (!$error) {
    $query = "INSERT INTO users(userFName, userLName, userEmail, userSchool, userGender, userMedInfo, userEmgName, userEmgNum, userWorkshop1, userWorkshop2, userWorkshop3, userQResponse) VALUES('$fname', '$lname', '$email', '$school', '$gender', '$medInfo', '$emgContact', '$emgPhone', '$w1', '$w2', '$w3', '$learnQ')";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-pink.min.css" />
</head>

<body>
    <div class="fullscreen-bg">
        <video loop muted autoplay poster="img/videoframe.png" class="fullscreen-bg__video">
            <source src="video/bridgeday2016.mp4" type="video/mp4">
        </video>
    </div>

    <div class="overlay">
        <div class="title fadeIn">IRHS BRIDGEDAY<br>
        <div class="dateText">April 6, 2017</div></div>
        <div id="downArrowWrapper">
            <center>
                  <div>
                <figcaption>Learn More</figcaption>
                <img id="downArrow" src="img/icons/whiteArrow.png"></div>
            </center>
        </div>
    </div>

    <div class="section second">
        <div class="subTitle fadeIn">What is BridgeDay?</div>
    </div>

    <div class="transition">
    </div>

    <div class="section">
        <div class="subTitle fadeIn">Register for BridgeDay</div>
        <div id="errorMSG" class="fadeIn" style="color:<?php if ($error){ echo 'red'; }else{ echo 'green';} ?>;">
          <?php
          echo $errMSG;
         ?></div>
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
                <label class="mdl-textfield__label" for="medInfo">Medical Information (optional)</label>
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

            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect fadeIn" for="option-3">
                <input type="radio" id="option-3" class="mdl-radio__button" name="gender" value="O">
                <span class="mdl-radio__label">Other</span>
            </label>

            </br>
            </br>

            <select id="work1" name="work1" class="select-style fadeIn">
                <option value="" disabled selected>1st Choice Workshop</option>
                <option value="1a">Ex Workshop 1a</option>
                <option value="1b">Ex Workshop 1b</option>
                <option value="1c">Ex Workshop 1c</option>
            </select>

            <br/>
            <br/>

            <select id="work2" name="work2" class="select-style fadeIn">
                <option value="" disabled selected>2nd Choice Workshop</option>
                <option value="2a">Ex Workshop 2a</option>
                <option value="2b">Ex Workshop 2b</option>
                <option value="2c">Ex Workshop 2c</option>
            </select>
            <br/>
            <br/>

            <select id="work3" name="work3" class="select-style fadeIn">
                <option value="" disabled selected>3rd Choice Workshop</option>
                <option value="3a">Ex Workshop 3a</option>
                <option value="3b">Ex Workshop 3b</option>
                <option value="3c">Ex Workshop 3c</option>
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
    </div>

    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
        <script src="//cdn.jsdelivr.net/jquery.color-animation/1/mainfile"></script>
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>

</html>
