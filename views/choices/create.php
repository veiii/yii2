<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Choices */

$this->title = 'Create Choices';
$this->params['breadcrumbs'][] = ['label' => 'Choices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
