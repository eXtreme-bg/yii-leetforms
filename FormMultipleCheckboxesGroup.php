<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormMultipleCheckboxesGroup extends FormGroup {

    /** @var string Function name that returns values */
    public $values = 'getStatuses';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('formmultiplecheckboxesgroup', [
            'model' => $this->model
        ]);
    }

}
