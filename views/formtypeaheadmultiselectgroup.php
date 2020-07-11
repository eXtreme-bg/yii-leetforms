<?php
/* @var $this FormTypeaheadMultiselectGroup */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <input type="hidden" name="<?= $this->inputName ?>[]" class="form-control">
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {
        $('input[name="<?= $this->inputName ?>[]"]').typeaheadmultiselect({
            selected: <?= CJSON::encode($this->selected) ?>,
            translations: {
                inputplaceholder: 'Започни да пишеш...'
            },
            fetchFunction: function(callback) {
                var url = '<?= $this->fetchUrl ?>';

                $.get(url, function (data) {
                    callback(JSON.parse(data));
                });
            }
        });
    });
</script>
