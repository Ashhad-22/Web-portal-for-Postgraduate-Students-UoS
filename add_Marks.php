<div id="min-height" class="container-fluid" style="padding:30px">
    <form method="post" action="<?= base_url() ?>AdminPanel/add_marks_handler" enctype="multipart/form-data">


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

        <div class="row">

            <div class="col-md-3">
                <label for="FET">Name of Centre</label>
                <select style="border: 1px solid;" class="form-control" name="DEPT_ID">
                    <?php
                    foreach ($depts as $dept) {
                        echo "<option value={$dept['id']}>{$dept['department']}</option>";
                        // echo "<option value={$dept['id']}>{$dept['id']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-3">
                <label for="PROGRAM">Programs</label>
                <select style="border: 1px solid;" class="form-control" name="PROG_ID">
                    <?php
                    foreach ($programs as $program) {
                        echo "<option value={$program['PROGRAM_ID']}>{$program['PROGRAM_NAME']}</option>";
                        // echo "<option value={$program['PROGRAM_ID']}>{$program['PROGRAM_ID']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- <div class="col-md-3">
                <button class="btn btn-primary btn-sm" style="margin-top: 30px;" type="submit" name="search" id="searchRecord">Search Record</button>
            </div> -->

        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="YEAR">Exam Year</label>
                <select style="border: 1px solid;" class="form-control" name="EXAM_YEAR">
                    <?php
                    foreach ($years as $year) {
                        echo "<option value={$year['YEAR']}>{$year['REMARKS']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="BATCH_YEAR">Batch Year</label>
                <select style="border: 1px solid;" class="form-control" name="BATCH_YEAR">
                    <?php
                    foreach ($years as $year) {
                        echo "<option value={$year['YEAR']}>{$year['REMARKS']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="PART">Part</label>
                <select style="border: 1px solid;" class="form-control" name="PART">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="PART">Semester</label>
                <select style="border: 1px solid;" class="form-control" name="SEMESTER">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="EXAM">Exam Type</label>
                <select style="border: 1px solid;" class="form-control" name="EXAM">
                    <option value="Regular">Regular</option>
                    <option value="Improver">Improver/Failure</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="COURSE">Course</label>
                <select style="border: 1px solid;" class="form-control" name="COURSE_ID">
                    <?php
                    foreach ($courses as $course) {
                        echo "<option value={$course['COURSE_ID']}>{$course['COURSE_NAME']}</option>";
                    }
                    ?>
                </select>
            </div>

        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Discipline</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                    foreach ($record as $row) { ?>

                        <td><input type="text" name="STUDENT_ROLL_NO[]" readonly value="<?= $row['STUDENT_ROLL_NO']; ?>" class="form-control" style="border: 1px solid;"> </td>
                        <td><input type="text" name="STUDENT_NAME[]" readonly value="<?= $row['STUDENT_NAME']; ?>" class="form-control" style="border: 1px solid;"></td>
                        <td><input type="text" name="DISCIPLINE[]" readonly value="<?= $row['DISCIPLINE']; ?>" class="form-control" style="border: 1px solid;"></td>
                        <td><input type="text" name="MARKS[]" class="form-control" style="border: 1px solid;"></td>

                </tr>
            <?php } ?>

            <td></td>
            <td colspan='2'><button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button></td>
            <td></td>

            </tbody>
        </table>
        <!-- <div id="displayData"></div> -->

    </form>
</div>

<!-- <?php include('ajax.js'); ?> -->