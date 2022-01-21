<?php
    require_once "db/conn.php"; 
    //Get value from post operation
    if(isset($_POST["submit"])){

        $id = $_POST["id"];  
        $fname = $_POST["fristname"];
        $lname = $_POST["lastname"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $contact = $_POST["phone"];  
        $specialty = $_POST["specialty"];

        //Call crud funtion
        $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);
        //Redirect to index.php
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            include "includes/errormessage.php";
        }
    }
    else{
        include "includes/errormessage.php";
    } 

?>