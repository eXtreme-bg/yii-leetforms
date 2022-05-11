<?php
/* @var $this FormWysiwygGroup */
/* @var $model mixed */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

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
