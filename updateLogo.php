<div id="min-height" class="container-fluid" style="padding:30px">
    <div class='card'>
        <div class="card-body">
    
            <form action="<?=base_url()?>AdminPanel/update_logo_handler" method="post" enctype="multipart/form-data">
                <div class="form-group">

                    <label for="">Update Logo</label>

                    <input type="file" name='LOGO' value='<?=$LOGO?>'>
                    
                    <input type="submit" name="update" value="Update" class="btn btn-primary" >
                    
                </div>
            </form>
        </div>
    </div>
</div>