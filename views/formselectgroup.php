<?php
/* @var $this FormSelectGroup */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <label for="<?= $this->inputName ?>" class="col-md-2 control-label">
        <?php if ($model->isAttributeRequired($this->inputName)) : ?>
            <?= $model->attributeLabels()[$this->inputName] ?>:*
        <?php else : ?>
            <?= $model->attributeLabels()[$this->inputName] ?>:
        <?php endif; ?>

        <span class="glyphicon glyphicon-question-sign hint" rel="tooltip" title="<?= $model->attributeHints()[$this->inputName] ?>"></span>
    </label>

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
