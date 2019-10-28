<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Auto */

$this->title = Yii::t('app', 'Create Auto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
