<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormImageGroup extends FormGroup {

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('image-group', [
            'model' => $this->model
        ]);
    }
}
