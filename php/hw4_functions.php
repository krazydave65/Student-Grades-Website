<?php
class Student{
  //cwid holds the value of the student 
    public $exists = 0;
    private $cwid;
  
  public function __construct($cwid){
    $conn = connect_db();
    $sql = "SELECT cwid FROM `course_scores` WHERE cwid=" . $cwid;
    $result = $conn->query($sql);
    disconnect_db($conn);
    if($result->num_rows > 0){
      $this->cwid = $cwid;
      $this->exists = 1;
    }else{
      print("\nThe student cwid: {$cwid} does not exsists \n\n");
      $this->exists = 0;
    }
  }
  
  public function __destruct(){

  }
  
  public function calculate_average(){

    $attendance_weight = 0.05;
    $term_weight = 0.2;
    $midterm_weight = 0.25;
    $final_weight = 0.3;
    $hw_weight = 0.2;
    
    $scores = $this->return_scores();



    $attendance_scr = $scores[0];
    $term_src = $scores[1];
    $midterm_scr = $scores[2];
    $final_scr = $scores[3];
    
    $weighted_midterm = $midterm_scr * $midterm_weight;
    $weighted_final = $final_scr * $final_weight;
    $weighted_hw = $this->calculate_hw() * $hw_weight;
    $weighted_attendance = $attendance_scr * $attendance_weight;
    $weighted_term = $term_src * $term_weight;
    
    
    $average = $weighted_attendance + $weighted_term + $weighted_midterm + $weighted_final + $weighted_hw;
    
    return $average;
  }
  
  //Returns the scores for a given cwid
  public function return_scores(){
    $conn = connect_db();
    $sql = "SELECT * FROM `course_scores` WHERE cwid=" . $this->cwid;
    $result = $conn->query($sql);
    disconnect_db($conn);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $attendance_scr = $row["attendence_score"];
        $term_scr = $row["term_score"];
        $midterm_scr = $row["midterm_score"];
        $final_scr = $row["final_score"];
      }
    }
    return array($attendance_scr, $term_scr, $midterm_scr, $final_scr);
  }
  
  //Calculates the average score for all homework scores for a given cwid
  public function calculate_hw(){
    $conn = connect_db();
    $sql = "SELECT score FROM `homework_score` WHERE cwid=" . $this->cwid;
    $result = $conn->query($sql);
    disconnect_db($conn);
    if($result->num_rows > 0){
      $i = 0;
      while($row = $result->fetch_assoc()){
        $hwscores[$i] = $row["score"];
        $i += 1;
      }
    }
    return average($hwscores);
  }
}







//Course Class
class Course{
  public function calculate_sd(){
    $conn = connect_db();
    $sql = "SELECT * FROM `course_score`;";
    $result = $conn->query($sql);
    disconnect_db($conn);
    if($result->num_rows > 0){
      $i = 0;
      while($row = $result->fetch_assoc()){
        $midterm_scrs[$i] = $row["midterm_score"];
        $final_scrs[$i] = $row["final_score"];
        $i += 1;
      }
    }    
    return array(sd($midterm_scrs), sd($final_scrs));
  }
}


//Calculates the standard deviation for an array of numbers
function sd($values)
{
  $array = array();
  $i = 0;
  $average = average($values);

  foreach($values as $value)
  {
    if(is_numeric($value))
    {
      $array[$i] = $value - $average;

      $array[$i] *= $array[$i];
    $i++;
    }
  }
  return sqrt(sum($array)/(count_input($values)-1));
}

 //Calculates sum for an array of numbers
function sum($values){
  $sum = 0;
  foreach($values as $value)
  {
    if(is_numeric($value))
    {
      $sum += $value;
    }
  }
  return $sum;
}
  
  //Counts amount of numbers in an array
function count_input($values){ 
  $count = 0;
  foreach($values as $value)
  {
    if(is_numeric($value))
    {
      $count ++;
    }
  } 

  return $count;
}

//Connects to the database
function connect_db(){


  $servername = "ecs.fullerton.edu";
  $username = "cs431s29";
  $password = "oosheice";
  $dbname = "cs431s29";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection Failed: " . $conn->connect_error);
      return 0;
  } 

  return $conn;
}

//Disconnects from the connected database
function disconnect_db($conn){
  $conn->close();
}



//Calculates the average for an array of numbers
function average($values)
{
  return sum($values)/count_input($values);
}
  
