<?php
if(!function_exists('retire_when'))
{
    /**
     * The retire_when function takes the Date of Birth & Date of First Appointment of a staff
     * and calculates the year of retirement of a staff. The return type depends on the value of
     * the $type parameter. Default return type is the year of retirement.
     * 
     * @param string $dob
     * @param string $doa
     * @return mixed
     */
    function retire_when($dob, $doa, $type='retirement')
    {
        $mode = '';
        $retirement = '';

        if(!isset($dob) || !isset($doa))
            return FALSE;
        
        $service_years_limit = 35;
        $service_age_limit = 60;

        $year_of_birth = isset(explode('/', $dob)[2]) ? explode('/', $dob)[2] : 0;
        $year_of_appt = isset(explode('/', $doa)[2]) ? explode('/', $doa)[2] : 0;
        
        $age_calc = ($year_of_birth + $service_age_limit);
        $service_calc = ($year_of_appt + $service_years_limit);

        if($age_calc > $service_calc){
            $r = $service_calc;
            $mode = 'Yos';
            $retirement = (isset(explode('/', $doa)[0]) ? explode('/', $doa)[0] : 0) . '/' . 
                (isset(explode('/', $doa)[1]) ? explode('/', $doa)[1] : 0) . '/' . $r;
        }else{
            $r = $age_calc;
            $mode = 'Age';
            $retirement = (isset(explode('/', $dob)[0]) ? explode('/', $dob)[0] : 0) . '/' . 
                (isset(explode('/', $dob)[1]) ? explode('/', $dob)[1] : 0) . '/' . $r;
        }

        return ($type == 'retirement' ? $retirement : $mode);
    }
}