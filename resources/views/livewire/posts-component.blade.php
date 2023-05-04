<div>
    @if ($user->id == auth()->id())
        <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
            <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST" id="post-form">
                @csrf
                <textarea class="rounded-xl resize-none w-full" name="post_content" id="post_content" cols="30" rows="4"
                    placeholder="What's on your mind, {{ $user->first_name }}" required></textarea>
                <img id="preview-image-before-upload" src="{{ Storage::url('images/image_preview.png') }}"
                    alt="preview image" class="mt-2 object-cover hidden" style="max-height: 150px; max-width: 150px;">
                <div class="flex flex-row justify-between items-center mt-2">
                    <input type="file" name="post_image" id="post_image" class="hidden"
                        accept=".jpeg,.jpg,.png,.webp">
                    <label for="post_image" class="flex flex-row items-center space-x-2 text-blue-800 cursor-pointer">
                        <i class="fas fa-file-image"></i>
                        <p>Gallery</p>
                    </label>

                    <input id="submit" type="submit" value="Comment" class="hidden">
                    <label for="submit" x-data="{ formSubmitButton: false, formSubmitButtonfn() { this.formSubmitButton = true, setTimeout(() => this.formSubmitButton = false, 3000) } }">
                        <button
                            class="inline-block bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 hover:text-white hover:no-underline"
                            @click="formSubmitButtonfn()">

                            <svg class="animate-spin -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" x-show="formSubmitButton">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>

                            <p x-show="!formSubmitButton">
                                Post
                            </p>
                        </button>
                    </label>
                </div>
            </form>
        </div>
    @endif
    @if ($this->posts->count() > 0)
        @foreach ($this->posts as $post)
            <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                @if ($post->author()->id == auth()->id())
                    <div class="flex justify-between mb-5 relative" x-data="{ editDelete: false }">
                        <div class="flex space-x-3 items-center">
                            <a href="{{ route('profile.show', $post->author()->id) }}">
                                <img class="rounded-full w-16" src="{{ Storage::url($user->profile_photo_path) }}"
                                    alt="profile_pic">
                            </a>
                            <a href="{{ route('profile.show', $post->author()->id) }}">
                                <p class="hover:underline">{{ $user->first_name }} {{ $user->last_name }}</p>
                            </a>
                            {{-- <i class="fas fa-dot-circle"></i> --}}
                            <p class="text-gray-400 text-xs">
                                {{ (new Carbon\Carbon($post->created_at))->diffForHumans() }}</p>
                        </div>
                        <button @click=" editDelete = !editDelete ">
                            ...
                        </button>
                        <div class="absolute right-4 top-8" x-show="editDelete" @click.outside="editDelete = false">
                            <div
                                class="flex flex-col border border-gray-400 rounded-xl divide-y divide-opacity-100 divide-gray-300">
                                <button class="hover:bg-gray-200 p-2 rounded-t-xl"
                                    wire:click="editPost({{ $post->id }})" @click="editDelete = false">Edit</button>
                                <button class="hover:bg-gray-200 p-2 rounded-b-xl"
                                    wire:click="deletePost({{ $post->id }})"
                                    @click="editDelete = false">Delete</button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mb-5 space-y-5">
                    @php
                        $content = json_decode($post->content, 1)['text'];
                        $texto_con_enlaces = preg_replace_callback(
                            '/\b(?:https?:\/\/)?(?:www\.)?([^\s]+(?:\.\w{2,3}){1,2}(?:\/\S*)?)\b/i',
                            function ($enlace) {
                                $enlace_con_protocolo = $enlace[0];
                                if (!preg_match('/^(http|https):\/\//i', $enlace_con_protocolo)) {
                                    $enlace_con_protocolo = 'http://' . $enlace_con_protocolo;
                                }
                                return "<a class='font-medium text-blue-600 dark:text-blue-500 hover:underline' target='_blank' href='" . $enlace_con_protocolo . "'>" . $enlace[0] . '</a>';
                            },
                            $content,
                        );
                    @endphp
                    <p>
                        {!! $texto_con_enlaces !!}
                    </p>
                    @if (json_decode($post->content, 1)['photo_path'] != null)
                        <img class="rounded-lg m-auto w-auto max-h-96 shadow-xl transform hover:scale-105 transition duration-500 cursor-pointer"
                            src="{{ Storage::url(json_decode($post->content, 1)['photo_path']) }}" alt="profile_pic">
                    @endif
                </div>
                <div>
                    <div class="flex justify-between">
                        <div class="flex space-x-6">
                            <button
                                class="flex space-x-2 items-center @if (in_array($post->id, $this->liked_posts)) text-blue-600 @else text-gray-500 @endif"
                                wire:click="likePost({{ $post->id }})">

                                <svg class="animate-spin -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" wire:loading
                                    wire:target="likePost({{ $post->id }})">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>

                                <i class="fas fa-thumbs-up" wire:loading.remove
                                    wire:target="likePost({{ $post->id }})"></i>

                                <p>{{ $post->likes->count() }} Likes</p>
                            </button>
                            <button class="flex space-x-2 items-center text-gray-500">
                                <i class="far fa-comment-alt"></i>
                                <p>{{ $post->comments->count() }} Comments</p>
                            </button>
                        </div>
                        <button>
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                    <div class="flex items-center space-x-3 mt-3">
                        <img class="rounded-full w-10" src="{{ Storage::url($user->profile_photo_path) }}"
                            alt="profile_pic">
                        <textarea class="rounded-xl resize-none w-5/6" name="" id="" cols="30" rows="1"
                            placeholder="Write a comment" wire:model="comment_content.{{ $post->id }}" wire:ignore required></textarea>
                        <button
                            class="inline-block bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 hover:text-white hover:no-underline"
                            wire:click="comment({{ $post->id }})">

                            <svg class="animate-spin -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" wire:loading wire:target="comment({{ $post->id }})">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>

                            <p wire:loading.remove wire:target="comment({{ $post->id }})">Comment</p>

                        </button>
                    </div>
                    @foreach ($post->comments as $comment)
                        <div class="mt-7 group">
                            <div class="flex items-center space-x-3 mt-3 text-sm">
                                <a href="{{ route('profile.show', $comment->author->id) }}">
                                    <img class="rounded-full w-8"
                                        src="{{ Storage::url($comment->author->profile_photo_path) }}"
                                        alt="profile_pic">
                                </a>
                                <a href="{{ route('profile.show', $comment->author->id) }}">
                                    <p class="text-gray-600 hover:underline">
                                        {{ $comment->author->first_name }} {{ $comment->author->last_name }}
                                    </p>
                                </a>
                                {{-- <i class="fas fa-dot-circle"></i> --}}
                                <p class="text-gray-400 text-xs">
                                    {{ (new Carbon\Carbon($comment->created_at))->diffForHumans() }}</p>
                            </div>
                            <div class="flex items-center space-x-3 mt-3 mb-1">
                                <p class="text-gray-600 text-sm ml-2">
                                    {{ $comment->content }}</p>
                            </div>
                            @if ($comment->author->id == auth()->id())
                                <div class="flex invisible space-x-2 text-xs ml-2 group-hover:visible">

                                    <svg class="animate-spin -ml-1 h-5 w-5 text-blue-500"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        wire:loading wire:target="editComment">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4">
                                        </circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    <p class="hover:text-blue-500 cursor-pointer"
                                        wire:click="editComment({{ $comment->id }})">Edit</p>

                                    <svg class="animate-spin -ml-1 h-5 w-5 text-red-500"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        wire:loading wire:target="deleteComment">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4">
                                        </circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    <p class="hover:text-red-500 cursor-pointer"
                                        wire:click="deleteComment({{ $comment->id }})">Delete</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6 text-center">
            <p class="text-xl font-bold">There are no posts to show!</p>
        </div>
    @endif
    <script type="text/javascript">
        $(document).ready(function(e) {

            $('#post_image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

                $("#preview-image-before-upload").toggleClass("hidden");
                $("#post_content").attr('required', false);

            });

        });
    </script>
</div>
