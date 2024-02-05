<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Person</title>
</head>
<body>
    <h1>Add New Person</h1>
        <table>
            <tbody>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="pic" required />
                    
                <tr><td><label>Name:</label></td><td><input type="text" name="pname" required/></td></tr>
                <tr><td><label>Gender:</label></td><td>
                    <select name="gender">
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                        <option value="t">Third Gender</option>
                    </select>
                </td></tr>
                <tr><td><label>Age:</label></td><td><input type="number" name="age" required maxlength="2"/></td></tr>
                <tr><td><label></label></td></tr>
                <tr><td><input type="reset"/></td><td><input type="Submit" value="Save Person"/></td></tr>
            </tbody>
        </table>
    </form>
    <a href="viewAllPerson.php"><button>View All Person</button></a>
</body>
</html>

