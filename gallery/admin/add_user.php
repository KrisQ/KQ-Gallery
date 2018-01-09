<?php include ("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>
<?php 

// $users = user::find_all();



$user = new User();

    if (isset($_POST['create'])){

        if($user) {
          
          $user->username = $_POST['username'];
          $user->password = $_POST['password'];
          $user->last_name = $_POST['last_name'];
          $user->first_name = $_POST['first_name'];

          $user->set_file($_FILES['user_image']);
          $user->save_user_in_image();

        }

        



    

}






 ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

           <?php include ("includes/top_navigation.php"); ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include ("includes/side_navigation.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

            <div class="container-fluid">
<br>
<h1>Add User</h1>
<hr>
                <!-- Page Heading -->
                <div class="row">
                <form action="" method="post" enctype="multipart/form-data">


                    <div class="col-md-6 col-md-offset-3">
                        
                        
                            <div class="form-group">
                            <p>Add Your Profile Picture : <input class="pull-right" type="file" style="color: white" name="user_image"></p>
                             </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                         <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        </div>

                            <div class="row">
                         <div class="form-group col-md-6">
                            <label for="frist_name">First Name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>


                         <div class="form-group col-md-6">
                            <label for="last_name">Last name</label>
                            <input class= "form-control" name="last_name">
                        </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class= "btn btn-block btn-success" name="create">
                        </div>


                    </div>


                    </form>

                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include ("includes/footer.php"); ?>