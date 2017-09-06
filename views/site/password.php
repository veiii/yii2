<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;



/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model yii\base\DynamicModel */

?>
<?php if (Yii::$app->session->hasFlash('passwordFormSubmitted')): ?>

    <div class="alert alert-success">
        You will recive next instructions on your mail address.
    </div>

<?php else: ?>

    <div class="form">

        <?php $form = ActiveForm::begin(); ?>
        <?= Html::encode("Fill form to get back your password, use email address from registration. You will receive new password");  ?>

        <?= $form->field($model, 'email')->textInput() ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ]) ?>





        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php endif; ?>