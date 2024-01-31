<?php

namespace Medianet\APIToolKit\Tests\Mocks\Models;

use Medianet\APIToolKit\Filters\Filterable;
use Medianet\APIToolKit\Tests\Mocks\TestModelFilters;
use Medianet\APIToolKit\Traits\HasActivation;
use Medianet\APIToolKit\Traits\HasCache;
use Medianet\APIToolKit\Traits\HasGeneratedCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestModel extends Model
{
    use Filterable;
    use HasActivation;
    use HasCache;
    use HasFactory;
    use HasGeneratedCode;

    protected string $default_filters = TestModelFilters::class;

    protected $guarded = [];

    public function sluggableTestModel(): HasMany
    {
        return $this->hasMany(SluggableTestModel::class);
    }
}
