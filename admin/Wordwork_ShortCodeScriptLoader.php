<?php

include_once('Wordwork_ShortCodeLoader.php');

abstract class Wordwork_ShortCodeScriptLoader extends Wordwork_ShortCodeLoader {

    var $doAddScript;

    public function register($shortcodeName) {
        $this->registerShortcodeToFunction($shortcodeName, 'handleShortcodeWrapper');

        // It will be too late to enqueue the script in the header,
        // but can add them to the footer
        add_action('wp_footer', array($this, 'addScriptWrapper'));
    }

    public function handleShortcodeWrapper($atts) {
        // Flag that we need to add the script
        $this->doAddScript = true;
        return $this->handleShortcode($atts);
    }


    public function addScriptWrapper() {
        // Only add the script if the shortcode was actually called
        if ($this->doAddScript) {
            $this->addScript();
        }
    }

    public abstract function addScript();

}
