<?php
/* @var $this FormSelectGroup */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <select name="<?= $this->inputName ?>" class="form-control">
            <?php $fetchFunctionName = $this->values; ?>
            <?php foreach ($model->$fetchFunctionName() as $key => $value) : ?>
            <?php $temp = $this->inputName; ?>
                <?php $selected = ($model->$temp == $key) ? 'selected' : ''; ?>

                <option value="<?= $key ?>" <?= $selected ?>>
                    <?= CHtml::encode($value) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>
