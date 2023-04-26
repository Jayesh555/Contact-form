<?php
require 'connection.php';

if(isset($_POST["submit"])){
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $contact = $_POST["contact"];

  $query = "INSERT INTO `contact`(`sr_no`, `firstname`, `lastname`, `contact`) VALUES ('','$firstname','$lastname','$contact')";
  mysqli_query($conn,$query);

}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<style>

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  
}

.container {
  border-radius: 10px;
  background-color: #f2f2f2;
  padding: 40px;
}

</style>
</head>
<body>

<h3 style="text-align: center;">Contact Form</h3>

<div class="container">
  <form method="post" action="">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="contact">Contact</label>
    <input type="text" id="contact" name="contact" placeholder="Your Contact..">


    <button style="background-color:yellow; border-color:yellow"; type="submit" name="submit">Submit</button>
  </form>
</div>

<?php
    include_once 'connection.php';
    $result = mysqli_query($conn,"SELECT * FROM contact");
?>

<h1 class="text-center">Contact Details</h1>

<?php
if (mysqli_num_rows($result) > 0) {}    
?>
<!-- Table Data -->
<div class="container">
    <hr>
    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Search">

    <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
    <tr>
    <td>Sr.no</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Contact</td>  
    </tr>

<?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
?>

    <tr>
        <td><?php echo $row["sr_no"]; ?></td>
        <td><?php echo $row["firstname"]; ?></td>
        <td><?php echo $row["lastname"]; ?></td>
        <td><?php echo $row["contact"]; ?></td> 
    </tr>

<?php
$i++;
}
?>
    </table>
</div>

<script type="application/javascript">
    function tableSearch() {
        let input, filter, table, tr, td, txtValue;

    
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

    }
</script>
</body>
</html>


