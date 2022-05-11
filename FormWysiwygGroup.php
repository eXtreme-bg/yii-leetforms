<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormWysiwygGroup extends FormGroup {

    /**
     * @var string Input container class
     */
    public $inputContainerClass = 'col-md-6';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('wysiwyg-group', [
            'model' => $this->model
        ]);
    }
}
