<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Score */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="score-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'polish')->textInput()->hint("wartość w %") ?>

    <?= $form->field($model, 'matematic')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($model, 'english')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($model, 'geography')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($model, 'physics')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($model, 'chemistry')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($model, 'biology')->textInput()->hint("wartość w %")  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
