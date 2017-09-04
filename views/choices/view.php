<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Choices */

$this->title = $model->choices_id;
$this->params['breadcrumbs'][] = ['label' => 'Choices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choices-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->choices_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->choices_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'choices_id',
            'user_id',
            'study_id',
            'points',
            'result',
        ],
    ]) ?>

</div>
