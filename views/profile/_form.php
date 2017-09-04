<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelProfile app\models\Profile */
/* @var $modelScore app\models\Score */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelProfile, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelProfile, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelProfile, 'second_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelProfile, 'PESEL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelProfile, 'date_of_birth')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'pl',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    <?= $form->field($modelProfile, 'place_of_birth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelProfile, 'sex')->radioList([
            1 => 'man',
            2 => 'woman'
    ])?>

    <?= $form->field($modelProfile, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelScore, 'polish')->textInput()->hint("wartość w %") ?>

    <?= $form->field($modelScore, 'matematic')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($modelScore, 'english')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($modelScore, 'geography')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($modelScore, 'physics')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($modelScore, 'chemistry')->textInput()->hint("wartość w %")  ?>

    <?= $form->field($modelScore, 'biology')->textInput()->hint("wartość w %")  ?>
    <div class="form-group">
        <?= Html::submitButton($modelProfile->isNewRecord ? 'Create' : 'Update', ['class' => $modelProfile->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
