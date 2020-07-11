<?php
/* @var $this FormInputGroup */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <input type="<?= $this->inputType ?>" name="<?= $this->inputName ?>" value="<?= CHtml::encode($model[$this->inputName]) ?>" class="form-control">
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>
