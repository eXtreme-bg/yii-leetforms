<?php

/**
 * @author Bogdan Kovachev (https://1337.bg)
 */
class FormCustomHtml extends FormGroup {

    /**
     * @var string Custom HTML
     */
    public $html = '';

    /**
     * {@inheritDoc}
     */
    public function init() {
        // Render
        $this->render('custom-html', [
            'html' => $this->html
        ]);
    }
}
