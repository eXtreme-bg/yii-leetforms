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
        <input type="text" name="<?= $this->inputName ?>" value="<?= CHtml::encode($model[$this->inputName]) ?>" class="form-control">
    </div>

    <span class="help-block">
        <?= CHtml::encode($model->getError($this->inputName)) ?>
    </span>
</div>

<script>
    $(document).ready(function () {
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