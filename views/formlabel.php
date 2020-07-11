<?php
/* @var $this FormLabel */
?>

<label for="<?= $this->inputName ?>" class="col-md-2 control-label">
    <?php if ($model->isAttributeRequired($this->inputName)) : ?>
        <?= $model->attributeLabels()[$this->inputName] ?>:*
    <?php else : ?>
        <?= $model->attributeLabels()[$this->inputName] ?>:
    <?php endif; ?>

    <span class="glyphicon glyphicon-question-sign hint" rel="tooltip" title="<?= $model->attributeHints()[$this->inputName] ?>"></span>
</label>
