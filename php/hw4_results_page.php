<?php

    include("hw4_functions.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>David's Website</title>
    <link href="_scripts/jquery-1.11.2.js">
    <link href="_css/styles.css" rel="stylesheet">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    
</head>
<body>
	<div class="container">
		<div class="jumbotron">
    			<h1>Results</h1>
            <a href="hw4_page.php">Go Back</a>      

  			
		</div>
		
	</div>
    <div class="container">
        

<?php

    //If Post request is for "Class Score"
    if (isset($_POST["submit_class"])) {
        //Success
        //redirect_to("someplace.php");
        $course = new Course;
        $sd = $course->calculate_sd();
        $avg = $course->average();
        


        ?>

            <h3>
                Class Average and Standard Deviation 
            </h3>
            <pre>
            <h3>
            <?php
                print "\nStandard Deviation for the midterm: " . $sd[0] . "\n";
                print "Standard Deviation for the Final: " . $sd[1] . "\n\n";

                print "Average for Midterm was " . $avg[0] . "\n";
                print "Average for Final was " . $avg[1];
            ?>
            </h3>
            </pre>
            
        <?php
        
    } 
    else{
            
    //CALCULATE AVERAGE AND STANDARD DEVIATION OF MIDTERM & FINAL
    //IMPLEMENT PHP CLASS TO RETRIEVE AND CALC SCORES
    //insert code here...
    
        $cwid = $_POST["cwid"];
        $student = New Student($cwid);
        if($student->exists){
          $average = $student->calculate_average();
        }else{
          $student = null;
        }
    ?>



        <h3>
            Student Information:
        </h3>
        <table class="table">
              <thead>
                <tr>
                  <th>CWID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Date of Birth</th>
                </tr>
              </thead>
              <tbody>
                <tr class="success">
                    <td><?php echo $student_info[0]?></td>
                    <td><?php echo $student_info[1]?></td>
                    <td><?php echo $student_info[2]?></td>
                    <td><?php echo $student_info[3]?></td>
                </tr>
              </tbody>
            </table>
        <h3>
            Course Scores:
        </h3>
        <pre>
            <?php
                echo "attendence_score: " . $attendance_score;
                echo "\nterm_score: " . $term_score;
                echo "\nmidterm_score: " . $midterm_score;
                echo "\nfinal_score: " . $final_score;
            ?>
        </pre>

        <h3>
            The Final Course Score: 
        </h3>
        <pre>
            <h4>
                <?php
                    echo "<h1> {$average} </h1> ";

                ?>
            </h4>
        </pre>
    </div>

    <?php
        } //end else statement for student grade
    ?>

</body>

</html>

<?php
    // mysqli_close($conn);
?>

