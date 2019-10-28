<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Autos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php /*
    <p>
        <?= Html::a(Yii::t('app', 'Create Auto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    */ ?>

    <?php Pjax::begin(['id' => 'cars']); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'mark',
            'model',
            'number',
            [
                'attribute' => 'color',
                'value' => function($model){
                    return $model::colors($model->color);
                },
                'filter' => $model::colors()
            ],
            'payed:boolean',
            'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <?php Pjax::end(); ?>

    <h2>Добавить авто</h2>

    <?= $this->render('_form',[
        'model' => $model,
    ]) ?>

</div>
