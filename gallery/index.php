
<?php include ("includes/header.php"); ?>

<?php 

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1 ;
$items_per_page = 8;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql);






 ?>


    <!-- Navigation -->
    <?php include ("includes/navigation.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                            <div class="thumbnails row">

            <?php foreach ($photos as $photo): ?>
                
                    <div class="col-xs-6 col-md-3">
                        <a class="thumbnail" href="photos.php?id=<?php echo $photo->id; ?>">
                            <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                        </a>
                    </div>

            <?php endforeach; ?>
                             </div>
                

                <div class="row col-md-offset-5">
                    <ul class="pagination">
                            


                            <?php 


                            if($paginate->has_previous()) {
                                        echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'><span class='glyphicon glyphicon-arrow-left'></span></li>";
                                    }


                               
                                    

                                    for ($i=1; $i <= $paginate->page_total() ; $i++) { 
                                        
                                        if ($i == $paginate->current_page) {
                                            echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                        } else {
                                             echo "<li class=><a href='index.php?page={$i}'>{$i}</a></li>";
                                        }

                                    }


                                     if($paginate->page_total() > 1) {
                                    if($paginate->has_next()) {
                                        echo "<li class='next'><a href='index.php?page={$paginate->next()}'><span class='glyphicon glyphicon-arrow-right'></span></a></li>";
                                    }


                          

                                    

                              

                                     
                                }

                             ?>

                             

                        
                        <!-- <li class='previous'><a href=''><span class="glyphicon glyphicon-arrow-left"></span> Previous</a></li> -->
                    </ul>
                </div>


            </div>

            <!-- Blog Sidebar Widgets Column -->

            <!-- <div class="col-md-4">

              <?php //include ("includes/sidebar.php"); ?>

            </div> -->

        </div>



        <!-- /.row -->
<?php include ("includes/footer.php"); ?>