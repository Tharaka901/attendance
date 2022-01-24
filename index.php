<?php 
    $title = "Index";  
    require_once "includes/header.php";
    require_once "db/conn.php"; 

    $results = $crud->getspecialties();
    
    
?>

    <h1 class="text-center">Registration for IT Conferance </h1>
 
    
    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="fristname">Frist Name</label>
            <input required type="text" class="form-control" id="fristname" name="fristname" placeholder="Enter Frist Name">
        </div>
        <div class="mb-3">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
        </div> 
        <div class="mb-3">
            <label for="dob">Date of Birth</label>
            <input required type="text" class="form-control" id="dob" name="dob">
        </div>  
        <div class="mb-3">
            <label for="specialty">Area of Experties</label>
            <select class="form-select form-select-sm" id="specialty" name="specialty" >
                <?php while($r= $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r["specialty_id"]?>"><?php echo $r["name"];?></option>     
                <?php }?>    
            </select>
        </div>
        <div class="mb-3">
            <label for="email1">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone">Contact Number</label>
            <input required type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Enter Phone Number">
            <div id="phoneHelp" class="form-text">We'll never share your Phone Number with anyone else.</div>
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
    </form>
<br>
<?php require_once "includes/footer.php"; ?>

 