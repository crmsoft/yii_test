<?php

/* @var $this yii\web\View */

$this->title = 'Product List';

use yii\bootstrap\Alert;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;
use \yii\helpers\Url;

if(isset($deleted))
    echo Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'body' => $deleted ? 'The record is successfully deleted':'Failed to delete record',
    ]);

?>

<div class="row">
    <div class="col-sm-12 text-right">
        <? echo Html::a(Html::icon('plus').Html::encode(' Add'),[
            Url::to('product/create')
        ],[
            'class' => 'btn btn-success'
        ]) ?>
    </div>
</div>

<table class="table">
    <thead>
    <tr>
        <th>Picture</th>
        <th>Brand</th>
        <th>Title</th>
        <th>ASIN</th>
        <th>Price</th>
        <th>EAN</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($data as $datum) {
        $delete_url = Url::to(['/product/delete','id' => $datum->id]);
        $update_url = Url::to(['/product/update','id' => $datum->id]);
        echo "<tr>";
            echo "<td><img src='{$datum->picture}' /></td>";
            echo "<td>{$datum->brand}</td>";
            echo "<td style='max-width: 150px'>{$datum->title}</td>";
            echo "<td>{$datum->asin}</td>";
            echo "<td>{$datum->price} €</td>";
            echo "<td>{$datum->ean}</td>";
            echo "<td>".ButtonGroup::widget([
                    'options' => [
                        'class' => ['widget' => 'btn-group'] // replaces 'btn-group' with 'btn-group-vertical'
                    ],
                    'buttons' => [
                        '<a href="'.$update_url.'" class="btn btn-info">'.
                            Html::icon('edit').
                            Html::encode(' Update').
                        '</a>',
                        '<a href="'.$delete_url.'" class="btn btn-danger">'.
                            Html::icon('minus').
                            Html::encode(' Delete').
                        '</a>'
                    ]
                ])."</td>";
        echo "</tr>";
    } ?>
    </tbody>
</table>