<?php 
    $get = file_get_contents('states-and-districts.json');
    $records = json_decode($get);
    if(isset($_POST['state'])){
        $request = $_POST['state'];
        //$html = '<select class="form-control" id="district-list" name="districts">';
        $html = '<option value="">--Select District--</option>';
        foreach($records as $record){
            if($request == $record->state){
                $districts = $record->districts;
                //print_r($districts);
                foreach($districts as $district){
                    $html .= '<option value='.$district.'>'.$district.'</option>';
                }
            }
        }
        //$html .= '</select>';
        echo $html;
    }
?>