<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormTypeaheadMultiselectGroup extends FormGroup {

    /**
     * @var string Input container class
     */
    public $inputContainerClass = 'col-md-7';

    /**
     * @var string Fetch URL
     */
    public $fetchUrl;

    /**
     * @var array Selected keys
     */
    public $selected;

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formtypeaheadmultiselectgroup', [
            'model' => $this->model
        ]);
    }
}
