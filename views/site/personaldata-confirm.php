<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.08.2017
 * Time: 12:46
 */
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>surname</label>: <?= Html::encode($model->surname) ?></li>
    <li><label>First name</label>: <?= Html::encode($model->firstName) ?></li>
    <li><label>Second name</label>: <?= Html::encode($model->secondName) ?></li>
    <li><label>PESEL</label>: <?= Html::encode($model->PESEL) ?></li>
    <li><label>date of birth</label>: <?= Html::encode($model->dateOfBirth) ?></li>
    <li><label>place of bitrh</label>: <?= Html::encode($model->placeOfBirth) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
    <li><label>sex</label>: <?= Html::encode($model->sex) ?></li>
</ul>