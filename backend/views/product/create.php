<?php
/**
 * Created by PhpStorm.
 * User: ahtem
 * Date: 06.05.2018
 * Time: 15:24
 */

/* @var $this yii\web\View */

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

echo $form->field($model,'asin')->textInput([
    'placeholder' => 'Please enter ASID',
    'value' => 'B013UDL5RU'
]);

?>

<div class="form-group">
    <? echo Html::submitButton('Load Product',[
        'class' => 'btn btn-primary'
    ]); ?>
</div>

<?

ActiveForm::end();
