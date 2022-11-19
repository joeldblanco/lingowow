<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PostsComponent extends Component
{
    public $user, $comment_content;

    public function getPostsProperty()
    {
        return User::find($this->user->id)->posts->sortByDesc('created_at');
    }

    public function getLikedPostsProperty()
    {
        $liked_posts = User::find(auth()->id())->likes->toArray();

        foreach ($liked_posts as $key => $value) {
            $liked_posts[$key] = $value["id"];
        }

        return $liked_posts;
    }

    public function likePost($id)
    {
        $like = DB::table('post_like')->updateOrInsert(
            ['user_id' => auth()->id(), 'post_id' => $id],
            ['user_id' => auth()->id(), 'post_id' => $id]
        );

        if ($like == false) {
            DB::table('post_like')->where([
                'user_id' => auth()->id(),
                'post_id' => $id
            ])->delete();
        }
    }

    public function editPost($id)
    {
        //
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function comment($post_id)
    {
        if ($this->comment_content != null) {

            $aux = preg_replace('/\s+/', '', $this->comment_content[$post_id]);

            if (strlen($aux) > 0) {

                $comment = new Comment();
                $comment->author_id = auth()->user()->id;
                $comment->content = $this->comment_content[$post_id];
                $comment->commentable_id = $post_id;
                $comment->commentable_type = 'App\Models\Post';
                $comment->save();

                $this->comment_content = '';
            }
        }
    }

    public function deleteComment($comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();
    }

    public function editComment($comment_id)
    {
        $comment = Comment::find($comment_id);
        if($this->comment_content && strlen($this->comment_content[$comment->commentable_id])){
            $comment->content = $this->comment_content[$comment->commentable_id];
            $comment->save();
        }else{
            dd("Can't edit");
        }

        $this->comment_content = '';
    }

    public function render()
    {
        return view('livewire.posts-component');
    }
}
