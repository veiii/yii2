<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model yii\base\DynamicModel */

?>

    <div class="form">

        <?php $form = ActiveForm::begin(); ?>
        <?= Html::encode("Fill form to get back your password, use email address from registration. You will receive new password");  ?>

        <?= $form->field($model, 'email')->textInput() ?>



        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
//echo Yii::$app->getSecurity()->generateRandomString();