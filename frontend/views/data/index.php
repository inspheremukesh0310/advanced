<?php
/* @var $this yii\web\View */
?>
<h1>data/index</h1>

<p>
        <?php
            if (Yii::$app->session->has('message')) {
              
            ?>
                <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('message');?>
        </div>
            <?php
            }
        ?>
    <?php
        
        if (Yii::$app->session->has('UserName')) {
           echo Yii::$app->session->get('UserName').'---User Name';
        }
    ?>

    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
 