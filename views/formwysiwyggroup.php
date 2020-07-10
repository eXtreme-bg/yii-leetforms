<?php
/* @var $this FormWysiwygGroup */
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
        <textarea name="<?= $this->inputName ?>" class="form-control <?= $this->inputName ?>"><?= $model[$this->inputName] ?></textarea>
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {
        // Initialize CKEditor
        CKEDITOR.replace('<?= $this->inputName ?>');
    });
</script>
