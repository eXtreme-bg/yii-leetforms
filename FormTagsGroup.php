<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormTagsGroup extends FormGroup {

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formtagsgroup', [
            'model' => $this->model
        ]);
    }
}
