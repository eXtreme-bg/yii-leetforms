<?php
/* @var $this FormTypeaheadGroup */
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
