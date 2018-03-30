{{
  Form::open([
    'url' => route('f.faq.comment.guest.post'),
    'method' => 'post',
    'class' => 'tab-pane active add-comment-form',
    'id' => 'add-comment-no-account',
    'data-form-validate' => '',
  ])
}}
{{ Form::hidden('qid', '', ['id' => 'gqid']) }}
  <div class="form-row">
    <div class="col form-group">
      <label>First name</label>
      <input class="form-control form-control_with-border" name="name" data-rules="required">
    </div>
    <div class="col form-group">
      <label style="visibility: hidden;">Who you are</label>
      <select name="who-you-are" data-choices data-class-names-container-outer="choices choices_with-border" data-rules="required">
        <option value="" selected disabled>Choose, who are you</option>
        <option value="producer">Producer</option>
        {{-- <option value="financier">Financier</option>
        <option value="distributor">Distributor</option>
        <option value="other">Other</option> --}}
      </select>
    </div>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input class="form-control form-control_with-border" name="email" data-rules="required|email">
  </div>
  <div class="form-group">
    <label>Comment</label>
    <textarea class="form-control form-control_with-border" rows="5" name="comment" data-rules="required"></textarea>
  </div>
  <div class="text-center">
    <button class="btn btn_primary btn_sm" type="submit">Add comment</button>
  </div>
{{ Form::close() }}
