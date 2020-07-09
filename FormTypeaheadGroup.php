<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormTypeaheadGroup extends CWidget {

    /** @var <T> ActiveRecord model */
    public $model;

    /** @var string Input name */
    public $inputName;

    /** @var string Input container class */
    public $inputContainerClass = 'col-md-7';

    /** @var string Fetch URL */
    public $fetchUrl;

    /** @var array Selected keys */
    public $selected;

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formtypeaheadgroup', [
            'model' => $this->model
        ]);
    }

}
