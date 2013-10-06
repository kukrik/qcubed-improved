<?php
	/**
	 * QProgressbarGen File
	 * 
	 * The abstract QProgressbarGen class defined here is
	 * code-generated and contains options, events and methods scraped from the
	 * JQuery UI documentation Web site. It is not generated by the typical
	 * codegen process, but rather is generated periodically by the core QCubed
	 * team and checked in. However, the code to generate this file is
	 * in the assets/_core/php/_devetools/jquery_ui_gen/jq_control_gen.php file
	 * and you can regenerate the files if you need to.
	 *
	 * The comments in this file are taken from the JQuery UI site, so they do
	 * not always make sense with regard to QCubed. They are simply provided
	 * as reference. Note that this is very low-level code, and does not always
	 * update QCubed state variables. See the QProgressbarBase 
	 * file, which contains code to interface between this generated file and QCubed.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QProgressbar class file.
	 *
	 */

	/* Custom event classes for this control */
	
	
	/**
	 * <div>Triggered when the value of the progressbar
	 * 		changes.</div><ul><li><div><strong>event</strong></div> <div>Type:
	 * 		<a>Event</a></div> <div></div></li> <li><div><strong>ui</strong></div>
	 * 		<div>Type: <a>Object</a></div> <div></div></li></ul>
	 */
	class QProgressbar_ChangeEvent extends QJqUiEvent {
		const EventName = 'progressbarchange';
	}
	/**
	 * <div>Triggered when the value of the progressbar reaches the maximum
	 * 		value.</div><ul><li><div><strong>event</strong></div> <div>Type:
	 * 		<a>Event</a></div> <div></div></li> <li><div><strong>ui</strong></div>
	 * 		<div>Type: <a>Object</a></div> <div></div></li></ul>
	 */
	class QProgressbar_CompleteEvent extends QJqUiEvent {
		const EventName = 'progressbarcomplete';
	}
	/**
	 * <div>Triggered when the progressbar is
	 * 		created.</div><ul><li><div><strong>event</strong></div> <div>Type:
	 * 		<a>Event</a></div> <div></div></li> <li><div><strong>ui</strong></div>
	 * 		<div>Type: <a>Object</a></div> <div></div></li></ul>
	 */
	class QProgressbar_CreateEvent extends QJqUiEvent {
		const EventName = 'progressbarcreate';
	}

	/* Custom "property" event classes for this control */

	/**
	 * Generated QProgressbarGen class.
	 * 
	 * This is the QProgressbarGen class which is automatically generated
	 * by scraping the JQuery UI documentation website. As such, it includes all the options
	 * as listed by the JQuery UI website, which may or may not be appropriate for QCubed. See
	 * the QProgressbarBase class for any glue code to make this class more
	 * usable in QCubed.
	 * 
	 * @see QProgressbarBase
	 * @package Controls\Base
	 * @property boolean $Disabled <div>Disables the progressbar if set to <code>true</code>.</div>
	 * @property integer $Max <div>The maximum value of the progressbar.</div>
	 * @property integer $Value <div>The value of the progressbar.</div>
	 */

	class QProgressbarGen extends QPanel	{
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;
		/** @var boolean */
		protected $blnDisabled = null;
		/** @var integer */
		protected $intMax;
		/** @var integer */
		protected $intValue;
		
		protected function makeJsProperty($strProp, $strKey) {
			$objValue = $this->$strProp;
			if (null === $objValue) {
				return '';
			}

			return $strKey . ': ' . JavaScriptHelper::toJsObject($objValue) . ', ';
		}

		protected function makeJqOptions() {
			$strJqOptions = '';
			$strJqOptions .= $this->makeJsProperty('Disabled', 'disabled');
			$strJqOptions .= $this->makeJsProperty('Max', 'max');
			$strJqOptions .= $this->makeJsProperty('Value', 'value');
			if ($strJqOptions) $strJqOptions = substr($strJqOptions, 0, -2);
			return $strJqOptions;
		}

		public function getJqSetupFunction() {
			return 'progressbar';
		}

		public function GetControlJavaScript() {
			return sprintf('jQuery("#%s").%s({%s})', $this->getJqControlId(), $this->getJqSetupFunction(), $this->makeJqOptions());
		}

		public function GetEndScript() {
			$str = '';
			if ($this->getJqControlId() !== $this->ControlId) {
				// #845: if the element receiving the jQuery UI events is different than this control
				// we need to clean-up the previously attached event handlers, so that they are not duplicated 
				// during the next ajax update which replaces this control.
				$str = sprintf('jQuery("#%s").off(); ', $this->getJqControlId());
			}
			return $str . $this->GetControlJavaScript() . '; ' . parent::GetEndScript();
		}
		
		/**
		 * Call a JQuery UI Method on the object. 
		 * 
		 * A helper function to call a jQuery UI Method. Takes variable number of arguments.
		 * 
		 * @param string $strMethodName the method name to call
		 * @internal param $mixed [optional] $mixParam1
		 * @internal param $mixed [optional] $mixParam2
		 */
		protected function CallJqUiMethod($strMethodName /*, ... */) {
			$args = func_get_args();

			$strArgs = JavaScriptHelper::toJsObject($args);
			$strJs = sprintf('jQuery("#%s").%s(%s)',
				$this->getJqControlId(),
				$this->getJqSetupFunction(),
				substr($strArgs, 1, strlen($strArgs)-2));	// params without brackets
			QApplication::ExecuteJavaScript($strJs);
		}


		/**
		 * <div>Removes the progressbar functionality completely. This will return the
		 * element back to its pre-init state.</div><ul><li><div>This method does not
		 * accept any arguments.</div></li></ul>
		 */
		public function Destroy() {
			$this->CallJqUiMethod("destroy");
		}
		/**
		 * <div>Disables the progressbar.</div><ul><li><div>This method does not
		 * accept any arguments.</div></li></ul>
		 */
		public function Disable() {
			$this->CallJqUiMethod("disable");
		}
		/**
		 * <div>Enables the progressbar.</div><ul><li><div>This method does not accept
		 * any arguments.</div></li></ul>
		 */
		public function Enable() {
			$this->CallJqUiMethod("enable");
		}
		/**
		 * <div>Gets the value currently associated with the specified
		 * <code>optionName</code>.</div><ul><li><div><strong>optionName</strong></div>
		 * <div>Type: <a>String</a></div> <div>The name of the option to
		 * get.</div></li></ul>
		 * @param $optionName
		 */
		public function Option($optionName) {
			$this->CallJqUiMethod("option", $optionName);
		}
		/**
		 * <div>Gets an object containing key/value pairs representing the current
		 * progressbar options hash.</div><ul><li><div>This method does not accept any
		 * arguments.</div></li></ul>
		 */
		public function Option1() {
			$this->CallJqUiMethod("option");
		}
		/**
		 * <div>Sets the value of the progressbar option associated with the specified
		 * <code>optionName</code>.</div><ul><li><div><strong>optionName</strong></div>
		 * <div>Type: <a>String</a></div> <div>The name of the option to
		 * set.</div></li> <li><div><strong>value</strong></div> <div>Type:
		 * <a>Object</a></div> <div>A value to set for the option.</div></li></ul>
		 * @param $optionName
		 * @param $value
		 */
		public function Option2($optionName, $value) {
			$this->CallJqUiMethod("option", $optionName, $value);
		}
		/**
		 * <div>Sets one or more options for the
		 * progressbar.</div><ul><li><div><strong>options</strong></div> <div>Type:
		 * <a>Object</a></div> <div>A map of option-value pairs to
		 * set.</div></li></ul>
		 * @param $options
		 */
		public function Option3($options) {
			$this->CallJqUiMethod("option", $options);
		}
		/**
		 * <div>Gets the current value of the progressbar.</div><ul><li><div>This
		 * method does not accept any arguments.</div></li></ul>
		 */
		public function Value() {
			$this->CallJqUiMethod("value");
		}
		/**
		 * <div>Sets the current value of the
		 * progressbar.</div><ul><li><div><strong>value</strong></div> <div>Type:
		 * <a>Number</a></div> <div>The value to set.</div></li></ul>
		 * @param $value
		 */
		public function Value1($value) {
			$this->CallJqUiMethod("value", $value);
		}


		public function __get($strName) {
			switch ($strName) {
				case 'Disabled': return $this->blnDisabled;
				case 'Max': return $this->intMax;
				case 'Value': return $this->intValue;
				default: 
					try { 
						return parent::__get($strName); 
					} catch (QCallerException $objExc) { 
						$objExc->IncrementOffset(); 
						throw $objExc; 
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'Disabled':
					try {
						$this->blnDisabled = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'disabled', $this->blnDisabled);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Max':
					try {
						$this->intMax = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'max', $this->intMax);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Value':
					try {
						$this->intValue = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'value', $this->intValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				case 'Enabled':
					$this->Disabled = !$mixValue;	// Tie in standard QCubed functionality
					parent::__set($strName, $mixValue);
					break;
					
				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>