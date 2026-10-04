<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::where('user_id', $request->user()->id)->latest()->get();

        /** @var View $view */
        $view = view('posts.index', compact('posts'));

        return $view;
    }

    public function create(): View
    {
        /** @var View $view */
        $view = view('posts.create');

        return $view;
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('post-thumbnails', 'public');
            abort_unless(is_string($path), 500);
            $data['thumbnail'] = $path;
        }

        Post::create([
            ...$data,
            'user_id' => $request->user()->id,
            'published_at' => $request->boolean('published') ? now() : null,
        ]);

        return redirect()->route('dashboard.posts.index')
            ->with('status', __('post.post_created'));
    }

    public function show(Post $post, Request $request): View
    {
        abort_unless($post->user_id === $request->user()->id, 403);

        /** @var View $view */
        $view = view('posts.show', compact('post'));

        return $view;
    }

    public function edit(Post $post, Request $request): View
    {
        abort_unless($post->user_id === $request->user()->id, 403);

        /** @var View $view */
        $view = view('posts.edit', compact('post'));

        return $view;
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        abort_unless($post->user_id === $request->user()->id, 403);

        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('post-thumbnails', 'public');
            abort_unless(is_string($path), 500);
            $data['thumbnail'] = $path;
        }

        $post->update([
            ...$data,
            'published_at' => $request->boolean('published') ? now() : null,
        ]);

        return redirect()->route('dashboard.posts.index')
            ->with('status', __('post.post_updated'));
    }

    public function destroy(Request $request, Post $post): RedirectResponse
    {
        abort_unless($post->user_id === $request->user()->id, 403);

        $post->delete();

        return redirect()->route('dashboard.posts.index')
            ->with('status', __('post.post_deleted'));
    }
}
