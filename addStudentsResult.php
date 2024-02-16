<div id="min-height" style="padding: 20px;">
    <div class="card"  style='padding:30px;'>
        <div class="card-header">
            <h2 style="text-align: center">Add Students Result</h2>
        </div>
        <form method="post" action="<?=base_url() ?>AdminPanel/addStudentsResult" enctype="multipart/form-data">

            <div class="card-body">

                <label for="batch">Batch</label>
                <select style="border: 1px solid;" class="form-control" name="BATCH">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>

                <br> <br>

                <label for="">Subject</label>
                <input type="text" class="form-control" name="SUBJECT" style="border: 1px solid;">

                <br>

                <label for="">Exam Type</label>
                <select style="border: 1px solid;" class="form-control" name="EXAMS" id="">
                    <option value="Regular">Regular</option>
                    <option value="Improver">Improver/Failure</option>
                </select>

                <br> <br>
            </div>
                    <div class='row'>
          <div class='col-md-3'></div>
             <div class='col-md-6'>
              <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" >Submit</button>
             </div>
             <div class='col-md-3'></div>
         </div>
</form>

    </div>
</div>