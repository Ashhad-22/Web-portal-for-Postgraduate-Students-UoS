<div id="min-height" class="container-fluid" style="padding:30px">

  <div class="card" style="padding: 50px;">
    <div class="card-header text-center">
      <h1>ADD SCHEME DETAIL</h1>
    </div>

    <?php if ($this->session->flashdata('msg')) { ?>
      <div class="row">
        <div class="col-md-3">
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong><?= $this->session->flashdata('msg') ?> </strong>
          </div>
        </div>
      </div>
    <?php
      unset($_SESSION['msg']);
    } ?>

    <div class="card-body">
      <br><br>

      <?= form_open(base_url() . 'AdminPanel/add_scheme_detail_handler') ?>

      <div class="row">
        <div class="col-md-6">

          <label for="SCHEME_ID" style="font-size:17px">Select Scheme</label>
          <select style="border: 1px solid;" class="form-control" name="SCHEME_ID" id="SCHEME_ID">
            <?php
            foreach ($schemes as $scheme) {
              echo "<option value={$scheme['SCHEME_ID']}>{$scheme['REMARKS']}</option>";
            }
            ?>
          </select>
        </div>

        <!-- <div class="col-md-4">

          <label for="PART" style="font-size:17px">Part</label>
          <select class="form-control" name="PART" id="PART">

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>

          </select>
        </div> -->

        <div class="col-md-6">
          <label for="SEMESTER" style="font-size:17px">Semester</label>
          <select style="border: 1px solid;" class="form-control" name="SEMESTER" id="SEMESTER">

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>

          </select>
        </div>
      </div>
      <br>

          <div class="row ">
        <div class="col-md-4">

          <label for="COURSE_CODE" style="font-size:17px">Course Code</label>
          <input type="text" class="form-control" name="COURSE_CODE" style="border: 1px solid;">

        </div>


        <div class="col-md-4">

          <label for="COURSE_TITLE" style="font-size:17px">Course Title</label>
          <input type="text" class="form-control" name="COURSE_TITLE" style="border: 1px solid;">
        </div>

        <div class="col-md-4">

          <label for="CR_HRS" style="font-size:17px">Credit Hours</label>
          <input type="text" class="form-control" name="CR_HRS" style="border: 1px solid;">
        </div>

      </div>
      <br>

      <div class="row ">
        <!-- <div class="col-md-4">

          <label for="REMARKS" style="font-size:17px">Remarks</label>
          <input type="text" class="form-control" name="REMARKS">
        </div> -->

        <div class="col-md-4">

          <label for="COURSE_DESCRIPTION" style="font-size:17px">Course Description</label>
          <input type="text" class="form-control" name="COURSE_DESCRIPTION" style="border: 1px solid;">
        </div>


        <div class="col-md-4">

          <label for="MAX_MARKS" style="font-size:17px">Max Marks</label>
          <input type="text" class="form-control" name="MAX_MARKS" style="border: 1px solid;">

        </div>
      </div><br>


      <div class="col-md-3"></div>
      <div class="col-md-5">
        <button type="submit" class="btn btn-primary btn-lg btn-block" id="update_btn" name="insert">Submit</button>
      </div>
      <div class="col-md-4"></div>
    </div>

    <?= form_close() ?>
  </div>

</div>