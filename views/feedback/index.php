<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('smy.feedback', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('smy.feedback', 'Create Feedback'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
                             'dataProvider' => $dataProvider,
                             'columns'      => [
                                 ['class' => 'yii\grid\SerialColumn'],

                                 'id',
                                 'name',
                                 'email:email',
                                 'phone',
                                 'theme',

                                 [
                                     'class'    => 'yii\grid\ActionColumn',
                                     'template' => '{update} {delete}'
                                 ],
                             ],
                         ]); ?>
</div>