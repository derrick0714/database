
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Pin a Picture From URL</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" action="<?=base_url()."pin/create"?>" method="post" role="form">

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Where</label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="url" placeholder="Url"
            <?php
              if($repin==true)
                echo "value='".$pic_url."'";
            ?>
            >
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" >Description </label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="desc" placeholder="Description">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label"> Board </label>
          <div class="col-sm-8">
            <select class="form-control" name='board'>
            <?php
              foreach ($board_result->result() as $row)
              {
                echo "<option value= '".$row->bid."'>".$row->bname."</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" >Split by space</label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="tags" placeholder="Tags">
          </div>
        </div>

      </div>
       <input type="hidden" class="form-control input-lg" name="pid" value=<?=$pid?> >
        <input type="hidden" class="form-control input-lg" name="repin" value=<?=$repin?>>
      <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-2 col-sm-offset-9">
            <button type="submit" class="btn btn-lg btn-primary">Pin it</button>
          </div>
        </div>
      </form>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->