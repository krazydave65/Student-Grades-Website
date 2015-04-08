<?php
//1. Create a database connection
    $dbhost = "ecs.fullerton.edu";
    $dbuser = "cs431s29";
    $dbpass = "oosheice";
    $dbname = "cs431s29";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    //Test if connection occured.
    if (mysqli_connect_errno()) {
        die("Database connection failed: " . 
            mysqli_connect_errno() . 
            " (" . mysqli_connect_errno() . ")"
            );
    }


    // //2. perform database query
    $query = "SELECT * FROM student";
    $results  = mysqli_query($connection, $query);


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
    		<h1>Homework 4</h1>
    		<p>Class Average and Standard Deviation</p>
  		    <a href="index.php">Home Page</a>	   
		</div>
		
	</div>


     <br>
     <!-- Submit Forms -->
    <div class="container">
        
        <div class="row">
            <div class="col-md-6" >
                <h4>
                    Search for Student Score
                </h4>
                 <form class="form-horizontal" action="hw4_results_page.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">
                            CWID: 
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Campus Wide ID" type="number" name="cwid" value="">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default" name="submit" value="Submit">Submit</button>
                        </div>
                    </div>

                </form>  
            </div> 

            <div class="col-md-6">
                <form action="hw4_results_page.php" method="post">
                    <h3>Overall Class Score</h3><br>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default" name="submit_class" value="Check Scores">Check Scores</button>
                        </div>
                    </div>

                    
                    <!-- <input type="submit" name="submit_class" value="Check Scores">  -->
                </form>  
            </div>

        </div>
    </div>

    <br>



     <!-- Scrolling Table of Students -->
    <div class="container">
        <h2 align="center">Enrolled Students</h2>

        <table class="table table-striped" >
            <thead>
                <tr>
                    <th>CWID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                </tr>
            </thead>
        </table>

    </div>
    <div class="container" id="students_list">

        <table class="table table-striped" >
            
                <tbody >

                    <?php
                        while ($student_info = mysqli_fetch_row($results)) {
                            
                            ?>


                            <tr> 
                                <td><?php echo $student_info[0]?></td>
                                <td><?php echo $student_info[1]?></td>
                                <td><?php echo $student_info[2]?></td>
                                <td><?php echo $student_info[3]?></td>
                            </tr>

                            <?php
                        }
                    ?>

                </tbody>
        </table>
    </div> 

   

    <br>
   


</body>

</html>

<?php
    mysqli_close($connection);
?>

