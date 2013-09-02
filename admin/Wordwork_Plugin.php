<?php


include_once('Wordwork_LifeCycle.php');

class Wordwork_Plugin extends Wordwork_LifeCycle {
	

    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            'ATextInput' => array(__('Enter in some text', 'my-awesome-plugin')),
            'Donated' => array(__('I have donated to this plugin', 'my-awesome-plugin'), 'false', 'true'),
            'CanSeeSubmitData' => array(__('Can See Submission data', 'my-awesome-plugin'),
                                        'Administrator', 'Editor', 'Author', 'Contributor', 'Subscriber', 'Anyone')
        );
    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
	
    }

    public function getPluginDisplayName() {
        return 'wordwork';
    }

    protected function getMainPluginFileName() {
        return 'wordwork.php';
    }

    protected function installDatabaseTables() {
    }

 
    protected function unInstallDatabaseTables() {
    
    }

    public function upgrade() {
    }

    public function addActionsAndFilters() {
	
	include(sprintf("%s/templates/menu.php", dirname(__FILE__)));	
	include(sprintf("%s/templates/samptemp.php", dirname(__FILE__)));
	add_filter( 'page_template', 'wpa3396_page_template' );
	function wpa3396_page_template( $page_template )
		{
		if ( is_page( 'my-custom-page-slug' ) ) {
        $page_template = dirname( __FILE__ ) . '/page.php';
		}
		return $page_template;
	}
	
}
	
}




?>