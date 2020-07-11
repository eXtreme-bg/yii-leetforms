<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormLabel extends CWidget {

    /** @var <T> ActiveRecord model */
    public $model;

    /** @var string Input name */
    public $inputName;

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formlabel', [
            'model' => $this->model
        ]);
    }

}
