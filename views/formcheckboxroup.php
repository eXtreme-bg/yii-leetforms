<?php
/* @var $this FormCheckboxGroup */
/* @var $model mixed */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <div class="<?= $this->inputContainerClass ?>">
        <?php $temp = $this->inputName; ?>
        <?php $selected = (1 == $model->$temp) ? 'checked' : ''; ?>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="<?= $this->inputName ?>" value="1" <?= $selected ?>>

                <?= $model->attributeLabels()[$this->inputName] ?>
            </label>
        </div>
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>
