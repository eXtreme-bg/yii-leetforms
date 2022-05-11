<?php
/* @var $this FormTagsGroup */
/* @var $model mixed */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <input name="<?= $this->inputName ?>" value="<?= implode(',', ($model[$this->inputName])) ?>" class="form-control">
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {
        $('input[name="<?= $this->inputName ?>"]').selectize({
            plugins: [
                'remove_button',
                'restore_on_backspace'
            ],
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                };
            }
        });
    });
</script>
