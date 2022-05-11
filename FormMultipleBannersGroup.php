<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormMultipleBannersGroup extends FormGroup {

    /**
     * @var string Input container class
     */
    public $inputContainerClass = 'col-md-8';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('multiple-banners-group', [
            'model' => $this->model
        ]);
    }
}
