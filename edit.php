<?php 
    $title = "Edit Records";

    require_once "includes/header.php";
    require_once "includes/auth_check.php";
    require_once "db/conn.php"; 

    $results = $crud->getspecialties();
    
    if(!isset($_GET["id"]))
    {
        //echo "error";
        include "includes/errormessage.php";
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET["id"];
        $attendee = $crud->getAttendeeDetails($id);
    
     
    
     
?>

    <h1 class="text-center">Edit Records </h1>
 
    
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee["attendee_id"] ?>" />
        <div class="mb-3">
            <label for="fristname">Frist Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee["fristname"] ?>" id="fristname" name="fristname">
        </div>
        <div class="mb-3">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee["lastname"] ?>" id="lastname" name="lastname" >
        </div> 
        <div class="mb-3">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee["dateofbirth"] ?>" id="dob" name="dob">
        </div>  
        <div class="mb-3">
            <label for="specialty">Area of Experties</label>
            <select class="form-select form-select-sm" value="<?php echo $attendee["specialty"] ?>" id="specialty" name="specialty" >
                <?php while($r= $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r["specialty_id"]?>"<?php if($r["specialty_id"] == 
                    $attendee["specialty_id"]) echo "selected"?> >
                        <?php echo $r["name"];?>
                    </option>     
                <?php }?>    
            </select>
        </div>
        <div class="mb-3">
            <label for="email1">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee["emailaddress"] ?>" id="email" name="email" aria-describedby="emailHelp" >
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee["contactnumber"] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your Phone Number with anyone else.</div>
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-success
            " type="submit" name="submit">Save Changes</button>
        </div>
    </form>

<?php } ?>

<br>
<?php require_once "includes/footer.php"; ?>