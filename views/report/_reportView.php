<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div>
<h2>Lista osób przyjętych na kierunku <?php echo $studyName ?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>'',
        'columns' => [
            [
                    'header' => '',
                    'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['width' => '30'],
            ],
            [
                'header' => 'Name',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return \app\models\BUser::getNameById($model->user_id);
                },
                'contentOptions' => ['style' => 'max-width:100px;'],
                //'headerOptions' => ['width' => '150'],
                //'filter' => SORT_DESC,
            ],
        ],
    ]); ?>
</div>