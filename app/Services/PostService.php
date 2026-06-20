<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            if (isset($data['tags'])) {
                $tags = $data['tags'];
                unset($data['tags']);
            }

            $post = Post::firstOrCreate($data);

            if (isset($tags)) {
                $post->tags()->attach($tags);
            }

            DB::commit();

            return $post;

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    public function update($data, Post $post)
    {
        try {

            DB::beginTransaction();

            isset($data['preview_image']) && $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            isset($data['main_image']) && $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            if (isset($data['tags'])) {
                $tags = $data['tags'];
                unset($data['tags']);
            }

            $post->update($data);

            if (isset($tags)) {
                $post->tags()->sync($tags);
            }

            DB::commit();

            return $post->refresh();

        } catch (\Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();

        }
    }
}
