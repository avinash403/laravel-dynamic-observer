# Laravel Dynamic Observer
Registering everytime you create a model is painful. Laravel-dynamic-observer gives an easy way to obeserve your model in model itself

### Installation by Composer

	$ composer require avinash403/laravel-dynamic-observer


### Usage example

```php

//import ObserveModel trait
import ObserverModel

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

## Currently not in production ##

### Contribute on github
clone this repository( https://github.com/avinash403/laravel-dynamic-observer.git ), make your changes and raise a pull request to development branch