<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Choices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="choices-form">
    <?php
    ////////////            TESTY          /////////////////////////////////////

    //print_r(\yii\helpers\ArrayHelper::map(app\models\Study::find()->all(),'id','name'));
    //$model = new Choices();

    //print_r($model->pointsById(Yii::$app->user->id));

    ?>
    <?php $form = ActiveForm::begin(); ?>


    <?=  $form->field($model, 'study_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Study::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <?= $form->field($model, 'result')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
