<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"/>
    <!--Bottstrap 5--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>login page</title>
  <style>
      /* Bordered form */
form {
  border: 20px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  padding: 10px 20px;
  margin: 8px 0;
  width: 100%;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {

  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  width: 100%;
  border: none;
  cursor: pointer;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 20px 0 10px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 150px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}

  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: scroll;
  overflow-x: hidden; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 100px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5px auto; /* 15% from the top and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
  
}

/* The Close Button */
.close {
  /* Position it in the top right corner outside of the modal */
  position: absolute;
  right: 100px;
  top: 0;
  margin-top: 15px;
  color: #000;
  font-size: 50px;
  font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}
        
    </style>
        
    <script>
    //Tip: You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
    
    //Example
    
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

<script>
  //show input password
function myInputPwdFunction() 
{
  var x = document.getElementById("showInputPwd");
  if (x.type === "password")//=== or == 
  {  
    x.type = "text";//like neha3410
  } else 
  {
    x.type = "password";//......
  }
}

</script>


        
</head>
<body>
    
</body>
</html>



