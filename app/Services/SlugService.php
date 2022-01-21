<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Class SlugService
 * @package App\Services
 */
class SlugService
{
    /**
     * Get current slugs from storage
     *
     * @param Model $model
     * @param string $field
     * @return Collection
     */
    protected function getSlugs(Model $model, string $field = 'slug'): Collection
    {
        return get_class($model)
            ::select($field)
            ->get()
            ->pluck($field);
    }

    /**
     * Build a new unique slug string
     *
     * @param string $prefix
     * @param Collection $existing
     * @return string
     */
    protected function buildSlug(string $prefix, Collection $existing): string
    {
        $counter = 1;

        $slugWithCounter = $prefix;

        while ($existing->contains($slugWithCounter)) {

            $slugWithCounter = $prefix . '-' . $counter;
            $counter++;

        }

        return $slugWithCounter;
    }

    /**
     * Get a unique slug for the provided model
     * 
     * @param Model $model
     * @param string $source
     * @param string $field
     * @return string
     */
    public function uniqueSlug(Model $model, string $source = 'title', string $field = 'slug'): string
    {
        $slugs = $this->getSlugs($model, $field);

        $slug = Str::slug($model->{$source});

        return $this->buildSlug($slug, $slugs);
    }
}