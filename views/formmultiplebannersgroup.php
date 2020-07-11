<?php
/* @var $this FormMultipleBannersGroup */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <input type="hidden" name="<?= $this->inputName ?>" value="<?= $model[$this->inputName] ?>">

        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-2">
                <label class="control-label">
                    Снимка:*
                </label>
            </div>

            <div class="col-md-5">
                <label class="control-label">
                    Линк:*
                </label>
            </div>

            <div class="col-md-4">
                <label class="control-label">
                    Title/Alt атрибут:
                </label>
            </div>
        </div>

        <?php foreach (unserialize($model[$this->inputName]) as $key => $items) : ?>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-2">
                    <input type="hidden" name="bannerpictureurl[]" value="<?= $items['pictureurl'] ?>">

                    <a href="#" class="add-picture-button">
                        <?php if (!empty($items['pictureurl'])) : ?>
                            <img src="<?= $items['pictureurl'] ?>" alt="" class="img-responsive">
                        <?php else: ?>
                            <img src="/assets/admin/js/photoeditor/img/placeholder-alt.png" alt="" class="img-responsive">
                        <?php endif; ?>
                    </a>
                </div>

                <div class="col-md-4">
                    <input type="text" name="bannerurl[]" value="<?= CHtml::encode($items['url']) ?>" class="form-control">
                </div>

                <div class="col-md-4">
                    <input type="text" name="bannertitle[]" value="<?= CHtml::encode($items['title']) ?>" class="form-control">
                </div>

                <div class="col-md-2">
                    <div class="btn-group">
                        <button class="btn btn-default btn-add-row">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>

                        <button class="btn btn-default btn-remove-row">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-2">
                <input type="hidden" name="bannerpictureurl[]" value="">

                <a href="#" class="add-picture-button">
                    <img src="/assets/admin/js/photoeditor/img/placeholder-alt.png" alt="" class="img-responsive">
                </a>
            </div>

            <div class="col-md-4">
                <input type="text" name="bannerurl[]" value="" class="form-control">
            </div>

            <div class="col-md-4">
                <input type="text" name="bannertitle[]" value="" class="form-control">
            </div>

            <div class="col-md-2">
                <div class="btn-group">
                    <button class="btn btn-default btn-add-row">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>

                    <button class="btn btn-default btn-remove-row">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {

        ////////////////////////////////////////////////////////////////////////////
        // Properties
        ////////////////////////////////////////////////////////////////////////////

        var clickedButton;

        ////////////////////////////////////////////////////////////////////////////
        // Create interface
        ////////////////////////////////////////////////////////////////////////////

        var form = $('<form></form>', {
            action : '',
            method: 'POST',
            style: 'display: none'
        });

        var fileInput = $('<input>', {
            type: 'file',
            name: 'image',
            on: {
                change: function (event) {
                    var url = '<?= Yii::app()->createUrl('admin/default/uploadImage', ['formName' => 'image']) ?>';

                    form.ajaxForm({
                        url: url,
                        dataType: 'json',
                        cache: false,
                        success: function (data) {
                            if (data.status && data.status === 'OK') {
                                clickedButton.find('img').unbind('load').attr('src', data.url);
                                clickedButton.closest('div').find('input[type="hidden"]').val(data.url);
                            } else {
                                alert('<?= Yii::t('AdminModule.base', 'error.general') ?>');
                            }
                        },
                        error: function () {
                            alert('<?= Yii::t('AdminModule.base', 'error.general') ?>');
                        }
                    }).submit();

                    form.ajaxFormUnbind();
                }
            }
        });

        // VOLTRON!
        form.appendTo($('body'));
        fileInput.appendTo(form);

        ////////////////////////////////////////////////////////////////////////////
        //
        ////////////////////////////////////////////////////////////////////////////

        $('.add-picture-button').click(function (e) {
            e.preventDefault();

            clickedButton = $(this);

            form.find('input[name=image]').click();

            return false;
        });

        $('.btn-add-row').click(function (e) {
            e.preventDefault();

            var wrap = $(this).closest('div.row');

            var clone = $(wrap).clone(true);

            clone.find('input').val('');
            clone.find('.add-picture-button img').attr('src', '/assets/admin/js/photoeditor/img/placeholder-alt.png');

            clone.insertAfter(wrap);

            return false;
        });

        $('.btn-remove-row').click(function (e) {
            e.preventDefault();

            $(this).closest('div.row').remove();

            return false;
        });
    });
</script>
