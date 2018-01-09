<?php require_once("includes/init.php"); ?>

<?php 

$photos = Photo::find_all();

 ?>

<div class="modal fade" id="photo-library">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Gallery System Library</h4>
      </div>
      <div class="modal-body">
        <div class="thumbnail row">
            <?php foreach ($photos as $photo): ?>
              <div class="col-xs-2">
                 <a role="chekbox" aria-checked="false" tabindex="0" id="" href="" class="thumbnail">
                   <img class="modal_thumbnail img-responsive photto" src="<?php echo $photo->picture_path(); ?>" data="" alt="">
                 </a>
                 <div class="photo-id hidden"></div>
              </div>
            <?php endforeach; ?>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>