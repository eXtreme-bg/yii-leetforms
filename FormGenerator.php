<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormGenerator extends CWidget {

    /**
     * @var <T> ActiveRecord model
     */
    public $model;

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('generator', [
            'model' => $this->model
        ]);
    }
}
