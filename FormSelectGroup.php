<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormSelectGroup extends CWidget {

    /** @var <T> ActiveRecord model */
    public $model;

    /** @var string Input name */
    public $inputName;

    /** @var string Input container class */
    public $inputContainerClass = 'col-md-3';

    /** @var string Function name that returns values */
    public $values = 'getStatuses';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formselectgroup', [
            'model' => $this->model
        ]);
    }

}
