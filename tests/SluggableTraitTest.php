<?php

namespace Medianet\APIToolKit\Tests;

use Medianet\APIToolKit\Tests\Mocks\Models\SluggableTestModel;
use Illuminate\Database\Eloquent\Model;

class SluggableTraitTest extends TestCase
{
    /**
     * @test
     */
    public function generatesSlugOnCreating(): void
    {
        $model = SluggableTestModel::create([
            'name' => 'Test Title',
        ]);

        $this->assertSame('test-title', $model->slug);
    }

    /**
     * @test
     */
    public function findBySlugScope(): void
    {
        $model = SluggableTestModel::create([
            'name' => 'Test Title',
        ]);

        $foundModel = SluggableTestModel::findBySlug('test-title');

        $this->assertInstanceOf(Model::class, $foundModel);

        $this->assertEquals($model->getKey(), $foundModel->getKey());
    }
}
