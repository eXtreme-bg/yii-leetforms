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
        <input type="<?= $this->inputType ?>" name="<?= $this->inputName ?>" value="<?= CHtml::encode($model[$this->inputName]) ?>" class="form-control">
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>
