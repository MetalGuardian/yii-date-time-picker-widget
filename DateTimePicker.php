<?php
namespace metalguardian;

\Yii::import('zii.widgets.jui.CJuiInputWidget');

/**
 * Class DateTimePicker
 * Require composer-asset-plugin
 * @see https://github.com/francoispluchino/composer-asset-plugin
 * Require 'vendor' alias exists
 * @used https://github.com/xdan/datetimepicker
 * @see http://xdsoft.net/jqplugins/datetimepicker/
 */
class DateTimePicker extends \CJuiInputWidget
{
	/**
	 * Prints input and register assigned scripts on it
	 *
	 * @throws \CException
	 */
	public function run()
	{
		list($name, $id) = $this->resolveNameID();

		if (isset($this->htmlOptions['id'])) {
			$id = $this->htmlOptions['id'];
		} else {
			$this->htmlOptions['id'] = $id;
		}

		if (isset($this->htmlOptions['name'])) {
			$name = $this->htmlOptions['name'];
		} else {
			$this->htmlOptions['name'] = $name;
		}

		if (isset($this->htmlOptions['name'])) {
			$name = $this->htmlOptions['name'];
		} else {
			$this->htmlOptions['name'] = $name;
		}

		if ($this->hasModel()) {
			echo \CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
		} else {
			echo \CHtml::textField($name, $this->value, $this->htmlOptions);
		}

		$options = \CJavaScript::encode($this->options);
		$js = "jQuery('#{$id}').datetimepicker($options);";

		\Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id, $js);
	}

	/**
	 * Determine the assets path and add assets package
	 */
	protected function resolvePackagePath()
	{
		// You need create 'vendor' alias
		$assetPath = \Yii::getPathOfAlias('vendor') . DIRECTORY_SEPARATOR . 'bower-asset' . DIRECTORY_SEPARATOR . 'datetimepicker';
		$assets = \Yii::app()->getAssetManager()->publish($assetPath);
		\Yii::app()->getClientScript()->addPackage(
			__CLASS__ . '#package',
			array(
				'baseUrl' => $assets,
				'js' => array(
					'jquery.datetimepicker.js',
				),
				'css' => array(
					'jquery.datetimepicker.css',
				),
				'depends' => array('jquery'),
			)
		);
	}

	/**
	 * Registers the assets package
	 */
	protected function registerCoreScripts()
	{
		\Yii::app()->getClientScript()->registerPackage(__CLASS__ . '#package');
	}

	/**
	 * Return full class name for php version < 5.5
	 *
	 * @return string
	 */
	public static function className()
	{
		return get_called_class();
	}
}
