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
        $this->render('formimagegroup', [
            'model' => $this->model
        ]);
    }
}
