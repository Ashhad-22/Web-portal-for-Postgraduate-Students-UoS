<div id="min-height" class="container-fluid" style="padding:30px">
    <div class='card'>
        <div class="card-body">
    
            <form action="<?=base_url()?>AdminPanel/update_email_handler" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                   
                    <textarea name="email" id="" cols="30" rows="10" style="border: 1px solid;"><?=$EMAIL?></textarea>
                 
                    
                </div>
                <div class='row'>
          <div class='col-md-3'></div>
             <div class='col-md-6'>
              <button type="submit" name='update' class="btn btn-primary btn-lg btn-block">Update</button>
             </div>
             <div class='col-md-3'></div>
         </div>
            </form>
        </div>
    </div>
</div>