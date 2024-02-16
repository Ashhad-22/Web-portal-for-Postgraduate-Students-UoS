<div id="min-height" class="container-fluid" style="padding:20px">
<div class="card" style='padding:30px;'>
    <div id="min-height" class="container-fluid">
        <div class="card-header">
            <h2 style="text-align: center">Add Students Data</h2>
        </div>
        <form method="post" action="<?= base_url('AdminPanel/addStudents')?>" enctype="multipart/form-data">
            <br>
            <div class="card-body">
                <label for="batch">Batch</label>
                <select style="border: 1px solid;" class="form-control">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>

                <br> <br>

                <label for="">Excel File Upload</label>
                <input type="file" class="form-control" name="upload_file" required style="border: 1px solid;">

                <br>
            </div>

        <div class='row'>
          <div class='col-md-3'></div>
             <div class='col-md-6'>
              <button type="submit" id="update_btn" name="insert" class="btn btn-primary btn-lg btn-block">Submit</button>
             </div>
             <div class='col-md-3'></div>
         </div>

            <div>
                <!-- <?php 
                if($this->session->flashdata('success')) { ?>
                <p><?=$this->session->flashdata('success')?></p>
                <?php } ?>

                <?php 
                if($this->session->flashdata('error')) { ?>
                <p><?=$this->session->flashdata('error')?></p>
                <?php } ?></div> -->

            <br>
        </form>

    </div>
</div>
                </div></div>