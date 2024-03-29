<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormLabel extends FormGroup {

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('label', [
            'model' => $this->model
        ]);
    }
}
