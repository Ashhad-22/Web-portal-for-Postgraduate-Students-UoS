<?php
//print_r($depts);
//exit();
?>



<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add Faculty Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>


<div id="min-height" class="container-fluid">


  <div class="content">
    <div class="card" style="padding:30px;">
      <div class="card-header ">
        <h2 style=" text-align:center; ">Add Faculty Member</h2>
      </div><br>
      <form method="post" enctype="multipart/form-data">

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <div style="margin-top:15px; ">
              <label for="exampleInputEmail1" class="form-label">Teacher Name</label>
              <input type="text" class="form-control" name="name" aria-describedby="emailHelp" style="border: 1px solid;" >

            </div>
          </div>


          <div class="col-md-4">
            <div style="margin-top:15px; ">
              <label for="exampleInputPassword1" class="form-label">Name of Centre</label>
              <select style="border: 1px solid;" class="form-control" name="departmentID" >
                <?php
                foreach ($depts as $dept) {
                  echo "<option value={$dept['id']}>{$dept['department']}</option>";
                }
                ?>
              </select>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <div style="margin-top:15px; ">
              <label for="exampleInputEmail1" class="form-label">Designation</label>
              <input type="text" class="form-control" name="designation" aria-describedby="emailHelp" style="border: 1px solid;">

            </div>
          </div>


          <div class="col-md-4">
            <div style="margin-top:15px; ">
              <label for="exampleInputPassword1" class="form-label">Additional Charge</label>
              <input type="text" class="form-control" name="extra_charge" style="border: 1px solid;">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <div style="margin-top:15px; ">
              <label for="exampleInputPassword1" class="form-label">Image</label>
              <input type="file" class="form-control" name="image" height="400px" width="400px" style="border: 1px solid;">
            </div>
          </div>
          <div class="col-md-4">
            <label for="exampleInputPassword1" class="form-label">Education</label>
            <input type="text" class="form-control" name="education" style="border: 1px solid;">
          </div>
        </div><br>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <div style="margin-top:15px; ">
              <label for="exampleInputPassword1" class="form-label">Position Held</label>
              <input type="text" class="form-control" name="position" style="border: 1px solid;">
            </div>
          </div>
          <div class="col-md-4">
            <label for="exampleInputPassword1" class="form-label">Administrative Experience</label>
            <input type="text" class="form-control" name="experience" style="border: 1px solid;">
          </div>
        </div>





        <div class="row" style="padding:20px;">
          <div class="col-md-3"></div>
          <div class="col-md-5">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="insert">Submit</button>
          </div>

          <div class="col-md-4"></div>
        </div>

    </div>

  </div>
</div>

</form>