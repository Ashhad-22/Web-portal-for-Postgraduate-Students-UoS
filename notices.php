
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Insert Logo </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>

  <div id="min-height" class="container-fluid" padding="20px">
    <div class="card">
      <div class="card-body">

      <form method="post" enctype="multipart/form-data">
        <div class="card-header">
          <h2 style="padding-top:10px; text-align:center; ">Notices </h2>
        </div><br>

        <div class="form-group">
          <label for="desc">Description</label><br>
          <textarea name="description" rows="7" style="border: 1px solid;"></textarea><br>

          <label for="image" class="form-label">Pdf</label><br>
          <input type="file" class="form-control" name="LOGO" style="border: 1px solid;"> <br>

        </div>
        <div class='row'>
          <div class='col-md-3'></div>
             <div class='col-md-6'>
              <button type="submit" class="btn btn-primary btn-lg btn-block" name="insert">Submit</button>
             </div>
             <div class='col-md-3'></div>
      </div>
       </form> 
      
            </div>
          </div>
      </div>