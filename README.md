# Laravel Dynamic Observer
Observe eloquent model in model itself.

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

	//will be called before the create operation happens on the current model
	private function beforeCreate($model)
	{
		//write your logic here
	}
	
}
```	

### Available methods
* beforeCreate
* afterCreate
* beforeUpdate
* afterUpdate
* beforeDelete
* afterDelete
* beforeModelActivity (gets called before any model activity)
* afterModelActivity (gets called after any model activity)

### Contribute on github
clone this repository( https://github.com/avinash403/laravel-dynamic-observer.git ), make your changes and raise a pull request to development branch