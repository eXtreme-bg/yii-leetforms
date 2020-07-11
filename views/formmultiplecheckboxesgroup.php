<?php
/* @var $this FormMultipleCheckboxesGroup */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <?php $fetchFunctionName = $this->values; ?>
        <?php foreach ($model->$fetchFunctionName() as $key => $value) : ?>
            <?php $temp = $this->inputName; ?>
            <?php $selected = (in_array($key, $model->$temp)) ? 'checked' : ''; ?>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="<?= $this->inputName ?>[]" value="<?= $key ?>" <?= $selected ?>>

                    <?= CHtml::encode($value) ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>
