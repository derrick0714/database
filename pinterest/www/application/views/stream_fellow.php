
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Put this Board to a Stream</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" action="<?=base_url()."fellow/add"?>" method="post" role="form">

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label"> Stream </label>
          <div class="col-sm-8">
            <select class="form-control" name='sid'>
            <?php
              foreach ($stream_result->result() as $row)
              {
                echo "<option value= '".$row->sid."'>".$row->sname."</option>";
              }
              ?>
            </select>
          </div>
        </div>

      </div>
       <input type="hidden" class="form-control input-lg" name="bid" value=<?=$bid?> >
      <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-2 col-sm-offset-9">
            <button type="submit" class="btn btn-lg btn-primary">Fellow it</button>
          </div>
        </div>
      </form>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->