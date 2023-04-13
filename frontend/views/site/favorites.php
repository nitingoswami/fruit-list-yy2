<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $fruits app\models\Fruit[] */
/* @var $pagination yii\data\Pagination */

$this->title = 'Favorite Fruits';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>    
    .product_holder {
        row-gap: 25px;
        margin-top:35px;
    }
    .product_holder .thumbnail img {
        width: 70%;
    }
    .product_holder .thumbnail {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
    }
    .info-holder{
        display: flex;
        flex-wrap: wrap;
    }
    .info-holder p {
        width: 50%;
        margin-bottom: 5px;
        color: #00000090;
    }
    .product_holder h4 {
        margin-block: 20px;
    }
</style>
<h1><?= Html::encode($this->title) ?></h1>


<!-- Fruit List -->
<div class="row product_holder">
    <?php foreach ($favorites as $fruit): ?>
        <div class="col-md-4">
            <div class="thumbnail">
                <?php //= Html::img($fruit->getImageUrl(), ['class' => 'img-responsive']) ?>
                <img src="https://parspng.com/wp-content/uploads/2022/05/orangepng.parspng.com-5-150x150.png"/>
                <div class="caption">
                    <h4><?= Html::encode($fruit->fruit->name) ?></h4>
                    <div class="info-holder">
                        <p>Family : <?= Html::encode($fruit->fruit->family) ?></p>
                        <p>Order  : <?= Html::encode($fruit->fruit->order) ?></p>
                        <p>Genus  : <?= Html::encode($fruit->fruit->genus) ?></p>
                        <p>Calories : <?= Html::encode($fruit->fruit->nutrition->calories) ?></p>
                        <p>Fat : <?= Html::encode($fruit->fruit->nutrition->fat) ?></p>
                        <p>Sugar : <?= Html::encode($fruit->fruit->nutrition->sugar) ?></p>
                        <p>Carbohydrates : <?= Html::encode($fruit->fruit->nutrition->carbohydrates) ?></p>
                        <p>Protein : <?= Html::encode($fruit->fruit->nutrition->protein) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
</div>

