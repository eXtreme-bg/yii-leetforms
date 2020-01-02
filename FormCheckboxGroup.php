<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormCheckboxGroup extends CWidget {

    /** @var <T> ActiveRecord model */
    public $model;

    /** @var string Input name */
    public $inputName;

    /** @var string Input container class */
    public $inputContainerClass = 'col-sm-offset-2 col-sm-10';

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
