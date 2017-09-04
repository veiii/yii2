<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\Choices;

/* @var $this yii\web\View */
/* @var $modelProfile app\models\Profile */
/* @var $modelScore app\models\Score */
/* @var $modelChoices app\models\Choices */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-main">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Update', ['update', 'id' => Yii::$app->user->id], ['class' => 'btn btn-primary']); ?>

    </p>
    <?=
    DetailView::widget([
        'model' => $modelProfile,
        'attributes' => [
            'user_id',
            'surname',
            'first_name',
            'second_name',
            'PESEL',
            'date_of_birth',
            'place_of_birth',
            'sex',
            'email:email',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $modelScore,
        'attributes' => [
            // 'user_id',
            'polish',
            'matematic',
            'english',
            'geography',
            'physics',
            'chemistry',
            'biology',
        ],
    ]) ?>





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'choices_id',
            //'user_id',
            [
                'header' => 'Study name',
                'attribute' => 'study_id',
                'value' => function ($model) {
                    return \app\models\Study::getNameById($model);
                },
            ],
            'points',
            [
                'header' => 'Result',
                'attribute' => 'result',
                'value' => function ($model) {
                    return \app\models\Choices::progress($model->result);
                },
            ],


            //['class' => 'yii\grid\ActionColumn'],
        ],
        'emptyText' => 'Nothing chosen yet.',
    ]); ?>

</div>

<div class="choices-form">
    <h1><?= Html::encode('Add a new course of study') ?></h1>

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($modelChoices, 'study_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Study::find()->all(), 'id', 'name')) ?>

    <?= $form->field($modelChoices, 'points')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($modelChoices->isNewRecord ? 'Add new' : 'Add new', ['class' => $modelChoices->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
