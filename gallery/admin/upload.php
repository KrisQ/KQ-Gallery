<?php include ("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php 

if (isset($_POST['submit'])) {
    
    $photo = new Photo();
    $photo->title = $_POST['title'];
    if (isset($_FILES['file_upload'])){
    $photo->set_file($_FILES['file_upload']);
}

    if ($photo->save()) {
        $message = "The photo saved successfully"; 
    } else {
        $message = join("<br>", $photo->errors);
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Upload <small>Subheading</small>
                        </h1>

                        
                            
                        <div class="col-md-6">
                        
                        <?php if (isset($message)){echo $message;}  ?>

                        <form action="upload.php" method="post" enctype="multipart/form-data">
                    
                <div class="form-group">
                    <input name="title" type="text" class="form-control" placeholder="Enter title">
                </div>
                    
                <div class="input-group">
                    <input name="file_upload" type="file" style="color:white">

                </div>
<br>
                <button class="btn btn-primary btn-block" name="submit" type="submit">Submit</button>


                     </form>

                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include ("includes/footer.php"); ?>