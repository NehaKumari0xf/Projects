<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>

</head>
<body>
    <h1>File Upload</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
		<label>Alphabet</label>
		<input type="text" name="alpha" required/>
		<label>Word</label>
		<input type="text" name="l" required/>
        <input type="file" name="pic" accept=".jpg,.png,.jpeg" required />
        <input type="submit" value="Upload"/>
        
    </form>

</body>
</html>