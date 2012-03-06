<?php
class Template {

	protected $variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller,$action) {
		$this->_controller = $controller;
		$this->_action = $action;
	}

	/** Set Variables **/

	function set($name,$value) {
		$this->variables[$name] = $value;
	}

	/** Display Template **/

    function render() {
		extract($this->variables);
			include (ROOT . DS . 'application' . DS . 'views' . DS . 'header.php');
			if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'defineIncludes.php')) {
				include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'defineIncludes.php');
			}
			include (ROOT . DS . 'application' . DS . 'views' . DS . 'headerEnd.php'); // give views the chance to include there own stlysheets / js etc
			
			if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php')) {
				include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php');
			}
			
        include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php');		 

			if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php')) {
				include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php');
			} 
			include (ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php');
    }

}
