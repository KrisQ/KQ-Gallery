<?php include ("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>
<?php 

$photos = Photo::find_all();




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
                            Photos <small>Subheading</small>
                        </h1>
                        
                        <div class="col-md-12">

                        <table class="table table-hover table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Photos</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php foreach ($photos as $photo): ?>
                                    
                                
                                
                           <tr>
                               
                                <td>
                                <img class="img-responsive" width="200" src="<?php echo $photo->picture_path(); ?>" alt="">
                                <div class="action_links">
                                   <a class="text-danger" href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                    <a class="text-warning" href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit </a> 
                                   <a class="text-info" href="../photos.php?id=<?php echo $photo->id; ?>">View</a> 
                               </div>
                               </td>
                                <td><?php echo $photo->id ?></td>
                                <td><?php echo $photo->filename ?></td>
                                <td><?php echo $photo->title ?></td>
                                <td>
                                <a href="photo_comment.php?id=<?php echo $photo->id; ?>"><?php 
                                $comments = Comment::find_the_comment($photo->id );

                                echo count($comments)
                                ?></a>
                                </td>
                           

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