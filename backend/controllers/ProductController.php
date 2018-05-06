<?php
/**
 * Created by PhpStorm.
 * User: ahtem
 * Date: 06.05.2018
 * Time: 15:20
 */
namespace backend\controllers;

use common\models\Products;
use yii\db\Exception;
use yii\helpers\Url;

class ProductController extends \backend\controllers\SiteController{

    /**
     * handle create new Product action
     * @return string
     */
    public function actionCreate(){

        $message = '';

        if(\Yii::$app->request->isPost){
            $model = new Products;
            $model->load(\Yii::$app->request->post());
            if ($model->validate()) {
                $response = \Yii::$app->AWSRequest->loadAnsi($model->asin);

                if(!$response->hasError()){

                    foreach ($response->getData() as $key => $datum) {
                        $model->setAttribute($key,$datum);
                    }
                    try {
                        if ($model->save()) {
                            $message = "New item with ASIN: {$model->asin} successfully added";
                        } else {
                            $message = "Can not store records";
                        }
                    }catch (Exception $e){
                        if($e->getCode() == 23000){
                            $message = "The ASIN: {$model->asin} already exists in records.";
                        }else {
                            $message = $e->getMessage();
                        }
                    }

                }else{
                    $message = $response->getError();
                }
            }
        }

        return $this->render('create',[
            'message' => $message
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \Exception
     * @throws \Throwable
     */
    public function actionDelete($id){
        $model = Products::findOne(['id'=>$id]);

        try {
            $deleted = $model && $model->delete();
        }catch (Exception $e){
            $deleted = false;
        }

        return $this->redirect(['site/index', 'deleted' => $deleted]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionUpdate($id){
        $model = Products::findOne(['id'=>$id]);

        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if($model->validate() && $model->save()){
                $message = 'Records successfully updated';
            }else{
                $message = 'Failed to update records';
            }
        }

        return $this->render('update', [
            'data' => $model,
            'message' => $message
        ]);
    }

}