<?php
require("./admin_content/head.php");
require("./checkLogin.php");
?>
<body>
<body>
    
<?php
   require("./admin_content/nav.php");
   require("./admin_content/connection/connection.php");
   ?>

    <div class="container-fluid py-5">

<?php
 require("./handlars/alerts.php");?>
          
        <div class="row">
        
            <div class="col-md-10 offset-md-1">
          
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                    <a href="./creatAdmin.php" class="btn btn-primary btn-lg active bg-secondary " role="button" aria-pressed="true">create new admin</a>
                </div>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">image</th>
                        <th scope="col">is active</th>
                        <th scope="col">creatded At</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $lemet;
$sql=" SELECT `id`,`name`,`email`,`imge`,`status`,`created_at` FROM `admins`";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0):
    $admins=mysqli_fetch_all($query,MYSQLI_ASSOC);
    foreach ($admins as $index => $admin):

?>
                      <tr>

                        <th scope="row"><?= $index+1?></th>
                        <td><?=$admin['name']?></td>
                        <td><?=$admin['email']?></td>
                        <td><img src="./uplode/img/<?=$admin['imge']?>" alt="user image" class="img-thumbnail" style="width: 75px; height: 75px;"></td>
                        <td><?php if($admin['status']==1):?>
                            <i class="fas fa-check-circle text-info"></i>
                            <?php else:?>
                                <i class="fas fa-times-circle text-danger"></i>
                                <?php endif;?>

                        </td>
                        <td><?=$admin['created_at']?></td>
                        <td>
                            <form action="./updateAdmin.php" method="post" style="display: inline-block;">
                                <input  type="hidden" name="id" value="<?=$admin['id']?>">
                                <button class="btn btn-sm btn-info" type="submit"><i class="fas fa-edit"></i></button>
                            </form>
                            <!-- <a class="btn btn-sm btn-info" href="./updateAdmin.php?id=<?=$admin['id']?>">
                                <i class="fas fa-edit"></i>
                            </a> -->
                            <form action="./handlars/deleteAdmin.php" method="post" style="display: inline-block;">
                                <input  type="hidden" name='id' value="<?=$admin['id']?>">
                                <button class="btn btn-sm btn-danger" type="submit"> <i class="fas fa-trash"></i></button>
                            </form>
                            <!-- <a class="btn btn-sm btn-danger" href="#">
                                <i class="fas fa-trash"></i>
                            </a> -->
                        </td>
                      </tr>
                      <?php endforeach; 
                    endif;
                ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>