<?php
/**
 * Created by PhpStorm.
 * User: ahtem
 * Date: 06.05.2018
 * Time: 22:36
 */

$this->title = 'Add new product';

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Alert;
use common\models\Products;


$model = new Products;

if(!empty($message))
    echo Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'body' => $message,
    ]);

$form = ActiveForm::begin();

echo $form->field($model,'title')->textInput([
    'value' => $data->title
]);

echo $form->field($model,'ean')->textInput([
    'value' => $data->ean
]);

echo $form->field($model,'price')->textInput([
    'value' => $data->price,
]);

echo $form->field($model,'brand')->textInput([
    'value' => $data->brand,
]);

?>

    <div class="form-group">
        <? echo Html::submitButton('Load Product',[
            'class' => 'btn btn-primary'
        ]); ?>
    </div>

<?

ActiveForm::end();