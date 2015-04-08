
<!DOCTYPE html>
<html>
<head>
	<title>David's Website</title>
    <link href="_css/styles.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    
</head>
<body>
	<div class="container">
		<div class="jumbotron">
    		<h1>David's Homepage: CS431</h1>
			<p>Hey classmates, this is my website. Hope you enjoy</p>

			<!-- <ul>
				<li><a href="secondPage.php"> <?php echo $link_name; ?> </a></li>
				<li><a href="update.php"> Update Page </a></li>
			</ul> -->
		</div>
	        
        <div class="container">
		  <h2>CS431 Homework Assignments</h2>
  			<p>Check out my homeowork Assignments!</p>  
            <table class="table">
              <thead>
                <tr>
                  <th>Homework</th>
                  <th>Date</th>
                  <th>Link</th>
                </tr>
              </thead>
              <tbody>
                <tr class="success">
                  <td title="Click to show source code"><a id="hw1_button">Assignment 1</a></td>
                  <td>February 13, 2015</td>
                  <td> <a href="homework/homwork1.txt" download>Hw1</a> </td>
                </tr>
                <tr class="success">
                  <td>Assignment 2</td>
                  <td>February 25, 2015</td>
                  <td> <a href="homework/SQL Homework" download>Hw2</a> </td>
                </tr>
                <tr class="success">
                  <td><a href="hw4_page.php">Assignment 4</a></td>
                  <td>March 31, 2015</td>
                  <td> <a href="hw4_page.php">Click Here!</a> </td>
                </tr>
              </tbody>
      		</table>

      		


        <div id="hw1">
        <pre>
            	       
//Name: David Pedroza
//CWID: 899326458
//

function mean($inputList, $count){
	$average = 0;

	for($i = 0; $i < $count; $i++){
		$average += $inputList[$i];
	}
	$average /= $count;
	$mean = $average;

	echo "The average is: " . $average . "\n";

	return $mean;
}


function standard_Deviation($count, $mean, $inputList){
	$sd;
	//numbers - mean then sqrt
	for($i = 0; $i < $count; $i++){
		$value = $inputList[$i] - $mean;
		$sd[] = $value * $value;
	}

	//find mean of sqrt'ed differences
	$average = 0;

	for($i = 0; $i < $count; $i++){
		$average += $sd[$i];
	}
	$average /= $count; // mean
	$standard_deviation = sqrt($average);

	echo "Standard Deviation: " . $standard_deviation . "\n";

}

//=====================================
//===== MAIN ==========================
//=====================================
$inputList;
$count = 5;

echo "--------------------\n";
echo "Enter 5 numbers\n";

//===== FIND MEAN ========
for($i=0; $i < $count; $i++){
	$number = readline("Number ".($i+1).": ");
	$inputList[] = $number;
}
	
$mean = mean($inputList, $count);

//====== Standard Deviation =======
standard_Deviation($count, $mean, $inputList);

//===== Sort ======================
sort($inputList);

echo "Sorted List: \n";
foreach ($inputList as $key => $val) { 
	echo $val . "\n";
}

//======= Median ==================
$median = ceil($inputList[ceil($count/2 - 1)]);
echo "Median: " . $median . "\n";
            </pre>
            </div>
	</div>



<?php
	// 3. use return data (if any)

	//while ($row = mysqli_fetch_assoc($result)) {
		//output data from each row

		?>

		<?php //echo $row["first_name"] . " ".  $row["last_name"] . " " . $row["cwid"];  ?>
		

<?php
	//} 
?>

<?php
	// 4. Release returned Data
	//mysqli_free_result($result);

?>

</body>
	<script type="text/javascript">

		$(document).ready(function(){
			$( document ).tooltip();

		    $("button").click(function(){
		        $("p").hide();
		    });
		});

	</script>
	<script type="text/javascript" src="jquery_index.js"></script>
</html>

<?php
// 5. Close database connection
	//mysqli_close($connection);
?>

