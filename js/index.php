<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<title>Διπλωματική Εργασία-Φόρμα Επίδειξης και Δοκιμών</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/shadowbox.css">
<script type="text/javascript" src="js/shadowbox.js"></script>
<script type="text/javascript" src="js/utilities.js"></script>
</head>
<?php
session_start();
if (!isset( $_SESSION['name']))
{
//If not isset -> set with dumy value
//$_POST['user'] = "undefine";
//echo "<body>";
echo "<body onload=\"protection();\">";
}
else
{
	echo "<body>";
	//echo "<body onload=\"protection();\">";
	}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>
<div id="wrap">

<div id="header">
<h1><a>Ιωάννης Νικολάου</a><img src="files/images/me.jpg" /></h1>
<h2>Διπλωματική Εργασία</h2>
<h2>Φόρμα Επίδειξης και Δοκιμών</h2>
</div>

<div id="right">

<h2><a>Λίγα λόγια.....</a></h2>
<div class="articles">
Ο πυρήνας της Διπλωματικής εργασίας αφορά την κατασκευή ενός restfull api που έχει σκοπό την κατηγοριοποίηση (<b>Clasification</b>) και την ανίχνευση μη κανονικών τιμών (<b>Anomaly Detection</b>) από ένα δίκτυο αισθητήρων. Το api αυτό είναι δύσκολο να γίνει κατανοητό χωρίς κάποια διεπαφή (<b>User Interface</b>) που να μπορεί κάποιος να το δοκιμάσει με εύχρηστο τρόπο και να αντιληφθεί την λειτουργία και τα αποτελέσματα που παρέχει. Αυτός είναι και ο λόγος ύπαρξης της παρούσας σελίδας.
<br /><br />
<img src="files/images/pic2.jpg" alt="Example pic" style="border: 3px solid #ccc;" />
<br /><br />
Τα αποτελέσματα έτσι παρουσιάζονται με οπτικό τρόπο (<b>Γραφήματα</b>) παρέχοντας μια οικειότητα και μια ευκολία κατανόησης.  
</div>
<h2><a name="odig">Οδηγίες Χρήσης</a></h2>
<div class="articles">
Από το σχετικό μενού μπορούμε να επιλέξουμε κάποια λειτουργία από τις παρεχόμενες. Την κατηγοριοποίηση (<b>Clasification</b>) και την ανίχνευση μη κανονικών τιμών (<b>Anomaly Detection</b>). Κατά βάση η σελίδα θα μας οδηγήσει σε έλεγχο μιας τιμής που θα εισάγουμε εμείς. Είτε θα γίνει ο έλεγχος για το σε ποια κατηγορία ανήκει η συγκεκριμένη τιμή που είτε θα ελεγχθεί αν η τιμή είναι φυσιολογική με βάση τα δεδομένα που έχουν εισαχθεί μέχρι την στιγμή εκείνη στον εξυπηρετητή (<b>server</b>) ανάλογα με τι θα επιλέξουμε. Ωστόσο αν έχουμε ανεβάσει κάποιο αρχείο δεδομένων η σελίδα θα μας επιστρέψει τα αποτελέσματα με βάσει τα δεδομένα που υπάρχουν στο ανεβασμένο αρχείο. Το αρχείο που ανεβάζουμε διαγράφεται μετά την παρουσίαση αποτελεσμάτων.</div>
</div>
<div id="left"> 

<h3>Categories</h3>
<ul>
<li><a href="index.php">Αρχική Σελίδα</a></li>
<li><a href="clasification.php">Clasification</a></li> 
<li><a href="anomaly.php">Anomaly Detection</a></li>
<li><a href="" onclick="return live();">Live Results</a></li> 
</ul>

<h3>Utilities</h3>
<ul>
<li><a href="" onclick="return upload();">File Upload</a></li>
<li><a href="#odig">Οδηγίες Χρήσης</a></li>
</ul>

<h3>And More</h3>
<ul>
<li><a href=""  onclick="return credits();">Credits</a></li>
</ul>

</div>
<div style="clear: both;"> </div>

<div id="footer">
Designed by <a href="http://www.free-css-templates.com/">Free CSS Templates</a>, Thanks to <a href="http://www.openwebdesign.org/">Web Design Firm</a>
</div>
</div>


</body>
</html>