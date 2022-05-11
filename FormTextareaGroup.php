<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormTextareaGroup extends FormGroup {

    /**
     * @var string Input container class
     */
    public $inputContainerClass = 'col-md-7';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formtextareagroup', [
            'model' => $this->model
        ]);
    }
}
