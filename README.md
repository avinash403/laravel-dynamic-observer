# Laravel Dynamic Observer
In laravel or any other framework which uses eloquent for data modelling, observer is a useful feature. But performing an action on model update without registering beforehand is handy. 

Laravel Dynamic Observer provides an easy way to observe your model in model itself by simply importing it in the model and defining the listener methods.

## Compatibility 
Any project with eloquent as database model.(can be a non-laravel project)

### Installation by Composer

	$ composer require avinash403/laravel-dynamic-observer


### Usage example

```php

//import ObserveModel trait
use ObserverModel\ObserverModel

class ExampleModel extends Model
{
	//include trait in the test class
	use ObserveModel;

	/**
	 * will be called before the create operation happens on the current model 
	 * @param  ExampleModel $model 		instance of ExampleModel
	 * @return void 
	 */
	private function beforeCreate($model)
	{
		//write your logic here
	}
	
}
```	

### Available methods
* beforeCreate : gets called before a records gets created
* afterCreate : gets called after a record gets created
* beforeUpdate : gets called before a record gets updated
* afterUpdate : gets called after a record gets updated
* beforeDelete : gets called before a record is deleted
* afterDelete : gets called after a record is deleted
* beforeSave : gets called before save method is invoked
* afterSave : gets called after save method is invoked
* beforeModelActivity : gets called before any model activity
* afterModelActivity : gets called after any model activity

### Test
Run test by simply typing 
```composer test```
from the root directory of this package.

### Contribute on github
clone this repository( https://github.com/avinash403/laravel-dynamic-observer.git ), make your changes and raise a pull request to development branch