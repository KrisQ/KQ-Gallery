<?php include ("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>
<?php 

// $users = user::find_all();

if(empty($_GET['id'])) {
    redirect("users.php");
} else {
    $user = User::find_by_id($_GET['id'] );

    if (isset($_POST['update'])){

        if($user) {
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];

                if(empty($_FILES['user_image'])){
                    $user->save();
                } else {
             $user->set_file($_FILES['user_image']);
          $user->save_user_in_image();
          $user->save();
          redirect('edit_user.php?id=$user->id');
      }
        }





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
<h1>Edit User</h1>
<hr>
                <!-- Page Heading -->
                <div class="row">


                <div class="col-md-6">
                    <a href="" data-toggle="modal" data-target="#photo-library" ><img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></a>
                </div>
                

                <form action="" method="post" enctype="multipart/form-data">
                    


                    <div class="col-md-6">
                        
                        
                            <div class="form-group">
                            <p>Add Your Profile Picture : <input class="pull-right" type="file" style="color: white" name="user_image"></p>
                             </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username;  ?>">
                        </div>

                         <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password;  ?>">
                        </div>
                        </div>

                            <div class="row">
                         <div class="form-group col-md-6">
                            <label for="frist_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name;  ?>">
                        </div>


                         <div class="form-group col-md-6">
                            <label for="last_name">Last name</label>
                            <input class= "form-control" name="last_name" value="<?php echo $user->last_name;  ?>">
                        </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                            <a href="delete_user.php?id=<?php echo $user->id;?>" class= "btn btn-block btn-danger">Delete</a>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" class= "btn btn-block btn-warning" name="update" value="Update">
                        </div>
                        </div>


                    </div>


                    </form>

                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/photo_library_modal.php"; ?>



    <?php include ("includes/footer.php"); ?>