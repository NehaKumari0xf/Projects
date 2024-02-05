<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body >
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
          <?php include 'navigation.php';?>     
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <u><h1 >Student Registration Form</h1></u>
                <div>
                <form action="addNewStudent.php" method="get">
                <label>Student Name</label><br/>
                <label>First Name</label>    <input type="text" id="firstname" name="firstname" placeholder="Enter Your First Name"/>
                <label>Last Name</label>     <input type="text" id="lastname" name="lastname" placeholder="Enter Your last Name"/><br/>
                <label>Date Of Birth:</label><input type="date" id="dateofbirth" name="dateofbirth" /><br/>
                <label>Gender:</label><input type="radio" value="m" name="gender" checked id="mr"/><label>Male</label>
                <input type="radio" value="f" name="gender" id="fr"/><label>Female</label>    <input type="radio" value="f" name="gender" id="fr"/><label>Transgender</label><br/>
                <label>Father's Name</label><br/> <input type="text" id="fathersname" name="fathersname" placeholder="Enter Your Father's Name"/><br/>
                <label>Contact Number</label><br/> <input type="number" id="contactnumber" name="contactnumber"placeholder="Enter Your Contact Number"/><br/>
                <label>Qualification</label><br/> <input type="text" id="qualification" name="qualification" placeholder="Enter Your Qualification"/><br/>
                <label>Email</label><br/>         <input type="email" id="email" name="email" placeholder="Enter Your G-mail"/><br/>
                <label>Address</label><br/>   <input type="text" id="address" name="address" placeholder="Enter Your Address"/><br/>
                <label>Country</label> <br/>        
                <select id="country" name="country">
                <option value="select">Select</option>
                <option value="Africa">Africa</option>
                <option value="Brazil">Brazil</option>
                <option value="Canada">Canada</option>
                <option value="denmark">Denmark</option>
                <option value="egypt">Egypt</option>
                <option value="France">France</option>
                <option value="Georgia">Georgia</option>
                <option value="Hungary">Hungary</option>
                <option value="India">India</option>
                <option value="Japan">Japan</option>
                <option value="Kenya">Kenya</option>
                <option value="Laos">Laos</option>
                <option value="Mexico">Mexico</option>
                <option value="Nepal">Nepal</option>
                </select>
                <br/>
                <div>
                    <tr><td><input type="reset" class="btn btn-danger"/></td><td><input class="btn btn-success" type="Submit" value="Submit"/></td></tr>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>