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





  <div id="min-height" class="container-fluid" padding="30px">


    <div class="content">
      <div class="card pt-2">
        <div class="card-header ">
          <h2 style=" text-align:center; ">Update Faculty Member Data</h2>
        </div>
        <form method="post" enctype="multipart/form-data">

          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
              <div style="margin-top:15px; ">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
              
              </div>
            </div>



            <div class="col-md-4">
              <div style="margin-top:15px; ">
                <label for="exampleInputPassword1" class="form-label">Department Name</label>
                <select class="form-control" name="departmentID">
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
                <input type="text" class="form-control" name="designation" aria-describedby="emailHelp">

              </div>
            </div>

            
            <div class="col-md-4">
              <div style="margin-top:15px; ">
                <label for="exampleInputPassword1" class="form-label">Extra Charge</label>
                <input type="text" class="form-control" name="extra_charge">
              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <div style="margin-top:15px; ">
              <label for="exampleInputPassword1" class="form-label">IMAGE</label>
              <input type="file" class="form-control" name="image" height="400px" width="400px">
            </div>
          </div>
          <div class="col-md-4"></div>
      </div><br>
  


      <div class="row" style="margin-left:30%; padding:20px;">
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary" name="insert">Submit</button>
        </div>
      </div>

    </div>

  </div>
  </div>
  
  </form>
