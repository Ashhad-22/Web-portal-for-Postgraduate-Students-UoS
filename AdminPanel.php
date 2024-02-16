<?php

defined('BASEPATH') or exit('No direct script access allowed');

require "AdminAuthentication.php";
require  'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminPanel extends AdminAuthentication
{
    private $script_name = "";
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('excel');
    }
    public function dashboard()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/dashboard", $data);
    }

    public function add_faculty()
    {
        $data['side_bar_values'] = $this->side_bar_values;

        $depts = $this->main_model->getAllDepartments();
        $data['depts'] = $depts;

        $this->view("admin/add_faculty", $data);
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('departmentID', 'departmentID', 'required');
        $this->form_validation->set_rules('designation', 'designation', 'required');
        $this->form_validation->set_rules('extra_charge', 'extra_charge', 'required');
        $this->form_validation->set_rules('position_held', 'position_held', 'required');
        $this->form_validation->set_rules('extra_charge', 'extra_charge', 'required');
        $this->form_validation->set_rules('administrative_experience', 'experience', 'required');
        

        if ($this->form_validation->run()) {

            $fm_id = 0;

            //$re = $this->upload_image("image","profile");
            // prePrint($re);
            $data = [
                'name' => $this->input->post('name'),
                'dept_id' => $this->input->post('departmentID'),
                'designation' => $this->input->post('designation'),
                'extra_charge' => $this->input->post('extra_charge'),
                'education' => $this->input->post('education'),
                'position_held' => $this->input->post('position'),
                'administrative_experience' => $this->input->post('experience')
            ];

            $this->load->model('Main_model');

            $fm_id = $this->Main_model->insertFacultyData($data);

            if ($fm_id > 0) {
                $re = $this->upload_image("image", $fm_id);
                $path = './uploads/';
                $db = $path . $re['IMAGE_NAME'];

                $imgPath = [
                    'image' => $db,
                ];
                $this->Main_model->updateFacultyData($imgPath, $fm_id);

                echo "Data inserted successfully";
            } else {
                echo "Error";
            }
        }
    }

    public function update_faculty_data()
    {

        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/update_faculty_data", $data);
    }

    public function displayPrograms()
    {
        $this->load->view('admin/displayPrograms');
    }

    public function add_programs_details(){
        $data['side_bar_values'] = $this->side_bar_values;
       
        $this->view("admin/add_programs_details",$data);

        $this->form_validation->set_rules('program', 'Program', 'required');
        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('credits', 'Credits', 'required');
        $this->form_validation->set_rules('pdescription', 'Description', 'required');
        $this->form_validation->set_rules('prerequsite', 'Pre Requisite', 'required');

        if ($this->form_validation->run()) {

            $data = [
                'PROGRAM' => $this->input->post('program'),
                'DURATION' => $this->input->post('duration'),
                'SEMESTER' => $this->input->post('semester'),
                'CREDIT_HOURS' => $this->input->post('credits'),
                'PROGRAM_DESC' => $this->input->post('pdescription'),
                'PREREQUISITE' => $this->input->post('prerequsite'),    
            ];

            $this->main_model->insertProgramsData($data);  
           
        }

    }

    public function add_scheme()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        
        $schemes = $this->main_model->getSchemeDetail();
        $data['schemes'] = $schemes;

        $depts = $this->main_model->getAllDepartments();
        $data['depts'] = $depts;

        $programs = $this->main_model->getAllPrograms();
        $data['programs'] = $programs;

        $this->view("admin/add_scheme", $data);
    }

    public function add_scheme_handler()
    {

        $this->form_validation->set_rules('DEPT_ID', 'DEPT_ID', 'required');
        $this->form_validation->set_rules('PROG_ID', 'PROG_ID', 'required');
        $this->form_validation->set_rules('YEAR', 'YEAR', 'required');
        $this->form_validation->set_rules('REMARKS', 'REMARKS', 'required');

        if ($this->form_validation->run()) {

            $data = [
                'DEPT_ID' => $this->input->post('DEPT_ID'),
                'PROG_ID' => $this->input->post('PROG_ID'),
                'YEAR' => $this->input->post('YEAR'),
                'REMARKS' => $this->input->post('REMARKS'),
                'ACTIVE' => '1',        
            ];

            // $this->load->model('Main_model');
            $query = $this->main_model->insertSchemeData($data);
            if($query){
                $this->session->set_flashdata('msg', 'Scheme added successfully');
                redirect('AdminPanel/add_scheme');
            }
        }
    }
    
    public function add_scheme_detail()
    {
        $data['side_bar_values'] = $this->side_bar_values;

        $schemes = $this->main_model->getSchemeDetail();

        $data['schemes'] = $schemes;

        $depts = $this->main_model->getAllDepartments();

        $data['depts'] = $depts;

        $programs = $this->main_model->getAllPrograms();

        $data['programs'] = $programs;

        $this->view("admin/add_scheme_detail", $data);
    }

    public function add_scheme_detail_handler()
    {

        $this->form_validation->set_rules('SCHEME_ID', 'SCHEME_ID', 'required');
        // $this->form_validation->set_rules('PART', 'PART', 'required');
        $this->form_validation->set_rules('SEMESTER', 'SEMESTER', 'required');
        // $this->form_validation->set_rules('DEPT_ID', 'DEPT_ID', 'required');
        // $this->form_validation->set_rules('PROG_ID', 'PROG_ID', 'required');
        // $this->form_validation->set_rules('YEAR', 'YEAR', 'required');
        $this->form_validation->set_rules('COURSE_CODE', 'COURSE_CODE', 'required');
        $this->form_validation->set_rules('COURSE_TITLE', 'COURSE_TITLE', 'required');
        $this->form_validation->set_rules('CR_HRS', 'CR_HRS', 'required');
        $this->form_validation->set_rules('COURSE_DESCRIPTION', 'Description', 'required');
        $this->form_validation->set_rules('MAX_MARKS', 'MAX_MARKS', 'required');

        if ($this->form_validation->run()) {

            $data = [
                'SCHEME_ID' => $this->input->post('SCHEME_ID'),
                // 'PART' => $this->input->post('PART'),
                'SEMESTER' => $this->input->post('SEMESTER'),
                // 'DEPT_ID' => $this->input->post('DEPT_ID'),
                // 'PROG_ID' => $this->input->post('PROG_ID'),
                // 'YEAR' => $this->input->post('YEAR'),
                'COURSE_CODE' => $this->input->post('COURSE_CODE'),
                'COURSE_TITLE' => $this->input->post('COURSE_TITLE'),
                'CR_HRS' => $this->input->post('CR_HRS'),
                // 'REMARKS' => $this->input->post('REMARKS'),
                'COURSE_DESCRIPTION' => $this->input->post('COURSE_DESCRIPTION'),
                'MAX_MARKS' => $this->input->post('MAX_MARKS'),  

            ];

            $res = $this->main_model->insertSchemeDetail($data);

            if ($res) {
                // $this->add_scheme_detail();
                // echo "Data inserted";
                $this->session->set_flashdata('msg', 'Scheme added successfully');
                redirect('AdminPanel/add_scheme_detail');
            }
            else{
                echo "Data not inserted";
            }
        }
    }

    public function update_website_name()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/update_website_name", $data);
    }

    public function updateWebsiteName()
    {

        $description = $this->input->post('website_name');
        $this->Configuration_model->updateConfiguration('WEBSITE_NAME', $description);

        if ($description) {
            $this->session->set_flashdata('msg', 'Website Name Updated Successfully');
            redirect('AdminPanel/update_website_name');
            // echo '<div class="alert alert-success">Website name updated successfully</div>';
        }
    }

    public function updateAboutPage()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/update_about_page", $data);
    }

    public function update_about_handler()
    {
        $description = $this->input->post('about_page');
        $this->Configuration_model->updateConfiguration('ABOUT', $description);

        if ($description) {
            echo '<div class="alert alert-success">Data updated successfully</div>';
        }
    }

    public function updateMission()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/update_mission", $data);
    }

    public function update_mission_handler()
    {
        $description = $this->input->post('mission');
        $this->Configuration_model->updateConfiguration('MISSION', $description);

        if ($description) {
            echo '<div class="alert alert-success">Data updated successfully</div>';
        }
    }

    public function updatedirectorMessage()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/update_director_message", $data);
    }

    public function update_directorMessage_handler()
    {
        $description = $this->input->post('director_message');
        $this->Configuration_model->updateConfiguration('DIRECTOR_MESSAGE', $description);

        if ($description == true) {
            echo '<div class="alert alert-success">Data updated successfully</div>';
            // echo "<script type = 'text/javascript'>alert('success')</script>";
        }
    }

    public function update_email(){
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/update_email", $data);
    }


    public function update_email_handler(){
        $description = $this->input->post('email');
        $this->Configuration_model->updateConfiguration('EMAIL', $description);

        if ($description == true) {
            echo '<div class="alert alert-success">Data updated successfully</div>';
            // echo "<script type = 'text/javascript'>alert('success')</script>";
        }
    }

    public function displayNotices()
    {

        $data['side_bar_values'] = $this->side_bar_values;
        $data['notices'] = $this->main_model->getNotices();
        $this->view('admin/displayNotices', $data);
    }

    public function notices()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/notices", $data);


        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'pdf',
            'max_size' => 4000
        );
        $this->load->library('upload', $config);

        $this->form_validation->set_rules('description', 'DESCRIPTION', 'required');

        if ($this->form_validation->run()) {
            $img = "";
            //upload image
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('LOGO')) {
                echo $this->upload->display_errors();
            } else {
                $imageUpload = $this->upload->data();
                $img = $imageUpload['file_name'];
            }

            // get current date time
            $date = date('Y-m-d H:i:s');

            $data = array(
                'DESCRIPTION' => $this->input->post('description'),
                'DATE_TIME' => $date,
                'IMAGE_PATH' => $img
            );

            if ($img != "") {
                $this->main_model->addNotices($data);
            } else {
                echo "Error";
            }
        }
    }

    public function news()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/news_section", $data);


        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'png|jpg|jpeg',
            'max_size' => 4000
        );
        $this->load->library('upload', $config);

        $this->form_validation->set_rules('description', 'DESCRIPTION', 'required');

        if ($this->form_validation->run()) {
            $img = "";
            //upload image
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('LOGO')) {
                echo $this->upload->display_errors();
            } else {
                $imageUpload = $this->upload->data();
                $img = $imageUpload['file_name'];
                //   $title = $this->upload->data();


            }

            // get current date time
            $date = date('Y-m-d H:i:s');

            $data = array(
                'DESCRIPTION' => $this->input->post('description'),
                'DATE_TIME' => $date,
                'IMAGE' => $img,
                'TITLE' => $this->input->post('title')

            );

            if ($img != "") {
                $this->main_model->addNews($data);
                echo "Data inserted";
            } else {
                echo "Error";
            }
        }
    }

    public function displayNews()
    {

        $data['side_bar_values'] = $this->side_bar_values;
        $data['news'] = $this->main_model->getNews();
        $this->view('admin/displayNews', $data);
    }

    public function updateLogo()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view("admin/updateLogo", $data);
    }

    public function update_logo_handler()
    {
        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        if ($icon) {
            echo '<div class="alert alert-success">Logo updated successfully</div>';
        }
    }

    public function addStudents()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view('admin/addStudentsData', $data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $upload_status = $this->uploadDoc();
            if ($upload_status != false) {
                $inputFileName = './uploads/' . $upload_status;
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($inputFileName);
                $sheet = $spreadsheet->getSheet(0);
                $count_Rows = 0;
                foreach ($sheet->getRowIterator() as $row) {
                    $batch  = $spreadsheet->getActiveSheet()->getCell('A' . $row->getRowIndex());
                    $rollno = $spreadsheet->getActiveSheet()->getCell('B' . $row->getRowIndex());
                    $name = $spreadsheet->getActiveSheet()->getCell('C' . $row->getRowIndex());
                    $prog = $spreadsheet->getActiveSheet()->getCell('D' . $row->getRowIndex());
                    $discipline = $spreadsheet->getActiveSheet()->getCell('E' . $row->getRowIndex());
                    $phone = $spreadsheet->getActiveSheet()->getCell('F' . $row->getRowIndex());
                    $email = $spreadsheet->getActiveSheet()->getCell('G' . $row->getRowIndex());

                    $data = array(
                        'BATCH_ID' => $batch,
                        'STUDENT_ROLL_NO' => $rollno,
                        'STUDENT_NAME' => $name,
                        'PROGRAM' => $prog,
                        'DISCIPLINE' => $discipline,
                        'PHONE' => $phone,
                        'EMAIL' => $email
                    );

                    $this->main_model->uploadExcelFile($data);
                    $count_Rows++;
                }
                $this->session->set_flashdata('success', 'Successfully imported');
                // redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'File not uploaded');
                // redirect(base_url());
            }
        }
    }

    public function uploadDoc()
    {

        $uploadPath = './uploads/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, TRUE);
        }
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'csv|xlsx|xls';
        $config['max_size'] = 1000000;
        // $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('upload_file')) {
            $fileData = $this->upload->data();
            return $fileData['file_name'];
        } else {
            return false;
        }
    }

    public function addStudentsResult()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view('admin/addStudentsResult', $data);

        $this->form_validation->set_rules('BATCH', 'BATCH_ID', 'required');
        $this->form_validation->set_rules('SUBJECT', 'SUBJECT', 'required');
        $this->form_validation->set_rules('EXAMS', 'EXAM_TYPE', 'required');

        if ($this->form_validation->run()) {

            $data = [
                'BATCH_ID' => $this->input->post('BATCH'),
                'SUBJECT' => $this->input->post('SUBJECT'),
                'EXAM_TYPE' => $this->input->post('EXAMS'),

            ];

            $response = $this->main_model->insertStudentExamResult($data);
            if ($response) {
                echo "Inserted";
            } else {
                echo "Not inserted";
            }
        }
    }

    public function display_marks()
    {
        $data['side_bar_values'] = $this->side_bar_values;

        $data['record'] = $this->main_model->getStudentData();

        $depts = $this->main_model->getAllDepartments();
        $data['depts'] = $depts;

        $years = $this->main_model->getAllYears();
        $data['years'] = $years;

        $programs = $this->main_model->getAllPrograms();
        $data['programs'] = $programs;

        $courses = $this->main_model->getAllCourses();
        $data['courses'] = $courses;


        $this->view('admin/add_Marks', $data);
    }


    public function add_marks_handler()
    {

        $STUDENT_ROLL_NO = $_POST['STUDENT_ROLL_NO'];
        $STUDENT_NAME = $_POST['STUDENT_NAME'];
        $DISCIPLINE = $_POST['DISCIPLINE'];
        $EXAM_YEAR  = $_POST['EXAM_YEAR'];
        $PART = $_POST['PART'];
        $SEMESTER = $_POST['SEMESTER'];
        $EXAM_TYPE = $_POST['EXAM'];
        $batch_year = $_POST['BATCH_YEAR'];
        $program_id = $_POST['PROG_ID'];
        $COURSE = $_POST['COURSE_ID'];
        $MARKS = $_POST['MARKS'];


        for ($i = 0; $i <= count($STUDENT_ROLL_NO) - 1; $i++) {

            $data = [
                'STUDENT_ROLL_NO' => $STUDENT_ROLL_NO[$i],
                'STUDENT_NAME' => $STUDENT_NAME[$i],
                'DISCIPLINE' => $DISCIPLINE[$i],
                'EXAM_YEAR' => $EXAM_YEAR,
                'PART' => $PART,
                'SEMESTER' => $SEMESTER,
                'EXAM_TYPE' => $EXAM_TYPE,
                'BATCH_YEAR' => $batch_year,
                'PROGRAM_ID' => $program_id,
                'COURSE_ID' => $COURSE,
                'MARKS' => $MARKS[$i],

            ];

            //     echo "<pre>";
            // print_r($data);
            // exit();
            if ($MARKS[$i] > 100 || $MARKS[$i] < 0) {
                $this->session->set_flashdata('msg', 'Something went wrong');
                redirect('AdminPanel/display_marks');
            }

            $response = $this->main_model->insertStudentMarks($data);
            if ($response) {
                $flag = true;
            } else {
                $flag = false;
            }
        }

        if ($flag == true) {
            $this->session->set_flashdata('msg', 'Marks Updated Successfully');
            redirect('AdminPanel/display_marks');
        } else {
            $this->session->set_flashdata('msg', 'Something went wrong');
            redirect('AdminPanel/display_marks');
        }
    }

    public function addStudentsData()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view('admin/addStudents', $data);
    }

    public function getStudentsData()
    {
        $data['side_bar_values'] = $this->side_bar_values;
        $this->view('admin/add_marks', $data);

        $this->form_validation->set_rules('BATCH', 'BATCH_ID', 'required');
        $this->form_validation->set_rules('SUBJECT', 'SUBJECT', 'required');
        $this->form_validation->set_rules('EXAMS', 'EXAM_TYPE', 'required');

        if ($this->form_validation->run()) {

            $data = [
                'BATCH_ID' => $this->input->post('BATCH'),
                'STUDENT_ROLL_NO' => $this->input->post('SUBJECT'),
                'EXAM_TYPE' => $this->input->post('EXAMS'),

            ];

            $response = $this->main_model->insertStudentExamResult($data);
            if ($response) {
                echo "Inserted";
            } else {
                echo "Not inserted";
            }
        }
    }

    public function getStudentsMarks()
    {

        $data['side_bar_values'] = $this->side_bar_values;
        $this->view('admin/add_marks', $data);

        $this->form_validation->set_rules('BATCH', 'BATCH_ID', 'required');
        $this->form_validation->set_rules('SUBJECT', 'SUBJECT', 'required');
        $this->form_validation->set_rules('EXAMS', 'EXAM_TYPE', 'required');

        if ($this->form_validation->run()) {

            $data = [
                'BATCH_ID' => $this->input->post('BATCH'),
                'STUDENT_ROLL_NO' => $this->input->post('SUBJECT'),
                'EXAM_TYPE' => $this->input->post('EXAMS'),

            ];

            $response = $this->main_model->insertStudentExamResult($data);
            if ($response) {
                echo "Inserted";
            } else {
                echo "Not inserted";
            }
        }
    }
}
