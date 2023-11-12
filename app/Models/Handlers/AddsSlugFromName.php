<?php

declare(strict_types=1);

namespace App\Models\Handlers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

final class AddsSlugFromName
{
    public function __construct(Model $model)
    {
        $model->update([
            'slug' => Str::slug($model->name),
        ]);
    }
}
