@extends('layouts.film')

@section('block_content')
  <form class="dashboard__info-form" action="" method="post" enctype="multipart/form-data" data-form-validate data-form-no-ajax="true" id="dashboard__info-form">
      {{ csrf_field() }}
      <div class="dashboard__info-form__inner dashboard__info-form__inner--step7">
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full form-group">
              <p class="dashboard__info-form-descr">Logline
                {{-- <i class="icon_info-green icon_info-green--secondary"></i> --}}
              </p>
              {{ Form::textarea('logline', $film->logline, ['size' => '30x5', 'data-rules' => 'required']) }}
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full form-group">
              <p class="dashboard__info-form-descr">Synopsis
                {{-- <i class="icon_info-green icon_info-green--secondary"></i> --}}
              </p>
              {{ Form::textarea('synopsis', $film->synopsis, ['size' => '30x5', 'data-rules' => 'required']) }}
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full form-group">
              <p class="dashboard__info-form-descr">Additional info
                {{-- <i class="icon_info-green icon_info-green--secondary"></i> --}}
              </p>
              {{ Form::textarea('additional', $film->additional, ['size' => '30x5', 'data-rules' => 'required']) }}
          </div>

          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third">
            <p class="dashboard__info-form-descr">Thumbnail (cover poster)
              {{-- <i class="icon_info-green icon_info-green--secondary"></i> --}}
            </p>

          @if ($film->thumbnail != null)
            <div class="dropzone dashboard__info-file active">
              <div class="form__file-previews">
                <i class="fa fa-close" aria-hidden="true"></i>
                {{ $film->getFileName('thumbnail') }}
              </div>
          @else
            <div class="dropzone dashboard__info-file">
              <div class="form__file-previews"></div>
          @endif
              {{ Form::hidden('thumbnail', $film->thumbnail, ['class'=>'file_placeholder']) }}
              <span>Drag here, or</span>
              {{ Form::file('thumbnail_input', ['id' => 'input-thumbnail', 'accept' => 'image/jpeg,image/png']) }}
              <label for="input-thumbnail" class="block">upload</label>
              <p class="form__file-descr">Min size 600x600 px JPEG / PNG</p>
            </div>
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third">
            <p class="dashboard__info-form-descr">Artwork of the film
              {{-- <i class="icon_info-green icon_info-green--secondary"></i> --}}
            </p>

          @if ($film->artwork != null)
            <div class="dropzone dashboard__info-file active">
              <div class="form__file-previews">
                <i class="fa fa-close" aria-hidden="true"></i>
                {{ $film->getFileName('artwork') }}
              </div>
          @else
            <div class="dropzone dashboard__info-file">
              <div class="form__file-previews"></div>
          @endif
              {{ Form::hidden('artwork', $film->artwork, ['class'=>'file_placeholder']) }}
              <span>Drag here, or</span>
              {{ Form::file('artwork_input', ['id' => 'input-artwork-film']) }}
              <label for="input-artwork-film" class="block">upload</label>
              <p class="form__file-descr">Max size 50 mb</p>
            </div>
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third">
            <p class="dashboard__info-form-descr">Script
              <i class="icon_info-green icon_info-green--secondary" data-tippy-html='#document-tooltip'></i>
            </p>

          @if ($film->script != null)
            <div class="dropzone dashboard__info-file active">
              <div class="form__file-previews">
                <i class="fa fa-close" aria-hidden="true"></i>
                {{ $film->getFileName('script') }}
              </div>
          @else
            <div class="dropzone dashboard__info-file">
              <div class="form__file-previews"></div>
          @endif
              {{ Form::hidden('script', $film->script, ['class'=>'file_placeholder']) }}
              <span>Drag here, or</span>
              {{ Form::file('script_input', ['id' => 'input-script', 'accept' => 'application/msword,text/plain,application/pdf']) }}
              <label for="input-script" class="block">upload</label>
              <p class="form__file-descr">Max size 50 mb<br/>PDF / DOC(X) / TXT</p>
            </div>
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
            <p class="dashboard__info-form-descr">Finance plan
              <i class="icon_info-green icon_info-green--secondary" data-tippy-html='#document-tooltip'></i>
            </p>

          @if ($film->fin_plan != null)
            <div class="dropzone dashboard__info-file active">
              <div class="form__file-previews">
                <i class="fa fa-close" aria-hidden="true"></i>
                {{ $film->getFileName('fin_plan') }}
              </div>
          @else
            <div class="dropzone dashboard__info-file">
              <div class="form__file-previews"></div>
          @endif
              {{ Form::hidden('fin_plan', $film->fin_plan, ['class'=>'file_placeholder']) }}
              <span>Drag here, or</span>
              {{ Form::file('fin_plan_input', ['id' => 'input-finance-plan', 'accept' => 'application/msword,application/pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel']) }}
              <label for="input-finance-plan">upload</label>
              <p class="form__file-descr">Max size 50 mb   •   PDF / DOC(X) / XLS(X)</p>
            </div>
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
            <p class="dashboard__info-form-descr">Budget (Detailed)
              <i class="icon_info-green icon_info-green--secondary" data-tippy-html='#document-tooltip'></i>
            </p>

          @if ($film->detailed_budget != null)
            <div class="dropzone dashboard__info-file active">
              <div class="form__file-previews">
                <i class="fa fa-close" aria-hidden="true"></i>
                {{ $film->getFileName('detailed_budget') }}
              </div>
          @else
            <div class="dropzone dashboard__info-file">
              <div class="form__file-previews"></div>
          @endif
              {{ Form::hidden('detailed_budget', $film->detailed_budget, ['class'=>'file_placeholder']) }}
              <span>Drag here, or</span>
              {{ Form::file('detailed_budget_input', ['id' => 'input-budget', 'accept' => 'application/msword,application/pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel']) }}
              <label for="input-budget">upload</label>
              <p class="form__file-descr">Max size 50 mb   •   PDF / DOC(X) / XLS(X)</p>
            </div>
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full flex">
            {{-- {{ Form::hidden('terms', $film->terms) }}
            <input type="checkbox" name="terms" id="checkbox-step-7" {{ $film->terms ? 'checked disabled' : '' }}>
            <label for="checkbox-step-7"></label>
            <div class="checkbox-descr">
              <p>I have read and agree with the <a href="/Terms Of Use.pdf" target="_blank">“Terms & Conditions”</a></p>
              <p>Once you’ve agreed with the terms – you can’t unselect the check-box</p>
            </div> --}}
          </div>
      </div>
      <div class="dashboard__info-form-wrap dashboard__info-form-btn-wrap dashboard__info-form-btn-wrap--table">
        @if (!$film->stepIsFirst())
          <button class="btn btn-secondary btn-secondary--preview" type="button" data-show-modal="preview-film-modal">Preview</button>
        @endif
        @if ($saved)
          <button class="btn btn-primary btn-primary--submit" style="margin-right:15px;" type="button" data-show-modal="submit-film-modal">Submit film</button>
        @else
          <button type="submit" class="btn btn-primary">Save</button>
        @endif
      </div>
  </form>
