<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model yii\base\DynamicModel */

?>


    <div class="form">

        <?php $form = ActiveForm::begin(); ?>
        <?= Html::encode("Write new password and repeat. ");  ?>
        <br><br>
        <?= $form->field($model, 'newpassword')->passwordInput()->label('New Password') ?>

        <?= $form->field($model, 'newpassword2')->passwordInput()->label('Repeat New Password') ?>



        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>