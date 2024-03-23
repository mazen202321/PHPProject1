<?php
require("./admin_content/head.php");
if(isset($_SESSION['admin'])){
    header("location: ./index.php");
}
?>
<body>
<body>
    

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Login</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form action="./handlars/handel_login.php" method="post">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group" >
                              <label>Password</label>
                              <input type="password" class="form-control" name="password">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <?php
                        require("./handlars/alerts.php")
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>