<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
<style>
.welcome{
		position:relative;
		border-radius:25px;
		height:100%;
		padding:18px;
		font-size:13px;
	}
	.form{
		position: relative;
		background:#fff;
		border-radius: 25px;
		height:100%;
		padding:25px;
		padding-left:5opx;

	}
	.container{
		position:relative;
		background: #fff;
		height:100%;
		border-radius: 25px;
		-webkit-box-shadow:0px 10px 40px -10px rgba(0,0,0,0);
		-moz-box-shadow:0px 10px 40px -10px rgba(0,0,0,0.7);
		box-shadow: 0px 10px 40px -10px rgba(0,0,0,0.7);

	}	
	.bx{
		position:relative;
		margin:20px;
		margin-bottom:20px;
	}	
</style>
</head>
		<?php include 'bootstrap.php';?> 
		<?php include 'navigation.php';?>         

<body>
<div class="container-fluid">
        <div class="container">
		<div class="row">
			<div class="col-sm-3 text-left  ">
			<div class="welcome"><br/>
				<h3 class="bx">Welcome</h3><br/>
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia totam repudiandae aperiam amet voluptatibus recusandae repellendus. Asperiores vitae impedit perferendis accusantium, laudantium, laboriosam veniam doloribus, iste exercitationem vel pariatur adipisci!</p>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus voluptate totam officiis illo, qui laudantium dolor doloremque quidem quo ea aut natus cumque aliquid vero eaque officia, voluptates odit obcaecati.</p>
				<a href="#"><button class="btn btn-outline-success">Check Form</button></a><br/>
			</div>
		</div>

		<div class="col-sm-9">
			<div class="tab-content form"><br/>
				<h3>Apply For Web Developer Post</h3><br/>

		<form action="upload.php" class="myform " method="post" enctype="multipart/form-data">
			<div class="row">
			<div class="col-md-6">
			<label class="form-label box">First Name</label>
    			<input type="text" class="form-control"name="fname" placeholder="Enter Your First Name" id="fname" required>
  			</div>
  			<div class="col-md-6">
    			<label class="form-label box">Last Name</label>
    			<input type="text" class="form-control" name="lname" placeholder="Enter Your Last Name"id="lname" required>
  			</div>
  
  			<div class="mb-3">
    			<label for="exampleInputEmail1" class="form-label box">Email address</label>
    			<input  type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
   	 		<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  			</div>
  			<div class="mb-3">
    			<label for="exampleInputPassword1" class="form-label box">Password</label>
    			<input type="password" class="form-control" name="password" required id="exampleInputPassword1">
  			</div>
  			<div class="col-12">
    			<label for="inputAddress" class="form-label box">Address</label>
    			<input type="text" class="form-control" name="address" required id="inputAddress" placeholder="Enter your Address">
  			</div>
			<div class="col-12">
    		<div class="form-check">
      			<input class="form-check-input" required type="checkbox" id="gridCheck">
      			<label class="form-check-label" for="gridCheck">
        		I accept all condition and privacy.
      			</label>
    		</div><br/>
			<div class="mb-5">
                <label class="form-label box">Upload Your CV</label>
                <input class="form-control  text-primary" type="file" name="pic" accept=".jpg,.png,.jpeg" required /><br/><br/>
				<input type="submit" class=" text-center btn btn-outline-success" value="Submit"/>
				<input type="cancel" class=" text-center btn btn-outline-danger" value="Cancel"/>

			</div>
		</div>
		</form>

		
			

</div>
</div>
</div>

</body>
</html>	