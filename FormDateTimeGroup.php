<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormDateTimeGroup extends FormGroup {

    /**
     * @var string Input container class
     */
    public $inputContainerClass = 'col-md-2';

    /**
     * @var string Display format
     */
    public $format = 'DD.MM.YYYY';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formdatetimegroup', [
            'model' => $this->model
        ]);
    }
}
