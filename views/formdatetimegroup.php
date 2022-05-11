<?php
/* @var $this FormDateTimeGroup */
/* @var $model mixed */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <input type="hidden" name="<?= $this->inputName ?>" value="<?= $model[$this->inputName] ?>">

        <div class="input-group datepicker-<?= $this->inputName ?>">
            <input type="text" value="" class="form-control">

            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
        </div>
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {
        var hiddenInput = $('input[name="<?= $this->inputName ?>"]');
        var format = '<?= $this->format ?>';

        $('.datepicker-<?= $this->inputName ?>').datetimepicker({
            format: format,
            locale: 'bg',
            showClear: true
        });

        if (hiddenInput.val() !== '') {
            date = moment(parseInt(hiddenInput.val()) * 1000);

            hiddenInput.val(date.format('X'));
            $('.datepicker-<?= $this->inputName ?> input').val(date.format(format));
        }

        $('.datepicker-<?= $this->inputName ?>').on('dp.change', function (e) {
            if (e.oldDate !== null && e.oldDate !== false) {
                if (e.date !== false) {
                    var timestamp = e.date.format('X');

                    hiddenInput.val(timestamp);
                } else {
                    hiddenInput.val('');
                }
            }
        });
    });
</script>
