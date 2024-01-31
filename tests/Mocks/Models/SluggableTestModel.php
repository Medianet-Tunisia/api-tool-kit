<?php

namespace Medianet\APIToolKit\Tests\Mocks\Models;

use Medianet\APIToolKit\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SluggableTestModel extends Model
{
    use Sluggable;

    protected $guarded = [];

    public function testModel(): BelongsTo
    {
        return $this->belongsTo(TestModel::class);
    }
}
