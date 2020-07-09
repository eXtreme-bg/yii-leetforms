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
        <input type="hidden" name="<?= $this->inputName ?>[]" class="form-control">
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {
        $('input[type="hidden"]').typeaheadmultiselect({
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
