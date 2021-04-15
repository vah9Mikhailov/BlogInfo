<form method="POST" action="{{route('send.comment',['slug' => $post->slug])}}" style="margin: 10px 0 10px 0">
    @csrf
    @method('POST')
    @if (isset($parentId))
        <input name="parent_id" type="hidden" value="{{ $parentId }}">
    @endif
    <div class="form-group">
        <label for="commentBody">Текст комментария</label>
        <textarea class="form-control" id="commentBody" name="body" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
