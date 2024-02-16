<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{


    public function index()
    {
        //$this->load->view('welcome_message');

    }

    public function __construct()
    {
        parent::__construct();
    }


    public function getPrograms()
    {
        $this->db->where('ACTIVE', 1);
        $data = $this->db->get('programs')->result_array();
        return $data;
    }



    function can_login($username, $password)

    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users_reg');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insertData($data)
    {
        return $this->db->insert('programs', $data);
    }

    public function fetchData()
    {
        $query = $this->db->get('programs');
        return $query->result();
    }

    public function insertFacultyData($data)
    {
        $this->db->insert('faculty_members', $data);
        $fm_id = $this->db->insert_id();
        return $fm_id;
    }

    public function getYear()
    {
        $query = $this->db->get('year');
        return $query->result_array();
    }

    public function fetchScheme()
    {
        $query = $this->db->get('scheme');
        return $query->result();
    }


    public function getAllData($department, $program, $year)
    {
        $this->db->select("s.*,d.department,p.PROGRAM_NAME,sd.*,y.YEAR");
        $this->db->from('scheme s');

        $this->db->join('departments d', 's.DEPT_ID=d.id');
        $this->db->join('programs p', 'p.PROGRAM_ID=s.PROG_ID');
        $this->db->join('year y', 'y.YEAR_ID=s.YEAR_ID');
        $this->db->join('scheme_detail sd', 'sd.SCHEME_ID=s.SCHEME_ID');

        $this->db->where('s.DEPT_ID', $department);
        $this->db->where('s.PROG_ID', $program);
        $this->db->where('s.YEAR_ID', $year);

        $query = $this->db->get();

        //print_r($this->db->last_query());
        //exit();

        return $query->result_array();
    }

    public function joinPrograms()
    {
        $this->db->select('part.CLASS_PART_ID', 'part.CLASS_NAME', 'programs.PROGRAM_NAME', 'programs.PROGRAM_ID as programid');

        $this->db->from('part');
        $this->db->join('part', 'part.PROG_ID=program.PROGRAM_ID');
        $this->db->where('part.CLASS_PART_ID');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertProgramsData($data){
        $query = $this->db->insert('program_details', $data);
        return $query;
    }

    public function getProgramsData() {
        $query = $this->db->get('program_details');
        return $query->result_array();
    }

    public function FetchPart()
    {
        $query = $this->db->get('part');
        return $query->result();
    }

    public function joinID($part)
    {
        $this->db->select("pr.CLASS_NAME,pr.REMARKS, t.*,p.PROGRAM_NAME,s.*,f.*");

        $this->db->from('timetable t ');
        $this->db->join('part pr', 'pr.CLASS_PART_ID = t.CLASS_PART_ID');
        $this->db->join('programs p', 'pr.PROG_ID = p.PROGRAM_ID');
        $this->db->join('faculty_members f', 't.MEMBER_ID = f.id');
        $this->db->join('scheme s', 't.SCHEME_ID = s.SCHEME_ID');

        $this->db->where('pr.PROGRAM_ID', $part);
        $this->db->where('t.CLASS_PART_ID');
        $this->db->where('t.PROG_ID');
        $this->db->where('t.MEMBER_ID');
        $this->db->where('t.SCHEME_ID');
    }

    public function fetchFacultyDataby_userid($faculty_id)
    {
        $this->db->where('id', $faculty_id);
        $query = $this->db->get('faculty_members');
        return $query->result();
    }

    public function fetchFacultyData()
    {
        // $this->db->where('id', $faculty_id);
        $query = $this->db->get('faculty_members');
        return $query->result();
    }

    public function fetchStudentData($student_id)
    {
        $query = $this->db->get_where('students', array('id' => $student_id));
        return $query->row();
    }


    public function updateFacultyData($imgPath, $fm_id)
    {
        $this->db->where('id', $fm_id);
        $this->db->update('faculty_members', $imgPath);
    }

    public function getAllDepartments()
    {
        $query = $this->db->get('departments');
        return $query->result_array();
    }

    public function getAllYears()
    {
        $query = $this->db->get('year');
        return $query->result_array();
    }

    public function getAllPrograms()
    {
        $query = $this->db->get('programs');
        return $query->result_array();
    }

    public function getITDept()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('departments');
        $query = $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getphdITDept()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('departments');
        $query = $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSoftwareDept()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('departments');
        $query = $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getElectronicsDept()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('departments');
        $query = $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTelecomDept()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('departments');
        $query = $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataScienceDept()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('departments');
        $query = $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMPhilITProg()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('programs');
        $query = $this->db->where('PROGRAM_ID', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMPhilSoftwareProg()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('programs');
        $query = $this->db->where('PROGRAM_ID', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMPhilTelecomProg()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('programs');
        $query = $this->db->where('PROGRAM_ID', 3);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMPhilElectronicsProg()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('programs');
        $query = $this->db->where('PROGRAM_ID', 4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMPhilDataScienceProg()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('programs');
        $query = $this->db->where('PROGRAM_ID', 5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getphdITProg()
    {

        $query = $this->db->select('*');
        $query = $this->db->from('programs');
        $query = $this->db->where('PROGRAM_ID', 6);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertSchemeData($data)
    {
        $this->db->insert('scheme', $data);
        $fm_id = $this->db->insert_id();
        return $fm_id;
    }

    public function insertSchemeDetail($data)
    {
        if ($this->db->insert('scheme_detail', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function getSchemeDetail()
    {
        $query = $this->db->get('scheme');
        return $query->result_array();
    }

    public function getAllPartData()
    {
        $query = $this->db->get('part');
        return $query->result_array();
    }

    public function getAllTimetableData()
    {
        $query = $this->db->get('timetable');
        return $query->result_array();
    }

    public function getSemesterData()
    {
        $query = $this->db->get('scheme_detail');
        return $query->result_array();
    }

    public function getAllCourses()
    {
        $query = $this->db->get('courses');
        return $query->result_array();
    }

    public function insertImage($data)
    {
        $query = $this->db->insert('timetable', $data);
        return $query;
    }

    public function insertLogo($data)
    {
        $query = $this->db->insert('configuration', $data);
        return $query;
    }

    public function semester($data)
    {

        $this->db->select('*');
        // $this->db->where('part', $data['PART']);
        $this->db->where('semester', $data['SEMESTER']);
        $this->db->from('timetable');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getAboutData()
    {

        $query = $this->db->get('configuration');
        return $query->result_array();
    }

    public function addNotices($data)
    {
        $query = $this->db->insert('notices', $data);
        return $query;
    }

    public function getNotices()
    {
        $this->db->select('*');
        $this->db->from('notices');
        $this->db->where('ACTIVE', 1);
        $this->db->order_by("DATE_TIME", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addNews($data)
    {
        $query = $this->db->insert('news', $data);
        return $query;
    }

    public function getNews()
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('ACTIVE', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertStudentData($data)
    {

        $query = $this->db->insert('studentsresult', $data);
        if ($query->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insertStudentExamResult($data)
    {
        $query = $this->db->insert('students_exams', $data);
        //print_r($data);
        //exit();
        return $query;
    }

    public function uploadExcelFile($data)
    {
        $query = $this->db->insert('students_data', $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_student($data)
    {
        $sql = $this->db->insert('student_register', $data);
        return $sql;
    }

    public function log_model($user, $password)
    {

        $query = $this->db->where(['STUDENT_ROLL_NO' => $user, 'PASSWORD' => $password])
            ->get('student_register');

        if ($query->num_rows()) {

            return $query->result_array();
        } else {
            return false;
        }
    }


    public function getStudentData()
    {
        $query = $this->db->get('students_data');
        return $query->result_array();
    }

    public function insertStudentMarks($data)
    {
        $query = $this->db->insert('students_result', $data);
        return $query;
    }

    public function fetchStudentsData($user_roll_no, $EXAM_YEAR, $BATCH_YEAR, $PART, $SEMESTER, $EXAM_TYPE)
    {

        $this->db->select("sr.STUDENT_ROLL_NO, sr.STUDENT_NAME, sr.MARKS, sr.DISCIPLINE, c.COURSE_NO, c.COURSE_NAME, sr.PART, sr.SEMESTER, sr.EXAM_TYPE, sr.BATCH_YEAR, sr.EXAM_YEAR");
        $this->db->from('students_result sr');
        $this->db->join('courses c', 'sr.COURSE_ID=c.COURSE_ID');
        $this->db->where('STUDENT_ROLL_NO', $user_roll_no);
        $this->db->where('sr.EXAM_YEAR', $EXAM_YEAR);
        $this->db->where('sr.BATCH_YEAR',  $BATCH_YEAR);
        $this->db->where('sr.PART',  $PART);
        $this->db->where('sr.SEMESTER', $SEMESTER);
        $this->db->where('sr.EXAM_TYPE', $EXAM_TYPE);

        $query = $this->db->get();
        // print_r($this->db->last_query());
        // exit();
        return $query->result();
    }

    
    public function joinResults()
    {
        // $student_id = 1;
        $this->db->select("sr.STUDENT_ROLL_NO, sr.STUDENT_NAME, sr.DISCIPLINE, sr.COURSE_NO, sr.MARKS, c.COURSE_NAME");
        $this->db->from('students_result sr');
        $this->db->join('courses c', 'sr.COURSE_NO=c.COURSE_NO');
        // $this->db->where("sr.STUDENT_RESULT_ID", $student_id);
        $query = $this->db->get();
        return $query->result();
    }

    
}
