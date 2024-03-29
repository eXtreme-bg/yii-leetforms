<?php
/* @var $this FormTypeaheadGroup */
/* @var $model mixed */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <input type="hidden" name="<?= $this->inputName ?>" value="<?= CHtml::encode($model[$this->inputName]) ?>">

        <input type="text" name="<?= $this->inputName ?>-typeahead" value="<?= CHtml::encode($model[$this->inputName]) ?>" id="<?= $this->inputName ?>" class="form-control" autocomplete="off">
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {
        var hiddenInput = $('input[name="<?= $this->inputName ?>"]');
        var input = $('input[name="<?= $this->inputName ?>-typeahead"]');
        var url = '<?= $this->fetchUrl ?>';

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.status === 'OK') {
                    $.each(data.items, function(index, value) {
                        if (value.id === hiddenInput.val()) {
                            input.val(value.text);
                        }
                    });

                    input.typeahead({
                        source: data.items,
                        minLength: 1,
                        showHintOnFocus: false,
                        displayText: function (item) {
                            return item.text;
                        },
                        afterSelect: function(item) {
                            hiddenInput.val(item.id);
                        },
                        delay: 500
                    });
                } else {
                    alert('<?= Yii::t('AdminModule.base', 'error.general') ?>');
                }
            },
            error: function () {
                alert('<?= Yii::t('AdminModule.base', 'error.general') ?>');
            }
        });
    });
</script>
