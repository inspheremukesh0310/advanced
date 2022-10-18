<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Employee_search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title; 
?>
<div class="employees-index">
<h1><?php // Html::encode($this->title) ?></h1>
   <div class="row">
        <div class="col-md-12">
            <h3>Employee Data</h3>
        </div>
    </div>
    <div class="row md-3">
       <table class="table">
            <thead>
                <tr>
                    <th style="width:5%;text-align:center">Sn</th>
                    <th style="width:10%;text-align:center">Image</th>
                    <th style="width:15%;text-align:center">Name</th>
                    <th style="width:15%;text-align:center">Email Id</th>
                    <th style="width:10%;text-align:center">Mobile</th>
                    <th style="width:15%;text-align:center">DOB</th>
                    <th style="width:5%;text-align:center">Gender</th>
                    <th style="width:25%;text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //print_r($employeedata);die;
                $sn=1;
                    foreach ($employeedata as $empdetails) {
                       ?>
                        <tr>
                            <td style="width:5%;text-align:center"><?=$sn++?></td>
                            <td style="width:10%;text-align:center">
                                <?php
                                    if ($empdetails->empimg!='') {
                                       ?>
                                       <img src="<?= Yii::$app->request->baseUrl . '/uploads/employeeImages/'.$empdetails->empimg ?>" class=" img-responsive"  width="100" height="100" >
                                       
                                       <?php
                                    }else {
                                        ?>
                                       <img src="<?= Yii::$app->request->baseUrl . '/uploads/employeeImages/no-image.png' ?>" class=" img-responsive" width="100" height="100" >
                                       <?php
                                    }
                                ?>
                                  
                               
                            </td>
                            <td style="width:15%;text-align:center"><?=$empdetails->name?></td>
                            <td style="width:15%;text-align:center"><?=$empdetails->email?></td>
                            <td style="width:10%;text-align:center"><?=$empdetails->phone?></td>
                            <td style="width:15%;text-align:center"><?=(isset($empdetails->dob) && $empdetails->dob!='')?date("d-m-Y",strtotime($empdetails->dob)):'NA'?></td>
                            <td style="width:5%;text-align:center">
                                <?php
                                    if ($empdetails->gender==1) {
                                        echo "Male";
                                    }elseif
                                        ($empdetails->gender==2){
                                            echo "Female";
                                    }elseif ($empdetails->gender==3) {
                                        echo "Other";
                                    }else {
                                        echo "NA";
                                    }
                                ?>
                            </td> 
                            <td style="width:25%;text-align:center">
                                <a href="<?='/employee/edit-employee?id='.$empdetails->id?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="<?='/employee/delete-employee?id='.$empdetails->id?>" class="btn btn-danger btn-sm">Delete</a>
                                <?php
                                    if ($empdetails->empimg!='') {
                                        ?>
                                        <a href="<?='/employee/remove-image?id='.$empdetails->id?>" class="btn btn-warning btn-sm">Remove Image</a>
                                    <?php
                                    }else {
                                        ?>
                                       
                                       <a href="<?='/employee/update-image?id='.$empdetails->id?>" class="btn btn-info btn-sm">Update Image</a>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                       <?php
                    }
                ?>
            </tbody>
       </table>
    </div>
</div>
