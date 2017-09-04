<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $modelProfile app\models\Profile */
/* @var $modelScore app\models\Score */

$this->title = 'Create Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelProfile' => $modelProfile,
        'modelScore' => $modelScore,
    ]) ?>

</div>
