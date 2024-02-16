<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Insert Logo </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>

  <div id="min-height" class="container-fluid" padding="20px">
    <div class='card'>
        <div class="card-body">

        <form method="post" enctype="multipart/form-data">
        <div class="card-header">
          <h2 style="padding-top:10px; text-align:center; ">Add Programs Details </h2>
        </div><br>
          <div class="form-group">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
              <label for="title">Program</label><br>
              <input type="text" name="program" class="form-control" style="border: 1px solid;"></div>

              <div class="col-md-4">
              <label for="title">Duration</label><br>
              <input type="text" name="duration" class="form-control" style="border: 1px solid;"></div>

              <div class="col-md-2"></div>
              </div>

              <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-4">
              <label for="title">Semester</label><br>
              <input type="text" name="semester" class="form-control" style="border: 1px solid;"></div>
            


              <div class="col-md-4">
              <label for="title">Credit Hours </label><br>
              <input type="text" name="credits" class="form-control" style="border: 1px solid;"></div>
              <div class="col-md-2"></div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
              <label for="title">Program Description</label><br>
              <textarea name="pdescription" cols="5" rows="5" style="border: 1px solid;"></textarea></div>
              <div class="col-md-2"></div>

            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
              <label for="preq">Prerequisite</label>
              <textarea name="prerequsite" rows="5" cols="5" style="border: 1px solid;"></textarea><br>
            </div>
            <div class="col-md-2"></div>
            </div>
            
            <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-8">
              <button type="submit" class="btn btn-primary btn-lg btn-block" name="insert">Submit</button>
             </div>
             <div class="col-md-2"></div>

      </div>
</div>
</form>
              </div>

            </div>

          </div>
      