<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormInputGroup extends FormGroup {

    /**
     * @var string Input type
     */
    public $inputType = 'text';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('forminputgroup', [
            'model' => $this->model
        ]);
    }
}
