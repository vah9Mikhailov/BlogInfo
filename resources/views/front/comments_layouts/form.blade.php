@if (!isset($parentId))
    @php
        $id = 0;
    @endphp
@else
    @php
        $id = $parentId;
    @endphp
@endif
<div class="new-comment_{{$id}}"  style="margin: 10px 0 10px 0">

    @csrf
    @if (isset($id))
        <input name="parent_id" type="hidden" value="{{ $id }}">
    @endif
    <div class="form-group">
        <label for="commentBody">Текст комментария</label>
        <textarea class="form-control" id="comment_body_{{$id}}" name="body" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary" onclick="createNewComment({{$id}})">Отправить</button>

</div>

