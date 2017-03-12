<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container text-center">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <?php if($exception->statusCode == 404): ?>
        <?= Html::img("@web/images/404/404.png", ['alt' => 'Not Found']) ?>
    <?php endif; ?>

</div>
