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
        <div class="input-group">
            <input type="text" name="<?= $this->inputName ?>" value="<?= CHtml::encode($model[$this->inputName]) ?>" class="form-control">

            <span class="input-group-btn">
                <button class="btn btn-default btn-generate-slug" type="button">
                    Генерирай
                </button>
            </span>
        </div>
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {
        $('.btn-generate-slug').click(function (event) {
            event.preventDefault();

            var url = '<?= Yii::app()->createUrl('admin/default/generateSlug', ['word' => '_WORD_']); ?>';
            var title = $('input[name="title"]').val();
            var slugInput = $('input[name="slug"]');
            url = url.replace('_WORD_', title);

            $.ajax({
                url: url,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    $(slugInput).val(data.data);
                },
                error: function() {
                    alert('<?= Yii::t('AdminModule.base', 'error.general') ?>');
                }
            });
        });
    });
</script>
