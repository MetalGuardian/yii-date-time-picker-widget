DateTimePicker Yii widget
====================
This yii extension is a wrapper for the powerful [jQuery date-time picker](https://github.com/xdan/datetimepicker)

Installation
------------

Install this extension using [composer](http://getcomposer.org/download/).

Run

```
php composer.phar require metalguardian/yii-date-time-picker-widget "*"
```

or add

```
"metalguardian/yii-date-time-picker-widget": "*"
```

to the require section of the `composer.json` file.


Usage
-----

```php

    <?php 
		$this->widget(
			\metalguardian\DateTimePicker::className(),
			array(
				'model' => $model,
				'attribute' => 'date_time_attribute',
				'options' => array(
					'format' => 'yy-mm-dd',
				),
				'htmlOptions' => array(
					'class' => 'custom-class',
				),
			)
		);
    ?>

```

For complete documentation of JQuery DateTimePicker and all widget options please refer to the [documentation page](http://xdsoft.net/jqplugins/datetimepicker/)

License
-------

**yii2-fotorama-widget** is released under the MIT License. See the bundled `LICENSE` for details.
