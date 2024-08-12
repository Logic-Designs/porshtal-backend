<?php

namespace App\Traits;

trait Searchable
{
    public function scopeSearch($query, $search, $fields = [])
    {
        if ($search) {
            $query->where(function ($query) use ($search, $fields) {
                foreach ($fields as $field) {
                    $query->orWhere($field, 'LIKE', "%{$search}%");
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
