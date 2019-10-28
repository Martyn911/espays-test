<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Auto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auto-form">

    <?php Pjax::begin(['id' => 'new_auto']) ?>

    <?php if(Yii::$app->session->hasFlash('alert')):?>
        <?php echo \yii\bootstrap\Alert::widget([
            'body' => \yii\helpers\ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
            'options' => \yii\helpers\ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options')
        ])?>

        <?php Yii::$app->session->removeAllFlashes(); ?>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>

    <?= $form->field($model, 'mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->dropDownList($model->colors()) ?>

    <?= $form->field($model, 'comment')->textarea() ?>

    <?= $form->field($model, 'payed')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::end(); ?>

</div>



<?php
$this->registerJs(
    '$("document").ready(function(){
            $("#new_auto").on("pjax:end", function() {
            $.pjax.reload({container:"#cars"});  //Reload GridView
        });
    });'
);
?>