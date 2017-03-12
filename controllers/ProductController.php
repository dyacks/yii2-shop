<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;

class ProductController extends AppController
{

    public function actionView($id) {
        $id = Yii::$app->request->get('id');
        // ленивая загрузка
        $product = Product::findOne($id);
        // жадная загрузка
        //$product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();
        return $this->render('view', compact('product'));

    }

}