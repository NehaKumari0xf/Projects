<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php
                include 'navigation.php'; 
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <h1 class="text-center">Update Student</h1>
                <form action="updatestudentform.php" method="get">
                    <label for="" class="form-label">
                        id
                    </label>
                    <input type="number" class="form-control" name="student_id" required/>
                    <input type="submit" value="Get From"/>
                </form>
                
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div> 
    
</body>
</html>