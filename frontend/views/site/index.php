<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $fruits app\models\Fruit[] */
/* @var $pagination yii\data\Pagination */

$this->title = 'Fruit Collection';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .filter_form_holder {
        display: flex;
        width: 100%;
        align-items: end;
        justify-content: space-between;
        margin-bottom: 35px;
    }
    .filter_form_holder .form-group {
        width: 43%;
    }
    .filter_form_holder button {
        width: 130px;
        max-height: 40px;
    }
    .product_holder {
        row-gap: 25px;
    }
    .product_holder .thumbnail img {
        width: 70%;
    }
    .product_holder .thumbnail {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
    }
    .pagination{
        margin-top: 40px;
        justify-content: center;
    }
    .pagination li a,    
    .pagination li span {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        text-decoration: none;
    }
    .pagination li.active a {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
    .caption {
        padding-block: 20px;
    }
</style>
<h1><?= Html::encode($this->title) ?></h1>

<!-- Filter Form -->
<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => ['index'],
            'options' => ['class' => 'form-inline filter_form_holder'],
        ]); ?>
            <?= $form->field($model, 'name')->textInput(['value' => $name, 'placeholder' => 'Filter by Name']) ?>
            <?= $form->field($model, 'family')->textInput(['value' => $family, 'placeholder' => 'Filter by Family']) ?>
            <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<!-- Fruit List -->
<div class="row product_holder">
    <?php foreach ($fruits as $fruit): ?>
        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <?php //= Html::img($fruit->getImageUrl(), ['class' => 'img-responsive']) ?>
                <img src="https://parspng.com/wp-content/uploads/2022/05/orangepng.parspng.com-5-150x150.png"/>
                <div class="caption">
                    <h4><?= Html::encode($fruit->name) ?></h4>
                    <p><?= Html::encode($fruit->family) ?></p>
                    <!-- Add to Favorites Button -->
                    <?php if (!in_array($fruit->id, array_map(function($fav) { return $fav->fruit_id; }, $favorites)) && count($favorites) < 10): ?>
                        <?= Html::a('Add to Favorites', ['add-to-favorites', 'id' => $fruit->id], [
                            'class' => 'btn btn-primary',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Are you sure you want to add this fruit to your favorites?',
                            ],
                        ]) ?>
                    <?php else: ?>
                        <?= Html::button('Added to Favorites', ['class' => 'btn btn-success', 'disabled' => true]) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
</div>

<!-- Pagination -->
<div class="row">
    <div class="col-md-12">
        <?= LinkPager::widget([
            'pagination' => $pagination,
        ]); ?>
    </div>
</div>

