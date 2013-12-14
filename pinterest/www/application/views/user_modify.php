
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Modify Board</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" action="<?=base_url()?>profile/modify/" method="post" role="form">

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="last_name" value="<?=$result['last_name']?>">
          </div>
        </div>

         <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="first_name" value="<?=$result['first_name']?>">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="email" disabled value="<?=$result['email']?>">
          </div>
        </div>



      </div>

      <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-lg btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->