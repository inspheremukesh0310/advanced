<?php

use yii\widgets\Breadcrumbs;
use frontend\widgets\Form;
/* @var $this yii\web\View */

echo Breadcrumbs::widget([
    'itemTemplate' => "<li><span class='success'><b>{link}</b></span></li>\n", // template for all links
    'links' => [
        [
            'label' => ' Post Category/',
            'url' => ['post-category', 'id' => 10],
            'itemTemplate' => "<li><span class='success'><b>{link}</b></span></li>\n", // template for this links
            
        ],
        [   'label' => 'Sample Post/',
            'url' => ['post', 'id' => 1]
        ],
        [   'label' => 'Edit',
            'url' => ['edit', 'id' => 1]
        ]
        
    ],
]);
?>

<p>
    Wellcome to widgets page.
</p>

<?php
   echo Form::widget(['pageTitle'=>'Registration Form','records'=>[1,2,3]]);
?>
