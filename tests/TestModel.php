<?php 

namespace Tests;

require 'tests/bootstrap.php';

use ObserveModel\ObserveModel;
use Illuminate\Database\Eloquent\Model;

/** 
 * just a test model
 */
class TestModel extends Model
{
   use ObserveModel;

   protected $table = 'tests';

   protected $fillable = ['test'];

   private function beforeCreate($model){
   		array_push($GLOBALS['methods'], 'beforeCreate');
   }

   private function afterCreate($model){
   		array_push($GLOBALS['methods'], 'afterCreate');
   }

   private function beforeUpdate($model){
   		array_push($GLOBALS['methods'], 'beforeUpdate');
   }

   private function afterUpdate($model){
   		array_push($GLOBALS['methods'], 'afterUpdate');
   }

   private function beforeDelete($model){
   		array_push($GLOBALS['methods'], 'beforeDelete');
   }
   
   private function afterDelete($model){
   		array_push($GLOBALS['methods'], 'afterDelete');
   }

   private function beforeSave($model){
   		array_push($GLOBALS['methods'], 'beforeSave');
   }
   
   private function afterSave($model){
   		array_push($GLOBALS['methods'], 'afterSave');
   }

   private function beforeModelActivity($model){
   		array_push($GLOBALS['methods'], 'beforeModelActivity');
   }

   private function afterModelActivity($model){
   		array_push($GLOBALS['methods'], 'afterModelActivity');
   }

   //afterRetrieve
   private function afterRetrieve($model){
         array_push($GLOBALS['methods'], 'afterRetrieve');
   }

}
