<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Bootstrap demo</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
			crossorigin="anonymous"
		/>
	</head>

    <div id="min-height" class="container-fluid" padding="30px">
	

    <div class="content" style="margin-left:15%; ">
        <div class="card">
            <div class="card-header">
            <h2 style="padding-top:5px; text-align:center; ">Add Program</h2>
            </div>
      <form method = "post" enctype="multipart/form-data">

      <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-4">
                            <div style="margin-top:15px; ">
    <label for="exampleInputEmail1" class="form-label">Program Name</label>
    <input type="text" class="form-control" name="name"  aria-describedby="emailHelp">
    
  </div>
  </div>


    
       
      <div class="row" style="margin-left:30%;">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
  <button type="submit" class="btn btn-primary" name="insert">Submit</button>
</div>

</div>

</form>

</html>
