<?php 

namespace ObserveModel;

/**
 * To register a model's observer when needed (When a model is not used, registering it's observer doesn't make sense)
 *
 * PURPOSE: To allow declaring observer methods in model itself
 * 
 * USAGE : include this trait in the model. Now, create following methods  :
 *  'beforeCreate' for  observer method 'creating'
 *  'afterCreate' for  observer method 'created'
 *  'beforeUpdate' for  observer method 'updating'
 *  'afterUpdate' for  observer method 'updated'
 *  'beforeDelete' for  observer method 'deleting'
 *  'afterDelete' for  observer method 'deleted'
 *
 *
 * There are two more methods 'beforeModelActivity' and 'afterModelActivity', which gets called just before any activity
 *  or just after any activity in the model
 */

trait ObserveModel
{
    protected static function boot()
    {
        static::setEventDispatcher( new \Illuminate\Events\Dispatcher());

        parent::boot();

        
        //create
        static::creating(function($model) {
            if(method_exists($model, 'beforeCreate')){
                $model->beforeCreate($model);
            }

            if(method_exists($model, 'beforeModelActivity')){
                $model->beforeModelActivity($model);
            }

        });

        static::created(function($model) {
            if(method_exists($model, 'afterCreate')){
                $model->afterCreate($model);
            }
            
            if(method_exists($model, 'afterModelActivity')){
                $model->afterModelActivity($model);
            }
        });

        
        //update
        static::updating(function($model) {
            if(method_exists($model, 'beforeUpdate')){
                $model->beforeUpdate($model);
            }

            if(method_exists($model, 'beforeModelActivity')){
                $model->beforeModelActivity($model);
            }

        });

        static::updated(function($model) {
            if(method_exists($model, 'afterUpdate')){
                $model->afterUpdate($model);
            }

            if(method_exists($model, 'afterModelActivity')){
                $model->afterModelActivity($model);
            }
        });

        //save
        static::saving(function($model) {
            if(method_exists($model, 'beforeSave')){
                $model->beforeSave($model);
            }

            if(method_exists($model, 'beforeModelActivity')){
                $model->beforeModelActivity($model);
            }

        });

        static::saved(function($model) {
            if(method_exists($model, 'afterSave')){
                $model->afterSave($model);
            }

            if(method_exists($model, 'afterModelActivity')){
                $model->afterModelActivity($model);
            }
        });

        
        //delete
        static::deleting(function($model) {
            if(method_exists($model, 'beforeDelete')){
                $model->beforeDelete($model);
            }

            if(method_exists($model, 'beforeModelActivity')){
                $model->beforeModelActivity($model);
            }
        });

        static::deleted(function($model) {
            if(method_exists($model, 'afterDelete')){
                $model->afterDelete($model);
            }

            if(method_exists($model, 'afterModelActivity')){
                $model->afterModelActivity($model);
            }
        });
    }   
}