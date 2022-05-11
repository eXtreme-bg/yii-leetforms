<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormCheckboxGroup extends FormGroup {

    /**
     * @var string Input container class
     */
    public $inputContainerClass = 'col-sm-10 col-sm-offset-2';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formcheckboxroup', [
            'model' => $this->model
        ]);
    }
}
