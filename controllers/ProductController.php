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
        $hits = Product::find()->where(['hit'=> '1'])->limit(6)->all();
        $this->setMeta('lashByLash | '. $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));

    }

}