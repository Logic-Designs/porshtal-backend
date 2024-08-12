<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * Apply search to a query builder for model fields and related model fields.
     *
     * @param Builder $query
     * @param string|null $search
     * @param array $fields
     * @param array $relations
     * @return Builder
     */
    public function scopeSearch(Builder $query, ?string $search, array $fields = [], array $relations = []): Builder
    {
        if ($search) {
            $query->where(function ($query) use ($search, $fields, $relations) {
                // Search within the model's own fields
                foreach ($fields as $field) {
                    $query->orWhere($field, 'LIKE', "%{$search}%");
                }

                // Search within related models
                foreach ($relations as $relation => $relationFields) {
                    $query->orWhereHas($relation, function ($query) use ($search, $relationFields) {
                        foreach ($relationFields as $field) {
                            $query->orWhere($field, 'LIKE', "%{$search}%");
                        }
                    });
                }
            });
        }

        return $query;
    }

    public function scopeSearchWithRelations($query, $search, $relations = [])
    {
        if ($search) {
            $query->where(function ($query) use ($search, $relations) {
                foreach ($relations as $relation => $fields) {
                    $query->orWhereHas($relation, function ($query) use ($search, $fields) {
                        foreach ($fields as $field) {
                            $query->orWhere($field, 'LIKE', "%{$search}%");
                        }
                    });
                }
            });
        }

        return $query;
    }
}
