<?php 	
include "config_db.php";
if ($_POST['crudOperation'] == "insertUpdate") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $date_of_birth = $_POST['date_of_birth'];
    $blood_group = $_POST['blood_group'];
    $editId = $_POST['editId'];
    if ($editId == "") {
            $query = "INSERT INTO patient_details SET name='$name',age='$age',city='$city',state='$state',country='$country',date_of_birth='$date_of_birth',blood_group='$blood_group'";
        }else{
            $query = "UPDATE patient_details SET name='$name',age='$age',city='$city',state='$state',country='$country',date_of_birth='$date_of_birth',blood_group='$blood_group' WHERE id='$editId'";
        }
        $result = $connection->query($query) or die("Error in saving data".$connection->error);
    if ($result){
        echo "saved";
    }else{
    	echo "Error";
    }
}
if ($_POST['crudOperation'] == "getData") {
    $sr = 1;
    $tableData = '';
      $query = "SELECT * FROM patient_details";
        $allData = $connection->query($query) or die("Error in getting data".$connection->error);
    if ($allData->num_rows>0) {
        while ($row = $allData->fetch_object()) {
            $tableData .= ' <tr>
                <td>'.$sr.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->age.'</td>
                <td>'.$row->city.'</td>
                <td>'.$row->state.'</td>
                <td>'.$row->country.'</td>
                 <td>'.date("d-m-Y",strtotime($row->date_of_birth)).'</td>
                <td>'.$row->blood_group.'</td>
                <td><a href="javaScript:void(0)" onclick="editData(\''.$row->id.'\',\''.$row->name.'\',\''.$row->age.'\',\''.$row->city.'\',\''.$row->state.'\',\''.$row->country.'\',\''.$row->date_of_birth.'\',\''.$row->blood_group.'\');" class="btn btn-success btn-sm">Edit</a>
                <a href="javaScript:void(0)" onclick="deleteData(\''.$row->id.'\');" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash-o"></i></a>
                <i class="fa fa-spinner fa-spin" id="deleteSpinner'.$row->id.'" style="color: #ff195a;display: none"></i></td>
            </tr>';
            $sr++;
        }
    }
    echo $tableData;
}
if ($_POST['crudOperation'] == "deleteData"){
    $deleteId = $_POST['deleteId'];
     $query = "DELETE FROM patient_details WHERE id='$deleteId'";
   $result = $connection->query($query) or die("Error in deleting data".$connection->error);
    if ($result){
        echo "deleted";
    }else{
    	echo "Error";
    }
}
?>