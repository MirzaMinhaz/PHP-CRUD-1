<?php 
require_once("Include/DB.php");
$SearchQueryParameter = $_GET["id"];
if(isset($_POST["Submit"])) {

        $EName = $_POST["EName"];
        $SSN = $_POST["SSN"];
        $Dept = $_POST["Dept"];
        $Salary = $_POST["Salary"];
        $HomeAddress = $_POST["HomeAddress"];
        global $ConnectingDB;
        $sql = "UPDATE emp_record SET ename = '$EName', ssn='$SSN', dept = '$Dept', salary='$Salary',
        homeaddress='$HomeAddress' WHERE id='$SearchQueryParameter'";
        $Execute = $ConnectingDB->query($sql);
        if($Execute) {
            echo '<script>window.open("View_From_Database.php?id=Record Updated Successfully","_self")</script>';
        }
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data into Database</title>
    <link rel="stylesheet" href="../DB&PHP/Include/style.css">
</head>
<body>
<?php 
global $ConnectingDB;
$sql = "SELECT * FROM emp_record WHERE id='$SearchQueryParameter'";
$stmt =$ConnectingDB->query($sql);
while($DataRows = $stmt->fetch()) {
    $Id          = $DataRows["id"];
    $EName       = $DataRows["ename"];
    $SSN         = $DataRows["ssn"];
    $Department  = $DataRows["dept"];
    $Salary      = $DataRows["salary"];
    $HomeAddress = $DataRows["homeaddress"];
}
?>
    <div>
        <form class="" action="Update.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
            <fieldset>
                <span class="FieldInfo">Employee Name:</span>
                <br>
                <input type="text" name="EName" value="<?php echo $EName; ?>">
                <br>
                <span class="FieldInfo">Social Security Number:</span>
                <br>
                <input type="text" name="SSN" value="<?php echo $SSN; ?>">
                <br>
                <span class="FieldInfo">Department:</span>
                <br>
                <input type="text" name="Dept" value="<?php echo $Department; ?>">
                <br>
                <span class="FieldInfo">Salary:</span>
                <br>
                <input type="text" name="Salary" value="<?php echo $Salary; ?>">
                <br>
                <span class="FieldInfo">Home Address:</span>
                <br>
                <textarea name="HomeAddress" rows="8" cols="80"> <?php echo $HomeAddress; ?></textarea>
                <br>
                <input type="submit" name="Submit" value="Submit your record">
            </fieldset>
        </form>
    
    </div>

 </body>
</html>