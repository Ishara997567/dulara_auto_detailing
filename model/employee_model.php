<?php include_once "../commons/DbConnection.php";

$dbConnection = new DbConnection();

class Employee{
    public function addEmployee($emp_fn, $emp_ln, $emp_dob, $emp_nic, $emp_license_type, $emp_license_no, $emp_blood_group, $emp_email, $emp_address, $emp_epf_no, $emp_etf_no, $emp_designation, $emp_app_date, $emp_job_description){

        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO employee (emp_fn, emp_ln, emp_dob, emp_nic, emp_license_type, emp_license_no, emp_blood_group, emp_email, emp_address, emp_epf_no, emp_etf_no, emp_designation, emp_app_date, emp_job_description) VALUES ('$emp_fn', '$emp_ln', '$emp_dob', '$emp_nic', '$emp_license_type', '$emp_license_no', '$emp_blood_group', '$emp_email', '$emp_address', '$emp_epf_no', '$emp_etf_no', '$emp_designation', '$emp_app_date', '$emp_job_description');";
        $con->query($sql);
        return $con->insert_id;
    }

    public function addEmployeeIllness($emp_illness_name, $emp_illness_is_going, $emp_illness_emp_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO employee_illness (emp_illness_name, emp_illness_is_going, emp_illness_emp_id) VALUES ('$emp_illness_name', '$emp_illness_is_going', '$emp_illness_emp_id');";
        $con->query($sql);
    }

    public function addEmployeeContact($emp_contact_type, $emp_contact_no, $emp_contact_emp_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO employee_contact (emp_contact_type, emp_contact_no, emp_contact_emp_id) VALUES ('$emp_contact_type', '$emp_contact_no', '$emp_contact_emp_id');";
        $con->query($sql);
    }

    public function addEmployeeRoster($emp_rooster_in_time, $emp_rooster_out_time, $emp_rooster_off_day, $emp_rooster_half_day, $emp_rooster_emp_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO employee_roster (emp_roster_in_time, emp_roster_out_time, emp_roster_off_day, emp_roster_half_day, emp_roster_emp_id) VALUES ('$emp_rooster_in_time', '$emp_rooster_out_time', '$emp_rooster_off_day', '$emp_rooster_half_day', '$emp_rooster_emp_id');";
        $con->query($sql);
    }

    public function getEmployeeRoster()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT e.emp_id, e.emp_fn, e.emp_ln, e.emp_designation, r.emp_roster_off_day, r.emp_roster_half_day, r.emp_roster_in_time, r.emp_roster_out_time FROM employee_roster r, employee e WHERE e.emp_id = r.emp_roster_emp_id;";
        return $con->query($sql);
    }

    public function getEmployeeByEmpID($emp_id)
    {
        $con = $GLOBALS["conn"];
        $sql =  "SELECT * FROM employee WHERE emp_id = '$emp_id';";
        return $con->query($sql);
    }

    public function getEmployeeContactByEmpID($emp_id)
    {
        $con = $GLOBALS["conn"];
        $sql =  "SELECT * FROM employee_contact WHERE emp_contact_emp_id = '$emp_id';";
        return $con->query($sql);
    }

    public function getEmployeeIllnessByEmpID($emp_id)
    {
        $con = $GLOBALS["conn"];
        $sql =  "SELECT * FROM employee_illness WHERE emp_illness_emp_id = '$emp_id';";
        return $con->query($sql);
    }

    public function getEmployeeRosterByEmpID($emp_id)
    {
        $con = $GLOBALS["conn"];
        $sql =  "SELECT * FROM employee_roster WHERE emp_roster_emp_id = '$emp_id';";
        return $con->query($sql);
    }

    //Update Employee
    //Employee Contact

    public function updateEmployeeContactNumber($emp_id, $contact_id, $contact_type, $contact_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee_contact SET emp_contact_type = '$contact_type', emp_contact_no = '$contact_no' WHERE emp_contact_id = '$contact_id' AND emp_contact_emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeIllness($emp_id, $iid, $iname, $is_going)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee_illness SET emp_illness_name = '$iname', emp_illness_is_going = '$is_going' WHERE emp_illness_id = '$iid' AND emp_illness_emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeFirstName($emp_id, $fn)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_fn = '$fn' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeLastName($emp_id, $ln)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_ln = '$ln' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }



    public function updateEmployeeDOB($emp_id, $dob)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_dob = '$dob' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeNIC($emp_id, $nic)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_nic = '$nic' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }


    public function updateEmployeeLicenseType($emp_id, $lt)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_license_type = '$lt' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeLicenseNO($emp_id, $lno)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_license_no = '$lno' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }


    public function updateEmployeeBloodGroup($emp_id, $bg)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_blood_group = '$bg' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeEmail($emp_id, $email)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_email = '$email' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeAddress($emp_id, $address)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_address = '$address' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeETFNo($emp_id, $etf_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_etf_no = '$etf_no' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeEPFNo($emp_id, $epf_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_epf_no = '$epf_no' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeDesignation($emp_id, $des)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_designation = '$des' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeAppointedDate($emp_id, $app_date)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee SET emp_app_date = '$app_date' WHERE emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeRosterInTime($emp_id, $in_time)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee_roster SET emp_roster_in_time = '$in_time' WHERE emp_roster_emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeRosterOutTime($emp_id, $out_time)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee_roster SET emp_roster_out_time = '$out_time' WHERE emp_roster_emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeRosterOffDay($emp_id, $off_day)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee_roster SET emp_roster_off_day = '$off_day' WHERE emp_roster_emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function updateEmployeeRosterHalfDay($emp_id, $half_day)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE employee_roster SET emp_roster_half_day = '$half_day' WHERE emp_roster_emp_id = '$emp_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function addAttendance($att_date,$in_time,$out_time,$emp_id)
    {
        $con= $GLOBALS['conn'];
        $sql="INSERT INTO employee_attendance (att_date, att_in_time, att_out_time, att_emp_id) VALUES ('$att_date','$in_time','$out_time','$emp_id');";
        $con->query($sql);
        return $con->affected_rows;

    }

    public function getEmployeeAttendance()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT a.att_id, e.emp_id, e.emp_fn, e.emp_ln, a.att_date, a.att_in_time, a.att_out_time FROM employee_attendance a, employee e WHERE a.att_emp_id = e.emp_id;";
        return $con->query($sql);
    }

    public function getEmployeeName($term)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT CONCAT(emp_fn,' ',emp_ln) as emp_name FROM employee WHERE emp_fn LIKE '%{$term}%' OR emp_ln LIKE '%{$term}%';";
        return $con->query($sql);
    }


    public function getEmployeeAttendanceKPI()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT a.att_emp_id, CONCAT(e.emp_fn,' ',emp_ln) as name, a.att_date, a.att_in_time, a.att_out_time, COUNT(a.att_emp_id) as DayCount FROM employee_attendance a, employee e WHERE YEAR(att_in_time) = YEAR(CURDATE()) AND a.att_emp_id = e.emp_id GROUP BY att_emp_id LIMIT 5;";
        return $con->query($sql);
    }
}
