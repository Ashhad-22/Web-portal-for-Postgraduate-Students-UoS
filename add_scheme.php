<br><br>


<div id="min-height" class="container-fluid" style="padding:30px" ng-app="myApp" ng-controller="myCtrl">

  <div class="row">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-8">
            <button ng-click="ShowHide()" class="btn btn-info">Add Scheme</button>
            <button ng-click="ShowHideSchemeDetail()" class="btn btn-info">Add Scheme Detail</button>
          </div>
        </div>
    </section>
  </div>



  <?= form_open(base_url() . 'AdminPanel/add_scheme_handler') ?>
  <!-- <form method="post" enctype="multipart/form-data"> -->
  <div class="content" id="scheme-form" style='display:none'>
    <div class="card" style="padding:30px;">
      <div class="card-header">
        <h2 style=" text-align:center; ">Add Scheme</h2>
      </div><br>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <div style="margin-top:15px; ">
            <label for="exampleInputEmail1" class="form-label">Name of Centre</label>
            <select style="border: 1px solid;" class="form-control" name="DEPT_ID">
              <?php
              foreach ($depts as $dept) {
                echo "<option value={$dept['id']}>{$dept['department']}</option>";
              }
              ?>
            </select>

          </div>
        </div>

        <div class="col-md-4">
          <div style="margin-top:15px; ">
            <label for="exampleInputPassword1" class="form-label">Select Program</label>
            <select style="border: 1px solid;" class="form-control" name="PROG_ID">
              <?php
              foreach ($programs as $program) {
                echo "<option value={$program['PROGRAM_ID']}>{$program['PROGRAM_NAME']}</option>";
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
            <label for="YEAR" class="form-label">Select Year</label>
            <select style="border: 1px solid;" class="form-control" name="YEAR" id="YEAR">

              <option value="2017">2017</option>;
              <option value="2018">2018</option>;
              <option value="2019">2019</option>;
              <option value="2020">2020</option>;
              <option value="2021">2021</option>;
              <option value="2022">2022</option>;

            </select>

          </div>
        </div>

        <div class="col-md-4">
          <div style="margin-top:15px;">
            <label for="exampleInputPassword1" class="form-label">Remarks</label>
            <input type="text" name="REMARKS" class="form-control" style="border: 1px solid;">
          </div>
        </div>
        
        <br>

      </div>

      <div class="row">
      <div class="col-md-1"></div>
        <div class="col-md-4" style="margin-top:15px;">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="insert">Submit</button>
        </div>

      </div>
    </div>
  </div>
  <?= form_close() ?>
  <!-- </form> -->

  <div class="card" id="scheme-detail-form" style='display:none' style="padding: 50px;">
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

  <script>
    angular.module('myApp', [])
      .controller('myCtrl', ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {

        $scope.IsVisible = false;

        $scope.ShowHide = function() {
          if ($('#scheme-form').is(':visible')) {
            $("#scheme-form").slideUp(1000, function() {});
          } else {
            $("#scheme-form").slideDown(1000, function() {});
          }

          if ($('#scheme-detail-form').is(':visible')) {
            $("#scheme-detail-form").slideUp(1000, function() {});
          }

        }



        $scope.ShowHideSchemeDetail = function() {

          if ($('#scheme-detail-form').is(':visible')) {
            $("#scheme-detail-form").slideUp(1000, function() {});
          } else {
            $("#scheme-detail-form").slideDown(1000, function() {});
          }

          if ($('#scheme-form').is(':visible')) {
            $("#scheme-form").slideUp(1000, function() {});
          }

        }
      }]);
  </script>