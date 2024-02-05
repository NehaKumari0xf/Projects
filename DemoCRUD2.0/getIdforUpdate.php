<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <title>Id</title>
</head>
<body>
    <div class="conatiner-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php include 'navigation.php'?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="updateForm.php" method="get">
                    <label for="" class="form-label">
                        id
                    </label>
                    <input type="number" class="form-control" name="id" required/>
                    <input type="submit" value="Get Form"/>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>

    </div>
    
</body>
</html>