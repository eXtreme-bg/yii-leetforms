<?php foreach ($model->formFields as $value) : ?>
    <?php
    $params = [
        'model' => $model,
        'inputName' => $value['inputName']
    ];

    if (array_key_exists('inputContainerClass', $value)) {
        $params['inputContainerClass'] = $value['inputContainerClass'];
    }

    if (array_key_exists('inputType', $value)) {
        $params['inputType'] = $value['inputType'];
    }

    if (array_key_exists('values', $value)) {
        $params['values'] = $value['values'];
    }

    if (array_key_exists('selected', $value)) {
        $params['selected'] = $value['selected'];
    }

    if (array_key_exists('fetchUrl', $value)) {
        $params['fetchUrl'] = $value['fetchUrl'];
    }
    ?>

    <?php $this->widget('application.vendor.eXtreme-bg.yii-leetforms.' . $value['type'], $params); ?>
<?php endforeach; ?>
