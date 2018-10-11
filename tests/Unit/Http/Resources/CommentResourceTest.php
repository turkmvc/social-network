<?php

namespace Tests\Unit\Http\Resources;

use App\User;
use Tests\TestCase;
use App\Models\Status;
use App\Http\Resources\UserResource;
use App\Http\Resources\CommentResource;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentResourceTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_comment_resource_must_have_the_necessary_fields()
    {

        // Variables
        $comment = factory(Status::class)->create();

        // Given
        $commentResource = CommentResource::make($comment)->resolve();


        // When
        $this->assertEquals(
            $comment->id,
            $commentResource['id']
        );
        $this->assertEquals(
            $comment->body,
            $commentResource['body']
        );
        $this->assertEquals(
            0,
            $commentResource['likes_count']
        );
        $this->assertEquals(
            false,
            $commentResource['is_liked']
        );
        $this->assertInstanceOf(
            UserResource::class,
            $commentResource['user']
        );
        $this->assertInstanceOf(
            User::class,
            $commentResource['user']->resource
        );

    }
}
