<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.08.2017
 * Time: 12:46
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'surname') ?>
<?= $form->field($model, 'firstName') ?>
<?= $form->field($model, 'secondName') ?>
<?= $form->field($model, 'PESEL') ?>
<?= $form->field($model, 'dateOfBirth') ?>
<?= $form->field($model, 'placeOfBirth') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'sex') ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>