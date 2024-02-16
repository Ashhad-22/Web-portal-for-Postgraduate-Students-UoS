<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'BaseController.php';
// require FCPATH.'vendor/autoload.php';
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Home extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {

        // $program= $this->main_model->getPrograms();
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];
        // $program['website_name'] = $website_obj['DESCRIPTION'];

        $about_data = $this->Configuration_model->getConfiguration('ABOUT');
        $data['about'] = $about_data['DESCRIPTION'];


        $director_message = $this->Configuration_model->getConfiguration('DIRECTOR_MESSAGE');
        $data['director_message'] = $director_message['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        // print_r($data);
        // exit();

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/section', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function instituteData()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $about_data = $this->Configuration_model->getConfiguration('ABOUT');
        $data['about'] = $about_data['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/institute', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function mission()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $mission = $this->Configuration_model->getConfiguration('MISSION');
        $data['mission'] = $mission['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/mission', $data);
        $this->load->view('main_include/footer', $data);
    }


    public function insertData()
    {

        $this->load->view('main_include/insertData');


        $this->form_validation->set_rules('PROGRAM_NAME', 'PROGRAM_NAME', 'required');

        if ($this->form_validation->run()) {

            $data = ['PROGRAM_NAME' => $this->input->post('PROGRAM_NAME')];

            $this->load->model('main_model');
            $this->main_model->insertData($data);
        }
    }



    public function getfindAllData()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        // $this->load->model('Main_model');
        $data['programs'] = $this->main_model->getAllPrograms();

        $data['departments'] = $this->main_model->getAllDepartments();
        $data['year'] = $this->main_model->getYear();

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSIT', $data);
        $this->load->view("main_include/footer", $data);
    }

    public function getSoftwareData()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        // $this->load->model('Main_model');
        $data['programs'] = $this->main_model->getAllPrograms();

        $data['departments'] = $this->main_model->getAllDepartments();
        $data['year'] = $this->main_model->getYear();

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSSW', $data);
        $this->load->view("main_include/footer", $data);
    }

    public function getTelecomData()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        // $this->load->model('Main_model');
        $data['programs'] = $this->main_model->getAllPrograms();

        $data['departments'] = $this->main_model->getAllDepartments();
        $data['year'] = $this->main_model->getYear();

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSTL', $data);
        $this->load->view("main_include/footer", $data);
    }

    public function getElectronicsData()
    {


        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        // $this->load->model('Main_model');
        $data['programs'] = $this->main_model->getAllPrograms();

        $data['departments'] = $this->main_model->getAllDepartments();
        $data['year'] = $this->main_model->getYear();

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSEL', $data);
        $this->load->view("main_include/footer", $data);
    }

    public function getDataScienceData()
    {


        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        // $this->load->model('Main_model');
        $data['programs'] = $this->main_model->getAllPrograms();

        $data['departments'] = $this->main_model->getAllDepartments();
        $data['year'] = $this->main_model->getYear();

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSDataScience', $data);
        $this->load->view("main_include/footer", $data);
    }

    public function getphdITData()
    {


        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        // $this->load->model('Main_model');
        $data['programs'] = $this->main_model->getAllPrograms();

        $data['departments'] = $this->main_model->getAllDepartments();
        $data['year'] = $this->main_model->getYear();

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/phdIT', $data);
        $this->load->view("main_include/footer", $data);
    }


    public function displayData()
    {

        // $this->load->model('Main_model');
        $data['programs'] = $this->main_model->fetchData();
        $this->load->view('main_include/displayData', $data);
    }

    public function displayFaculty()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $faculty_id = $this->input->post('faculty_id');
        $data['faculty_members'] = $this->main_model->fetchFacultyData();

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/fetchFacultyData', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function displayFacultyMember($faculty_id)
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        // $faculty_id = $this->input->post('faculty_id');
        $data['faculty_members'] = $this->main_model->fetchFacultyDataby_userid($faculty_id);

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/fetchFacultyMemberData', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function displayStaff(){
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/displayStaff', $data);
        $this->load->view('main_include/footer', $data);
    }

    // public function profile($student_id)
    // {
    //     $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
    //     $data['website_name'] = $website_obj['DESCRIPTION'];

    //     $icon = $this->Configuration_model->getConfiguration('LOGO');
    //     $data['icon'] = $icon['DESCRIPTION'];

    //     $data['student'] = $this->main_model->fetchStudentData($student_id);
    //     $this->load->view('main_include/header', $data);
    //     $this->load->view('main_include/studentProfile', $data);
    //     $this->load->view('main_include/footer', $data);
    // }

    public function display_programs() {
        $data['prog'] = $this->main_model->getProgramsData();
        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/MSIT', $data);
        $this->load->view("main_include/footer", $data);
    }


    public function msit()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        // $this->load->model('Main_model');
        $this->load->view('main_include/header', $data);

        // $data['prog'] = $this->main_model->getProgramsData();
        $data['programs'] = $this->main_model->getMPhilITProg();
        $data['departments'] = $this->main_model->getITDept();
        $data['year'] = $this->main_model->getYear();
        $data['scheme'] = $this->main_model->getSchemeDetail();

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSIT', $data);
        $this->load->view("main_include/footer", $data);
    }

    public function mssw()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        // $this->load->model('Main_model');
        $this->load->view('main_include/header', $data);

        $data['programs'] = $this->main_model->getMPhilSoftwareProg();
        $data['departments'] = $this->main_model->getSoftwareDept();
        $data['year'] = $this->main_model->getYear();
        $data['scheme'] = $this->main_model->getSchemeDetail();

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSSW', $data);
        $this->load->view("main_include/footer", $data);
    }

    public function mstl()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $this->load->view('main_include/header', $data);

        $data['programs'] = $this->main_model->getMPhilTelecomProg();
        $data['departments'] = $this->main_model->getTelecomDept();
        $data['year'] = $this->main_model->getYear();
        $data['scheme'] = $this->main_model->getSchemeDetail();
        
        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSTL', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function msel()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $this->load->view('main_include/header', $data);

        $data['programs'] = $this->main_model->getMPhilElectronicsProg();
        $data['departments'] = $this->main_model->getElectronicsDept();
        $data['year'] = $this->main_model->getYear();
        $data['scheme'] = $this->main_model->getSchemeDetail();

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSEL', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function msdatascience()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $this->load->view('main_include/header', $data);

        $data['programs'] = $this->main_model->getMPhilDataScienceProg();
        $data['departments'] = $this->main_model->getDataScienceDept();
        $data['year'] = $this->main_model->getYear();
        $data['scheme'] = $this->main_model->getSchemeDetail();

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/MSDataScience', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function phdIT()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $this->load->view('main_include/header', $data);

        $data['programs'] = $this->main_model->getphdITProg();
        $data['departments'] = $this->main_model->getphdITDept();
        $data['year'] = $this->main_model->getYear();
        $data['scheme'] = $this->main_model->getSchemeDetail();

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $department = $this->input->post('DEPT_ID');
        $program = $this->input->post('PROG_ID');
        $year = $this->input->post('YEAR');
        $data['syear'] = $year;
        $data['sdept'] = $department;
        $data['sprograms'] = $program;
        $record = $this->main_model->getAllData($department, $program, $year);

        $data['record'] = $record;

        $this->load->view('main_include/phdIT', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function directorMessage()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $director_message = $this->Configuration_model->getConfiguration('DIRECTOR_MESSAGE');
        $data['director_message'] = $director_message['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/directorMessage', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function notices()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];
        $data['notices'] = $this->main_model->getNotices();

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/notices', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function timetableIT()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);

        $data = array(
            // 'PART' => $this->input->post('part'),
            'SEMESTER' => $this->input->post('semester')
        );

        $sem = $this->main_model->semester($data);

        $data['sems'] = $sem;

        // $parts = $this->main_model->getAllPartData();

        // $data['parts'] = $parts;

        $this->load->view('main_include/timetableIT', $data);

        $this->load->view("main_include/footer", $data);
    }

    public function semesterData()
    {


        $parts = $this->main_model->getAllPartData();

        $data['parts'] = $parts;
        $this->load->view("main_include/header", $data);

        $this->load->view('main_include/timetableIT', $data);

        $this->load->view("main_include/footer", $data);
    }

    public function timetableData()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $parts = $this->main_model->getAllPartData();

        $data['parts'] = $parts;
        $this->load->view("main_include/header", $data);

        $this->load->view('main_include/timetableData', $data);

        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 4000
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('IMAGE')) {
            echo $this->upload->display_errors();
        } else {
            $imageUpload = $this->upload->data();
            $upload = $imageUpload['file_name'];
            $abc = array('IMAGE' => $upload);
            $this->main_model->insertImage($abc);
        }
    }

    public function logo()
    {

        $this->load->view('main_include/insertLogo');

        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 4000
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('LOGO')) {
            echo $this->upload->display_errors();
        } else {
            $imageUpload = $this->upload->data();
            $upload = $imageUpload['file_name'];
            $img = array('DESCRIPTION' => $upload);
            $this->main_model->insertLogo($img);
        }
    }

    public function timetableSW()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        $data = array(
            // 'PART' => $this->input->post('part'),
            'SEMESTER' => $this->input->post('semester')

        );


        $sem = $this->main_model->semester($data);

        $data['sems'] = $sem;

        // $parts = $this->main_model->getAllPartData();

        // $data['parts'] = $parts;

        $this->load->view('main_include/timetableSW', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function timetableTL()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        $data = array(
            // 'PART' => $this->input->post('part'),
            'SEMESTER' => $this->input->post('semester')
        );

        $sem = $this->main_model->semester($data);

        $data['sems'] = $sem;

        // $parts = $this->main_model->getAllPartData();

        // $data['parts'] = $parts;

        $this->load->view('main_include/timetableTL', $data);

        $this->load->view('main_include/footer', $data);
    }

    public function timetableEL()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        $data = array(
            'PART' => $this->input->post('part'),
            'SEMESTER' => $this->input->post('semester')
        );

        $sem = $this->main_model->semester($data);

        $data['sems'] = $sem;

        $parts = $this->main_model->getAllPartData();

        $data['parts'] = $parts;

        $this->load->view('main_include/timetableEL', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function timetableDataScience()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        $data = array(
            // 'PART' => $this->input->post('part'),
            'SEMESTER' => $this->input->post('semester')
        );

        $sem = $this->main_model->semester($data);

        $data['sems'] = $sem;

        // $parts = $this->main_model->getAllPartData();

        // $data['parts'] = $parts;

        $this->load->view('main_include/timetableDataScience', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function timetablephdIT()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view("main_include/header", $data);

        $data = array(
            // 'PART' => $this->input->post('part'),
            'SEMESTER' => $this->input->post('semester')
        );

        $sem = $this->main_model->semester($data);

        $data['sems'] = $sem;

        // $parts = $this->main_model->getAllPartData();

        // $data['parts'] = $parts;

        $this->load->view('main_include/timetablephdIT', $data);
        $this->load->view('main_include/footer', $data);
    }

    public function icetiet()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];
        $this->load->view('main_include/icetiet');
    }

    public function ncetiet()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];
        $this->load->view('main_include/ncetiet');
    }

    public function teacherLogin()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];
        $this->load->view('main_include/teachers');
    }

    public function fetData()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];
        $this->load->view('main_include/fet');
    }

    public function gallery()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header',$data);
        $this->load->view('main_include/gallery',$data);
        $this->load->view('main_include/footer',$data);
    }

    public function jobs()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header',$data);
        $this->load->view('main_include/job_vacancies');
        $this->load->view('main_include/footer',$data);
    }

    public function contact()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header',$data);
        $this->load->view('main_include/contact',$data);
        $this->load->view('main_include/footer',$data);
    }

    public function faq()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header',$data);
        $this->load->view('main_include/faq');
        $this->load->view('main_include/footer',$data);
    }

    public function header()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];
        $this->load->view('main_include/header', $data);
    }

    public function section()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];
        $this->load->view('main_include/section', $data);
    }

    public function footer()
    {
        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];
        $this->load->view('main_include/footer', $data);
    }

    public function getAboutData()
    {

        $this->main_model->getAboutData();
        $data['configuration'] = $this->main_model->getAboutData();
        $this->load->view('main_include/section');
    }

    public function student_register()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/student_register');
        $this->load->view('main_include/footer', $data);

        //validation of Registertion form 
        $this->form_validation->set_rules('rollno', 'Roll No', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run()) {

            $data = [

                'STUDENT_ROLL_NO' => $this->input->post('rollno'),
                'STUDENT_NAME' => $this->input->post('name'),
                'EMAIL' => $this->input->post('email'),
                'PASSWORD' => $this->input->post('password'),
            ];

            $result = $this->main_model->insert_student($data);
            if ($result == true) {
                echo "<script>alert('Record Inserted Successfully');</script>";
            } else {
                echo "Record not inserted";
            }
        } else {
            if ($this->form_validation->run() == false) {
                echo validation_errors();
            }
        }
    }

    public function student_panel()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];
        
        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/student_login', $data);
        $this->load->view('main_include/footer', $data);

        //validation of Login form 
        $this->form_validation->set_rules('cnic', 'Cnic', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $user = $this->input->post('cnic');
            $password = $this->input->post('password');
            //   $password=sha1($password);

            // $this->load->model('main_model');
            $id = $this->main_model->log_model($user, $password);
            // print_r($id);
            // exit();
            if ($id) {
                $this->session->set_userdata('STD_ID', $id);
                $this->session->set_flashdata('msg', 'Login successful');
                //  header('location:student_batch');
                redirect(base_url('Home/student_batch'));
                // echo "<h1>Logged successfully</h1>";
            } else {
                echo "<script>alert('Access Denied Try Correct Password/Roll NO');</script>";
            }
        } else {
            echo validation_errors();
        }
    }

    
    public function studentsMarks()
    {

        //  echo '<pre>';
        // prePrint($_POST);
        // echo '</pre>';
        // exit();
        $result_data = $this->session->userdata('STD_ID');
        if (!isset($result_data)) {
            redirect('Home/student_panel');
            exit("you are not login kindly login first");
        }

        $user_roll_no = $result_data[0]['STUDENT_ROLL_NO'];

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        // $years = $this->main_model->getAllYears();
        // $data['years'] = $years;

        $this->load->view('main_include/header', $data);

        $EXAM_YEAR = $this->input->post('EXAM_YEAR');
        $BATCH_YEAR = $this->input->post('BATCH_YEAR');
        $PART = $this->input->post('PART');
        $SEMESTER = $this->input->post('SEMESTER');
        $EXAM_TYPE = $this->input->post('EXAM');

        $students_marks = $this->main_model->fetchStudentsData($user_roll_no, $EXAM_YEAR, $BATCH_YEAR, $PART, $SEMESTER, $EXAM_TYPE);

        $data['students_marks'] = $students_marks;

        $this->load->view('main_include/studentsMarks', $data);
        $this->load->view('main_include/footer', $data);

        // print_r($data);
        // exit();


    }

    public function student_batch()
    {

        $website_obj = $this->Configuration_model->getConfiguration('WEBSITE_NAME');
        $data['website_name'] = $website_obj['DESCRIPTION'];

        $icon = $this->Configuration_model->getConfiguration('LOGO');
        $data['icon'] = $icon['DESCRIPTION'];

        $email = $this->Configuration_model->getConfiguration('EMAIL');
        $data['EMAIL'] = $email['DESCRIPTION'];

        $years = $this->main_model->getAllYears();
        $data['years'] = $years;

        $this->load->view('main_include/header', $data);
        $this->load->view('main_include/student_batch', $data);
        $this->load->view('main_include/footer', $data);

        // $this->studentsMarks();

    }

    public function getResults()
    {
        $data['student'] = $this->main_model->joinResults();
        $this->load->view('main_include/studentsResult', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('STD_ID');
        redirect('Home/student_panel');

        // session_start();
        // unset($_SESSION);
        // session_destroy();
        // session_write_close();
        // header('location:student_panel');
        // die;

    }

    
}
