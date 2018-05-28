<?php 

use PHPUnit\Framework\TestCase;
use Tests\TestModel;

class ObserveModelTest extends TestCase
{

	public function setUp(){
		TestModel::truncate();
		$GLOBALS['methods'] = [];	
	}

	public function tearDown(){
		TestModel::truncate();
	}

	public function test_create()
	{
		TestModel::create(['test'=>'soemthing']);
		
		$this->assertContains('beforeCreate', $GLOBALS['methods']);
		
		$this->assertContains('afterCreate', $GLOBALS['methods']);
		
		$this->assertContains('beforeSave', $GLOBALS['methods']);
		
		$this->assertContains('afterSave', $GLOBALS['methods']);

		$this->assertNotContains('beforeDelete', $GLOBALS['methods']);
		
		$this->assertNotContains('afterDelete', $GLOBALS['methods']);

		$this->assertContains('beforeModelActivity', $GLOBALS['methods']);

		$this->assertContains('afterModelActivity', $GLOBALS['methods']);

	}

	public function test_update()
	{
		TestModel::create(['test'=>'soemthing']);
		
		$GLOBALS['methods'] = [];	

		$model = TestModel::first();
		
		$model->update(['test'=>'something more']);

		$this->assertNotContains('beforeCreate', $GLOBALS['methods']);
		
		$this->assertNotContains('afterCreate', $GLOBALS['methods']);
		
		$this->assertContains('beforeSave', $GLOBALS['methods']);
		
		$this->assertContains('afterSave', $GLOBALS['methods']);

		$this->assertNotContains('beforeDelete', $GLOBALS['methods']);
		
		$this->assertNotContains('afterDelete', $GLOBALS['methods']);

		$this->assertContains('beforeModelActivity', $GLOBALS['methods']);

		$this->assertContains('afterModelActivity', $GLOBALS['methods']);
	}


	public function test_delete()
	{
		TestModel::create(['test'=>'soemthing']);
		
		$GLOBALS['methods'] = [];	

		$model = TestModel::first();
		
		$model->delete();

		$this->assertNotContains('beforeCreate', $GLOBALS['methods']);
		
		$this->assertNotContains('afterCreate', $GLOBALS['methods']);
		
		$this->assertNotContains('beforeSave', $GLOBALS['methods']);
		
		$this->assertNotContains('afterSave', $GLOBALS['methods']);

		$this->assertContains('beforeDelete', $GLOBALS['methods']);
		
		$this->assertContains('afterDelete', $GLOBALS['methods']);

		$this->assertContains('beforeModelActivity', $GLOBALS['methods']);

		$this->assertContains('afterModelActivity', $GLOBALS['methods']);
	}

	public function test_save()
	{
		TestModel::create(['test'=>'soemthing']);
		
		$GLOBALS['methods'] = [];	

		$model = TestModel::first();
		
		$model->test = 'something more';

		$model->save();

		$this->assertNotContains('beforeCreate', $GLOBALS['methods']);
		
		$this->assertNotContains('afterCreate', $GLOBALS['methods']);
		
		$this->assertContains('beforeSave', $GLOBALS['methods']);
		
		$this->assertContains('afterSave', $GLOBALS['methods']);

		$this->assertNotContains('beforeDelete', $GLOBALS['methods']);
		
		$this->assertNotContains('afterDelete', $GLOBALS['methods']);

		$this->assertContains('beforeModelActivity', $GLOBALS['methods']);

		$this->assertContains('afterModelActivity', $GLOBALS['methods']);
	}


	public function test_createUsingAnObject()
	{

		$model = new TestModel;

		$model->test = 'something more';

		$model->save();
		
		$this->assertContains('beforeCreate', $GLOBALS['methods']);
		
		$this->assertContains('afterCreate', $GLOBALS['methods']);
		
		$this->assertContains('beforeSave', $GLOBALS['methods']);
		
		$this->assertContains('afterSave', $GLOBALS['methods']);

		$this->assertNotContains('beforeDelete', $GLOBALS['methods']);
		
		$this->assertNotContains('afterDelete', $GLOBALS['methods']);

		$this->assertContains('beforeModelActivity', $GLOBALS['methods']);

		$this->assertContains('afterModelActivity', $GLOBALS['methods']);
	}
}