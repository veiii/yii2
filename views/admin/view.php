<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $modelAdmin app\models\Admin*/
/* @var $model yii\base\DynamicModel */

$this->title = \app\models\Study::getNameById($_GET['id']);
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Accept/Reject many students', ['/admin/many'], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Export to pdf', 'index.php?r=report/report&studyId='.$_GET['id'], ['class'=>'btn btn-primary', 'target' => '_blank']) ?>

    <?php Pjax::begin() ?>
    <?=
        GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'choices_id',
            [
                'header' => 'User',
                'format' => 'raw',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return Html::a(\app\models\Profile::getName($model['user_id']), 'index.php?r=profile/view&id='.$model['user_id'], ['class'=>'btn btn-primary']);
                },
            ],
            'study_id',
            'points',
            [
                'header' => 'Result',
                'attribute' => 'result',
                'value' => function ($model) {
                    return \app\models\Choices::progress($model->result);
                },
            ],

            //['class' => 'yii\grid\ActionColumn'],

            [
                'header' => 'Accept Button',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a(
                        '<i class="accept"></i>',
                        Url::to(['admin/accept', 'id' => $model['choices_id']]),
                        [
                            'id'=>'grid-custom-button',
                            'data-pjax'=>true,
                            'action'=>Url::to(['admin/accept', 'id' => $model['choices_id']]),
                            'class'=>'button btn btn-default',
                        ]
                    );
                }
            ],
            [
                'header' => 'Reject Button',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a(
                        '<i class="reject"></i>',
                        Url::to(['admin/reject', 'id' => $model['choices_id']]),
                        [
                            'id'=>'grid-custom-button',
                            'data-pjax'=>true,
                            'action'=>Url::to(['admin/reject', 'id' => $model['choices_id']]),
                            'class'=>'button btn btn-default',
                        ]
                    );
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
