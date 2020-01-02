<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormTypeaheadMultiselectGroup extends CWidget {

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
        $this->render('formtypeaheadmultiselectgroup', [
            'model' => $this->model
        ]);
    }

}
