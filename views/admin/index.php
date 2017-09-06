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

<?php  Html::encode('Short stats. Applications in progress: '.$count['IN_PROGRESS'].' Applications accepted: '.$count['ACCEPTED'] .' Application rejected: '.$count['REJECTED'] );


?>
    <?= GridView::widget([
        'dataProvider' => $data,
        'filterModel' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'filter' => Html::input('string', 'study_id'),
                'header' => 'Study ID',
                'attribute' => 'study_id',
                'format' => 'raw',
                /*'value'=>function ($model) {
                    $name = app\models\Study::getNameById($model['study_id']);
                    return Html::a(Html::encode($name),'index.php?r=admin/view&id='.$model['study_id']);
                    //print_r($model);
                },*/
            ],
            'lp',


            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
