<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Mode';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
<b>
<?=  Html::encode('Short stats. Applications in progress: '.$count['IN_PROGRESS'].' Applications accepted: '.$count['ACCEPTED'] .' Application rejected: '.$count['REJECTED'] );
?></b>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => true,
        'tableOption' => ['style' => 'width:500px'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                //'headerOptions' => ['style' => 'width:100px;']
            ],
            [
                'filter' => Html::input('string', 'study_name'),
                'header' => 'Study ID',
                //'headerOptions' => ['style' => 'max-width:100px;'],
                'attribute' => 'study_id',
                'format' => 'raw',
                'value'=>function ($model) {
                    $name = app\models\Study::getNameById($model['study_id']);
                    return Html::a(Html::encode($name),'index.php?r=admin/view&id='.$model['study_id']);
                    //print_r($model);
                },
            ],
            [
                'attribute' =>'lp',
                'header' => 'count',
                //'contentOptions' => ['style' => 'width:100px;']
            ],
            //'contentOptions' => ['style' => 'width:100px;']
        ],
    ]); ?>

</div>
