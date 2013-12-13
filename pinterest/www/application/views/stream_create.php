  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create a Stream</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?=base_url()?>stream/create" method="post" role="form">

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control input-lg" name="Name" placeholder="Name">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-8">
              <input type="text" class="form-control input-lg" name="Desc" placeholder="Description">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="col-sm-6"></div>
            <div class="col-sm-3">
              <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
            <div class="col-sm-2">
              <button type="submit" class="btn btn-lg btn-primary">Create</button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->