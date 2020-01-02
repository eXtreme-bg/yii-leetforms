<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormInputGroup extends CWidget {

    /** @var <T> ActiveRecord model */
    public $model;

    /** @var string Input name */
    public $inputName;

    /** @var string Input container class */
    public $inputContainerClass = 'col-md-3';

    /** @var string Input type */
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
