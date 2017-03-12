<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\web\HttpException;

class ProductController extends AppController
{

    public function actionView($id) {
        $id = Yii::$app->request->get('id');
        // ленивая загрузка
        $product = Product::findOne($id);
        if(empty($product))
            throw new HttpException(404, 'Нет такого товара');
        // жадная загрузка
        //$product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();
        $hits = Product::find()->where(['hit'=> '1'])->limit(6)->all();
        $this->setMeta('lashByLash | '. $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));

    }

}