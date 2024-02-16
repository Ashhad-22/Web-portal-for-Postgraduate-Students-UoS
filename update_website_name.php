<div id="min-height" class="container-fluid" style="padding:30px">
    <div class='card'>
        <div class="card-body">
            <?php if($this->session->flashdata('msg')) { ?>
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong><?= $this->session->flashdata('msg') ?> </strong>
            
                <?php
            unset($_SESSION['msg']);
                } ?>
            </div>
           
            <form action="<?=base_url()?>AdminPanel/updateWebsiteName" method="post">
                <div class="form-group">
                    <label>Website Name</label>
                    
                    <textarea name="website_name" id="" cols="30" rows="10" style="border: 1px solid;"><?=$WEBSITE_NAME?></textarea>
                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg btn-block" >
                </div>
            </form>
        </div>
    </div>
</div>