<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Choices */

$this->title = 'Update Choices: ' . $model->choices_id;
$this->params['breadcrumbs'][] = ['label' => 'Choices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->choices_id, 'url' => ['view', 'id' => $model->choices_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="choices-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
