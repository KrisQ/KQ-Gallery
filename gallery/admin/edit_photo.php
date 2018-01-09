<?php include ("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>
<?php 

// $photos = Photo::find_all();


if(empty($_GET['id'])) {
    redirect("photos.php");
} else {
    $photo = Photo::find_by_id($_GET['id'] );

    if (isset($_POST['update'])){

        if($photo) {
            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->alternate_text = $_POST['alternate_text'];
            $photo->description = $_POST['description'];
        }

        $photo->save();




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
<h1>Edit Pictures</h1>
<hr>
                <!-- Page Heading -->
                <div class="row">
                <form action="" method="post">
                    <div class="col-lg-8">
                        
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php if(isset($photo->title)){echo $photo->title; }?>">
                        </div>

                       

                         <div class="form-group col-md-4">
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" class="form-control" value="<?php if(isset($photo->caption)){echo $photo->caption; }?>">
                        </div>
                            
                         <div class="form-group col-md-4">
                            <label for="alternate_text">Alternate text</label>
                            <input type="text" name="alternate_text" class="form-control" value="<?php if(isset($photo->alternate_text)){echo $photo->alternate_text; }?>">
                        </div>
                        </div>

                         <div class="form-group">
                            <a class="thumbnail" href="#"><img class="img-responsive" style="height:170px" src="<?php echo $photo->picture_path(); ?>" alt=""></a>
                        </div>

                         <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class= "form-control" name="description" id="" cols="30" rows="10" value= ><?php if(isset($photo->description)){echo $photo->description; }?></textarea>
                        </div>

                    </div>


                    <div class="col-md-4 well">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyphicon glyphicon-calendar"> Uploaded on :</span>
                                    </p>
                                    <p class="text">
                                        Photo Id : <span class="data photo-id-box"><?php echo $photo->id; ?></span>
                                    </p>
                                    <p class="text">
                                        Filename : <span class="data"><?php echo $photo->filename; ?></span>
                                    </p>
                                    <p class="text">
                                        File Type : <span class="data"><?php echo $photo->type; ?></span>
                                    </p>
                                    <p class="text">
                                        File Size : <span class="data"><?php echo $photo->size; ?></span>
                                    </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                       <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg">Delete</a> 
                                    </div>
                                    <div class="info-box-delete pull-right">
                                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg">
                                    </div>
                                </div>
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

    <?php include ("includes/footer.php"); ?>