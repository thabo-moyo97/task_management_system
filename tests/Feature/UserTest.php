<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testTaskRelationship()
    {
        $user = new User();
        $relation = $user->tasks();

        $this->assertEquals('Illuminate\Database\Eloquent\Relations\HasMany', get_class($relation));
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }
}
