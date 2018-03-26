<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ShippingAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '客户收货地址';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-address-index box">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Create Shipping Address', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <div class="box-body">
        <?= GridView::widget([
            'export' => false,
            'summary' => "当前 {begin} - {end} 条， 共 {totalCount} 条数据",
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'user_id',
                [
                    'attribute' => 'name',
                    'label' => '姓名'
                ],
                [
                    'attribute' => 'phone',
                    'label' => '手机号'
                ],
                [
                    'attribute' => 'address',
                    'label' => '地址',
                ],
                [
                    'attribute' => 'comment',
                    'label' => '备注'
                ],
                [
                    'attribute' => 'express_number',
                    'label' => '快递号',
                    'class'=>'kartik\grid\EditableColumn',
                    'editableOptions'=>[  //加入本行代码
                        'asPopover' => false,
                    ],
                ],
                [
                    'attribute' => 'status',
                    'label' => '状态',
                    'class'=>'kartik\grid\EditableColumn',
                    'editableOptions'=>[
                        'inputType'=>\kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                        'asPopover' => false,
                        'data' => $searchModel::$status_list,
                    ],
                    'value' => function (\common\models\ShippingAddress $searchModel) {
                        return $searchModel::$status_list[$searchModel->status];
                    },
                    'filter' => $searchModel::$status_list,
                    'headerOptions'=> ['width'=> '100'],
                ],
                //'express_company',
                //'created',
                [
                    'attribute' => 'updated',
                    'label' => '更新时间',
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
