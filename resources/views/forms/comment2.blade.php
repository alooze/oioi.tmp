{{ 
  Form::open([
    'url' => route('f.faq.comment.post'), 
    'method' => 'post', 
    'class' => 'add-comment-form',
    'id' => 'add-comment-loggedin',
    'data-form-validate' => '',
  ]) 
}}
{{ Form::hidden('qid', '', ['id' => 'qid']) }}
<!-- <form class="add-comment-form" id="add-comment-loggedin" action="http://httpbin.org/post" method="POST" data-form-validate> -->
  <div class="form-group">
    <label>Comment</label>
    <textarea class="form-control form-control_with-border" rows="5" name="comment" data-rules="required"></textarea>
  </div>
  <div class="text-center">
    <button class="btn btn_primary btn_sm" type="submit">Add comment</button>
  </div>
{{ Form::close() }}