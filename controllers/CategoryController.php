<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use yii\web\HttpException;


class CategoryController extends AppController{

    public function actionIndex(){
        $hits = Product::find()->where(['hit'=> '1'])->limit(6)->all();
        $this->setMeta('lashByLash');
        return $this->render('index', compact('hits'));
    }

    public function actionView($id){
        $category = Category::findOne($id);
        if(empty($category))
            throw new HttpException(404, 'Нет такой категории');
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
            'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('lashByLash | '. $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages', 'category'));
    }


}