 
    <div class="all-content-wrapper">
        <div id = "min-height" class="container-fluid" style="padding:30px">

            <div class="card" style="padding: 20px;">
            <div class="card-header">
                <h1>UPDATE ROLL NO</h1>
            </div>
            <div class="card-body">
            <br><br>
            <form  id="update-application" action="" class="row" method="post" enctype="multipart/form-data">
                <div class="row ">
                    <div class="col-md-4">
                        <label for="" style="font-size:17px">CNIC<span class="text-danger">* (with out dashes)</span> <span style="font-size:12px" id="msg" style="display:none;"></label>
                        <input type="text" class="form-control mb-3" id="cnic" name="cnic" placeholder="CNIC or Form-B(xxxxxxxxxxxxx)">
                    </div>
                    <div class="col-md-2 top-margin"><br>
                        <button class="btn btn-success" id="search_btn">Search</button>
                    </div>

                </div>
                <br>
                <div class="row">
					<div class="col-md-4">    
                        <label for="" style="font-size:17px">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-3" id="full_name" name="full_name" data-toggle="tooltip" title="Full Name" placeholder="Full Name" readonly>
                    </div>
                    <input type="hidden" class="form-control mb-3" id="APP_ID" name="APP_ID" value="0" data-toggle="tooltip">
                        
					<div class="col-md-4">
                        <label for="" style="font-size:17px">Father Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-3" id="father_name" name="father_name" data-toggle="tooltip" title="Father Name" readonly placeholder="Father Name">
                    </div>
                    <div class="col-md-4">
                        <label for="" style="font-size:17px">Surname / Cast<span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-3" id="surname" name="surname" data-toggle="tooltip" readonly title="Surname/Cast/Family Name" placeholder="Surname/Cast/Family Name">
                    </div>
                    
				</div>
				
				</br><hr>
				
				<div class="row">
				    <div class="col-md-4">
                        <label for="" style="font-size:17px">Roll No<span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-3" id="roll_no" name="roll_no" data-toggle="tooltip"  placeholder="">
                </div>
				    
				   
                    <div class="col-md-2 top-margin"><br>
                        <button class="btn btn-success"  id="update_btn">Update</button>
                    </div>
				</div>
                
                </form>
                </div>

<!--                Class Loader Image-->
                <div class="col-md-6">
                    <div id="loading_img">
                        <img src="../includes/assets/img/ajax-loader.gif" width="70px" height="70px" alt="Loading Please Wait">
                    </div>
                </div>
            </div>
        </div>
        
    </div>


<script>
    $('#loading_img').hide();
    
    $("#search_btn").click(function (event) {
	event.preventDefault();
	//let searchBy = $("#searchBy").val();
	let search = $.trim($("#cnic").val());
	
	getPeople("cnic",search);
});

function getPeople (searchBy,search) {
    let big_error = "";
	let error="";
	if(search == "" || search == null){
		big_error+= "<div class='text-danger'>Please Enter CNIC No before proceeding further.</div>";
	}
	if(big_error!==""){
        $("#msg").show();
        $("#msg").html(big_error);
		return;
	}
	$('.preloader').fadeIn(700);	 
	let action = "Search_User";
	
	$.ajax({
		method: "POST",
		url: "../view/ajax_get.php",
		data: {searchBy:searchBy,search:search,action:action},
		dataType: 'json',
		cache: false,
		async: false,
		success: function(data){
		    $("#msg").hide();
			//console.log(data);
			//getCollege(data.COLLEGE_ID);
			
		
			
				if(data.FIRST_NAME !=""){
					//alert(v);
					$("#full_name").val(data.FIRST_NAME);
				}
				
				if(data.APP_ID !=""){
					$("#APP_ID").val(data.APP_ID);
				}
				
				if(data.ROLL_NO !=""){
					$("#roll_no").val(data.ROLL_NO);
				}

				if(data.LAST_NAME !=""){
					$("#surname").val(data.LAST_NAME);
				}
				
				if(data.FNAME !=""){
					$("#father_name").val(data.FNAME);
				}			
			
			
			
		},
		beforeSend:function (data, status) {
			$('.preloader').fadeOut(700);
		},
		error:function (data, status) {
			setNull();
			$("#register").prop("disabled", false);
			$('.preloader').fadeOut(700);
			alert_msg("<div class='text-danger'>"+data.responseText+"</div>","MESSAGE");
		},
	});

}



function setNull() {
      $('#full_name').val(null);
      $('#cnic').val(null);
      $('#APP_ID').val(null);
      $('#father_name').val(null);
      $('#surname').val(null);
      $('#roll_no').val(null);
      
  }


//update code
  $("#update_btn").click(function (event) {
		//stop submit the form, we will post it manually.
      event.preventDefault();

	
      let big_error = "";
      let error="";
	  
	  
	  let app_id = $("#APP_ID").val();
	  let roll_no = $("#roll_no").val();
      
      if(roll_no==''){
          big_error+= "<div class='text-danger'>Please enter Roll No.</div>";;
      }
      
      if(app_id==0){
          big_error+= "<div class='text-danger'>please search candidate again with correct cnic.</div>";;
      }
			  
	 
	  
      if(big_error!==""){
          alert_msg(big_error);
          return;
      }
	  
      var form = $('#update-application')[0];

      // Create an FormData object
      var data = new FormData(form);

      $('.preloader').fadeIn(700);
      // disabled the submit button
      $("#update_btn").prop("disabled", true);
      //data.set('mobile',code+mobile);
      data.append("action", "update_roll_no");
      jQuery.ajax({
          url: "../ajax/update_application.php",
          type: "POST",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          data: data,
          success: function (data, status) {
           //   console.log(data);
              $('.preloader').fadeOut(700);
              $("#update_btn").prop("disabled", false);
              setNull();
              alert_msg("<div class='text-success'>"+data+"</div>","SUCCESS");

          },
          beforeSend:function (data, status) {
              $('.preloader').fadeIn(700);

          },
          error:function (data, status) {
              //console.log(data);
              $("#update_btn").prop("disabled", false);
              $('.preloader').fadeOut(700);
              alert_msg("<div class='text-danger'>"+data.responseText+"</div>","ERROR");
          },
      });
  });



</script>

