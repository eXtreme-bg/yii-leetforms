<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormDateTimeGroup extends CWidget {

    /** @var <T> ActiveRecord model */
    public $model;

    /** @var string Input name */
    public $inputName;

    /** @var string Input container class */
    public $inputContainerClass = 'col-md-2';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formdatetimegroup', [
            'model' => $this->model
        ]);
    }

}
