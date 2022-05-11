<?php
/* @var $this FormImageGroup */
/* @var $model mixed */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <input type="text" name="<?= $this->inputName ?>" value="<?= CHtml::encode($model[$this->inputName]) ?>" class="form-control">
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(function() {
        // Properties
        var uploadUrl = '<?= Yii::app()->createUrl('admin/default/uploadImage', ['formName' => 'photoUpload']) ?>';
        var imagesFolderUrl = '<?= Yii::app()->params['images_url'] ?>';

        // Initialize the photo editor
        $('input[name=<?= $this->inputName ?>]').photoeditor({
            imagesFolderUrl: imagesFolderUrl,
            uploadFunction: function (event) {
                var formData = new FormData();
                formData.append('photoUpload', event.target.files[0]);

                var returnValue;

                $.ajax({
                    url: uploadUrl,
                    data: formData,
                    context: document.body,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function (response) {
                        if (response.status === 'OK') {
                            var uploadedfileurl = imagesFolderUrl + response.filename;

                            returnValue = {status: 'OK', photourl: uploadedfileurl};
                        } else if (response.status === 'FAIL') {
                            returnValue = {status: 'FAIL', error: response.errors};
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        returnValue = {status: 'FAIL', error: 'The file cannot be uploaded.'};
                    }
                });

                return returnValue;
            }
        });
    });
</script>
