
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Modify Board</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" action="<?=base_url()?>board/modify/<?=$result['bid']?>" method="post" role="form">

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="Name" value="<?=$result['bname']?>">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="Desc" value="<?=$result['bdesc']?>">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Public</label>
          <div class="col-sm-8">
            <label><input type="checkbox" class="input-md" name="Public" <?php if($result['public']== '1') echo "checked";  ?>></label>
          </div>
       </div>

       <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">CreateTime</label>
          <fieldset disabled>
          <div class="col-sm-8">
            <label><input type="text" class="input-lg form-control " name="CreateTime" placeholder="<?=$result['timestamp']?>"></label>
          </div>
          </fieldset>
       </div>

      </div>

      <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-3 col-sm-offset-6">
            <button type="button" class="btn btn-lg btn-danger" onclick="delete_board('<?=$result['bid']?>')">Delete</button>
          </div>
          <div class="col-sm-2">
            <button type="submit" class="btn btn-lg btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->