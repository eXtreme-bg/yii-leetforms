<?php
/* @var $this FormGenerator */
/* @var $model mixed */
?>

<?php foreach ($model->formFields as $value): ?>
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

    if (array_key_exists('format', $value)) {
        $params['format'] = $value['format'];
    }

    if (array_key_exists('sourceInputName', $value)) {
        $params['sourceInputName'] = $value['sourceInputName'];
    }

    if (array_key_exists('html', $value)) {
        $params['html'] = $value['html'];
    }
    ?>

    <?php $this->widget('application.vendor.extreme-bg.yii-leetforms.' . $value['type'], $params); ?>
<?php endforeach; ?>
