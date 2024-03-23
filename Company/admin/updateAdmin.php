<?php

require("./admin_content/head.php");
require("./checkLogin.php");
$error=[];
?>

<body>

    <body>

        <?php
        require("./admin_content/nav.php");
        require("./admin_content/connection/connection.php");
    
        $id = $_POST['id'];
        $sql = "SELECT * FROM `admins` WHERE `id`='$id'";
        $query = mysqli_query($conn, $sql);
 
        if(mysqli_num_rows($query)<=0){
            $error[]='no admin found';
            $_SESSION['errors']=$error;
            header("location: ./Admins.php");
        }
        $admin = mysqli_fetch_assoc($query);
        echo '<pre>';
        print_r($admin);
        echo '</pre>';
        ?>

        <div class="container py-5">
            <?php require("./handlars/alerts.php")?>
            <div class="row">

                <div class="col-md-6 offset-md-3">
                    <h3 class="mb-3">Edit Admin</h3>
                    <div class="card">
                        <div class="card-body p-5">
                            <form action="./handlars/updateAdmin.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="<?= $admin['name'] ?>">
                                </div>


                                <div class="form-group">
                                    <label>Emile</label>
                                    <input type="text " class="form-control" name="email" value="<?= $admin['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="validatedCustomFile" class="my-1">image</label>
                                    <div class="custom-file my-3">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="image" accept="image/*">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose personal image...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        <div>
                                            <img src="./uplode/img/<?=$admin['imge']?>" alt="admin avatar" class="img-thumbnail" style="width: 75px; height: 75px;">
                                        </div>
                                    </div>
                                    <div class="form-group mt-5">
                                        <label for="inputState">State</label>
                                        <select id="inputState" class="form-control" name="stats">
                                            <option value="1">Active</option>
                                            <option value="0" <?= $admin['status'] == 0 ? 'selected' : ''; ?>>not active</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-dark" href="#">Back</a>
                                    </div>

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