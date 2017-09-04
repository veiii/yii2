<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Choices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choices-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Choices', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'choices_id',
            'user_id',
            'study_id',
            'points',
            'result',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
