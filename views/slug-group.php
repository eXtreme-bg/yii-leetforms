<?php
/* @var $this FormSlugGroup */
/* @var $model mixed */
?>

<div class="form-group <?= $model->getError($this->inputName) ? 'has-error' : '' ?>">
    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.FormLabel', [
        'model' => $model,
        'inputName' => $this->inputName
    ]); ?>

    <div class="<?= $this->inputContainerClass ?>">
        <div class="input-group">
            <input type="text" name="<?= $this->inputName ?>" value="<?= CHtml::encode($model[$this->inputName]) ?>" class="form-control">

            <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-generate-slug" data-source-input-name="<?= $this->sourceInputName ?>">
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
    function urlLit(w, v) {
        var tr = 'a b v g d e ["zh","j"] z i y k l m n o p r s t u f h c ch sh ["sht","6t"] a ~ y ~ yu ya'.split(' ');
        var ww = '';
        w = w.toLowerCase().replace(/–/g, '-');
        for (i = 0; i < w.length; ++i) {
          cc = w.charCodeAt(i);
          ch = (cc >= 1072 ? tr[cc-1072] : w[i]);
          if (ch.length < 3) {
              ww += ch;
          } else {
              ww += eval(ch)[v];
          }
        }

        return (ww.replace(/[^a-zA-Z0-9\-]/g, '-').replace(/[-]{2,}/gim, '-').replace(/^\-+/g, '').replace(/\-+$/g, ''));
    }

    $(function() {
        $('.btn-generate-slug').on('click', function (event) {
            event.preventDefault();

            var sourceInputName = $(this).attr('data-source-input-name');
            var source = $('input[name="' + sourceInputName + '"]').val();
            var input = $(this).closest('.input-group').find('input');

            input.val(urlLit(source, 0));
        });
    });
</script>
