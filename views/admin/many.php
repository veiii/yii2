<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\DynamicModel;


/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model yii\base\DynamicModel */

?>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>
    <?= Html::encode("Here you can accept all user who have more points than other. Rest of will by rejected.");  ?>

    <?= $form->field($model, 'howManyPoints')->textInput()->hint("points line") ?>

    <?=  $form->field($model, 'studyId')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Study::find()->all(),'id','name')) ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$studyId=1;
$model = \app\models\Choices::find()->where(['study_id' => $studyId, 'result' => 0])->asArray()->all();
echo'<pre>';
print_r($model);
echo'</pre>';



?>