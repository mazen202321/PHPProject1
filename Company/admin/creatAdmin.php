<?php
require("./admin_content/head.php");
require("./checkLogin.php");
?>
<body>
    
<?php
   require("./admin_content/nav.php")
   ?>
    <style>
        .h-10{
            height:10%;
        }
    </style>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Create Admin</h3>
                <div class="card">
                
                    <div class="card-body p-5">
   <form action="./handlars/add-admin.php" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="exampleInputname1" >name</label>
    <input type="text" class="form-control" id="exampleInputname1" name="name">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" >Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" >
  </div>
  <div class="form-group">
  <label for="validatedCustomFile" class="my-1">image</label>
  <div class="custom-file my-3">
    <input type="file" class="custom-file-input" id="validatedCustomFile" name="image" accept="image/*">
    <label class="custom-file-label" for="validatedCustomFile">Choose personal image...</label>
    <div class="invalid-feedback">Example invalid custom file feedback</div>
  </div>
  <div class="form-group">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="stats">
        <option  value="1">Active</option>
        <option selected value="0">non active</option>
      </select>
    </div>
 <?php require("./handlars/alerts.php");
 ?>
  <button type="submit" class="btn btn-primary">creat new admin</button>
</form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>