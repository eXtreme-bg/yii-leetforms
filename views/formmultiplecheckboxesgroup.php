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
