# Laravel Dynamic Observer
In laravel or any other framework which uses eloquent for data modelling, observer is a useful feature. But performing an action on model update without registering beforehand is handy. 

Laravel Dynamic Observer provides an easy way to observe your model in model itself by simply importing it in the model and defining the listener methods.

## Motivation
It is real easy to create a trait yourself and use it with eloquent model events but it is not worth it in writing the same piece of code in all of your projects.Apart from this, there are cases where we need to perform same action on creation, updation and deletion of a model(for example, clearing a particular cache after a record is updated, created or deleted). In those scenarios we have an option of either writing the same piece of code in all of those event listener or make a common method and call it in all of them. 
The later scenario is the key motivation for making this package so that we can have a method in our model which gets called automatically as soon as any model activity(create, update or delete) happens.
 
## Compatibility 
Any project with eloquent as database model.(can be a non-laravel project)

### Installation by Composer

	$ composer require avinash403/laravel-dynamic-observer


### Usage example

```php

//import ObserveModel trait
use ObserveModel\ObserveModel

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
* afterRetrieve : gets called after a record is retrieved


### Point to remember
***Methods related to update and delete only gets called if the record is retrieved from the DB before updating or deleting. The reason is when we are using an update directly on a query, we are not actually performing any action.***
For eg.

```
Model::where('field','value')->update(['field'=>'new value']);
```

here we are calling `Eloquent\Builder@update` not `Model@update`, so it just cannot call update event. Same is applicable to delete event.

But when we are doing something like this:

```
Model::where('field','value')->first()->update(['field'=>'new value']);
```

We exactly know which record we have fetched. In this case we have used `Model@update`, which will cause event to fire.


### Test
Run test by simply typing 
```composer test```
from the root directory of this package.

### Contribute on github
clone this repository( https://github.com/avinash403/laravel-dynamic-observer.git ), make your changes and raise a pull request to development branch
