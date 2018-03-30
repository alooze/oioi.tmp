<section class="faq section">
  <div class="section-header">
    <h2 class="section-header__title">Questions & Answers</h2>
    <p class="section-header__lead">Find answers on common questions</p>
  </div>
  <div class="faq__container">

    <form class="search faq__search" id="search-questions-form">
      <input class="search__input" name="query" placeholder="Search for answers...">
      <button class="btn btn_primary search__btn">Search</button>
    </form>

    @if ($faq->count() > 0)
    <ul class="faq__question-list" id="questions-list">
      @foreach ($faq as $q)
      <li class="question">
        <div class="question__title" data-toggle-question-collapse>{{ $q->question_title }}</div>
        <div class="question__content-wrap">
          <div class="question__content">
            <div class="q-answer">
              {{-- <div class="q-answer__title">{{ $q->answer_title }}</div> --}}
              <div class="q-answer__content">{!! $q->answer_content !!}</div>
            </div>
            <div class="comments">
              <div class="comments__header">
                <div class="comments__title">Comments</div>
                @auth
                <button class="btn btn_primary btn_sm" data-show-modal="add-comment-loggedin-modal" onclick="document.getElementById('qid').value = {{ $q->id }};"
                  data-id="{{ $q->id }}">Add comment</button>
                @else
                <button class="btn btn_primary btn_sm" data-show-modal="add-comment-modal" onclick="document.getElementById('gqid').value = {{ $q->id }};"
                  data-id="{{ $q->id }}">Add comment</button>
                @endauth
              </div>
              @if (count($comments = $q->comments()->where('status', 1)->get()) > 0)
              <ul class="comments__list" data-comments-list>
                @foreach ($comments as $comment)
                <li class="comment">
                  <div class="comment__header">
                    <div class="comment__author">{{ ucfirst($comment->user_name) }} • {{ ucfirst($comment->user_role) }}</div>
                    <div class="comment__date">{{ $comment->created_at->format('H:i') }} • {{ $comment->created_at->format('M d') }}</div>
                  </div>
                  <div class="comment__content">{!! $comment->comment_text !!}
                  </div>
                </li>
                @endforeach
              </ul>
              @endif
              <div class="show-all" data-show-all-comments>
                <button class="btn btn_link">
                  Show all comments
                  <span class="count">({{ $q->comments->where('status', 1)->count() }})</span>
                  <i class="fa fa-angle-down"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
    @endif

    <div class="show-all" id="show-all-questions">
      <button class="btn btn_link">
        Show all questions
        <span class="count">({{ $faq->count() }})</span>
        <i class="fa fa-angle-down"></i>
      </button>
    </div>

  </div>
</section>
