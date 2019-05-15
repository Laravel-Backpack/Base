<?php

namespace Backpack\Base\app\Models\Traits;

use Illuminate\Support\Str;
use ReflectionClass;

/**
 * This trait helps a child model (ex: BackpackUser) inherit all relationships of its parent model (ex: User).
 * Laravel by default doesn't do that, so packages like Backpack\PermissionManager can't see relationships
 * on the BackpackUser model, because they haven't been inherited from User.
 *
 * The code below has been copy-pasted from https://github.com/tightenco/parental on Feb 27th 2019.
 * When they provide support for Laravel 5.8, this entire trait could go away (or load their trait).
 */
trait InheritsRelationsFromParentModel
{
    public $hasParent = true;

    public static function bootHasParent()
    {
        static::creating(function ($model) {
            if ($model->parentHasHasChildrenTrait()) {
                $model->forceFill(
                    [$model->getInheritanceColumn() => $model->classToAlias(get_class($model))]
                );
            }
        });
        static::addGlobalScope(function ($query) {
            $instance = new static();
            if ($instance->parentHasHasChildrenTrait()) {
                $query->where($instance->getInheritanceColumn(), $instance->classToAlias(get_class($instance)));
            }
        });
    }

    public function parentHasHasChildrenTrait()
    {
        return $this->hasChildren ?? false;
    }

    public function getTable()
    {
        if (!isset($this->table)) {
            return str_replace('\\', '', Str::snake(Str::plural(class_basename($this->getParentClass()))));
        }

        return $this->table;
    }

    public function getForeignKey()
    {
        return Str::snake(class_basename($this->getParentClass())).'_'.$this->primaryKey;
    }

    public function joiningTable($related, $instance = null)
    {
        $relatedClassName = method_exists((new $related()), 'getClassNameForRelationships')
            ? (new $related())->getClassNameForRelationships()
            : class_basename($related);
        $models = [
            Str::snake($relatedClassName),
            Str::snake($this->getClassNameForRelationships()),
        ];
        sort($models);

        return strtolower(implode('_', $models));
    }

    public function getClassNameForRelationships()
    {
        return class_basename($this->getParentClass());
    }

    public function getMorphClass()
    {
        if ($this->parentHasHasChildrenTrait()) {
            $parentClass = $this->getParentClass();

            return (new $parentClass())->getMorphClass();
        }

        return parent::getMorphClass();
    }

    protected function getParentClass()
    {
        static $parentClassName;

        return $parentClassName ?: $parentClassName = (new ReflectionClass($this))->getParentClass()->getName();
    }
}
