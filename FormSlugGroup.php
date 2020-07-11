<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormSlugGroup extends FormGroup {

    /** @var string */
    public $sourceInputName = 'title';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formsluggroup', [
            'model' => $this->model
        ]);
    }

}
