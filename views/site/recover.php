<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model yii\base\DynamicModel */

?>
<?php if(@$_GET['token']){
    $token = $_GET['token'];
} else {
    $token='';
}
print_r(Yii::$app->request->get('token'));
?>
    <div class="form">

        <?php $form = ActiveForm::begin(); ?>
        <?= Html::encode("Write new password");  ?>

        <?= $form->field($model, 'newpassword')->passwordInput() ?>

        <?= $form->field($model, 'newpassword2')->passwordInput() ?>



        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>