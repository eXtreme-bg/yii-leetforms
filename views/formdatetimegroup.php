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
    $(document).ready(function () {
        var format = 'DD.MM.YYYY';

        var date = moment();

        if ('<?= $model[$this->inputName] ?>' !== '') {
            date = moment(parseInt('<?= $model[$this->inputName] ?>') * 1000);
        }

        $('input[name="<?= $this->inputName ?>"]').val(date.format('X'));
        $('.datepicker-<?= $this->inputName ?> input').val(date.format(format));

        $('.datepicker-<?= $this->inputName ?>').datetimepicker({
            format: format,
            locale: 'bg'
        });

        $('.datepicker-<?= $this->inputName ?>').on('dp.change', function (e) {
            if (e.oldDate !== null && e.oldDate !== false) {
                var timestamp = e.date.format('X');

                $('input[name="<?= $this->inputName ?>"]').val(timestamp);
            }
        });
    });
</script>