@stop

@section('modals')
  @if (!$film->stepIsFirst())
    <div class="modal" id="preview-film-modal">
      <div class="modal-dialog animated">
        <div class="modal-content modal-content--preview">
          @include('films.preview-modal')
          <div class="flex btn-wrap-preview"><button class="btn btn-primary" data-hide-modal>Close</button></div>
        </div>
      </div>
    </div>

    <div class="modal" id="submit-film-modal">
      <div class="modal-dialog animated">
        <div class="modal-content modal-content--secondary">
          <img class="img-responsive img-mod-del" src="data:image/png;base64,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" width="53">
          <h2 class="modal-title modal-title--secondary">Submitting film</h2>
          @if (!$film->stepsDone())
            <p class="modal-descr"><b>This film has some unfinished steps.</b></p>
          @endif
          <p class="modal-descr">You won’t be able to edit this film later anymore.<br>Do you really want to submit it?</p>
          <div>
            <form action="{{ route('f.films.submit', $film->id) }}" method="GET">
              <button class="btn btn-l" type="button" data-hide-modal>NO, not now</button>
              <button class="btn btn-primary btn-primary--submit" type="submit">yes, submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endif
@stop

@section('tooltips')
  <template id="document-tooltip">
    <button class="tooltip-close">
  		<svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
  			<path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
  			<path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
  		</svg>
    </button>
	  <p class="tooltip-text">Please make sure that your document opens in a readable format (not as a picture).</p>
  </template>
@stop
