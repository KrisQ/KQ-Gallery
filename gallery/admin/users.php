<?php include ("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>
<?php 

$users = User::find_all();




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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <a href="add_user.php" class="btn btn-primary btn-lg pull-right">Add User</a>
                        </h1>


                        
                        <div class="col-md-12">

                        <table class="table table-hover table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php foreach ($users as $user): ?>
                                    
                                
                                
                           <tr>
                               <td><?php echo $user->id ?></td>
                                <td>
                                <img class="img-responsive user-image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                               </td>
                                <td><?php echo $user->username ?>
                                     <div class="action_links">
                                   <a class="text-danger" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                    <a class="text-warning" href="edit_user.php?id=<?php echo $user->id; ?>">Edit </a> 
                               </div>
                                </td>
                                <td><?php echo $user->first_name ?></td>
                                <td><?php echo $user->last_name ?></td>
                           

                           </tr>

                       <?php endforeach; ?>

                            </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include ("includes/footer.php"); ?>