<h3>Комментарии</h3>
<hr>
@include ('front.comments_layouts.list', ['collection' => $showPostResponse->getPost()->getThreadedComments()['root']])

