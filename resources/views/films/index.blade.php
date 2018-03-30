@extends('layouts.cabinet')

@section('title', $title)

@section('custom_css')
@stop

@section('custom_js')

@stop

@section('main_container')
  <div class="dashboard-content">
      <h1 class="dashboard-title">My Films</h1>
      @if (!count($films))
        <div class="dashboard-content__inner">
          <form class="flex-align-center dashboard__center">
              <img class="img-responsive dashboard-img-team__empty" src="data:image/png;base64,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" width="46">
              <p class="dashboard__empty-descr">No film is registered yet...</p>
              <a class="btn btn-secondary" href="{{ route('f.films.add', 'general') }}"><span class="plus">+</span>Register new film</a>
          </form>
        </div>
      @else
        <form class="dashboard-content__inner dashboard-content__inner--secondary">
            <div class="dashboard__info__table dashboard__info__table--secondary">
                <div class="dashboard__info__table-div dashboard__info__table-div--secondary">Thumbnail</div>
                <div class="dashboard__info__table-div dashboard__info__table-div--secondary">Film Name</div>
                <div class="dashboard__info__table-div dashboard__info__table-div--secondary">Producer</div>
                <div class="dashboard__info__table-div dashboard__info__table-div--secondary">Last change</div>
                <div class="dashboard__info__table-div dashboard__info__table-div--secondary">Status</div>
                <div class="dashboard__info__table-div dashboard__info__table-div--secondary">Action</div>
            </div>
            <div class="dashboard__info-form__inner">
              <ul class="dashboard__info__table-list dashboard__info__table-list--secondary">
                  @foreach ($films as $film)
                    <li>
                        <div class="dashboard__info__table-list-thumbnail">
                            @if ($film->thumbnail)
                                  <img src="{{ $film->thumbnail }}" alt="Preview" width="70">
                              @else
                                  <img src="/media/no-image-my-films-@2x.png" alt="Preview" width="70">
                              @endif
                        </div>
                        <div class="dashboard__info__table-list-name">{{ $film->title }}</div>
                        <div class="dashboard__info__table-list-producer">
                          @foreach ($film->personnel('producer') as $P)
                            {{ $P->firstname }} {{ $P->lastname }}<br/>
                          @endforeach
                        </div>
                        <div class="dashboard__info__table-list-last-change">
                          {{ $film->dateAttribute($film->updated_at) }} {{ $film->timeAttribute($film->updated_at) }}</div>
                        <div class="dashboard__info__table-list-status">
                          {{ $film->submit ? 'Submitted' : 'In Process...'}}
                        </div>
                        <div class="dashboard__info__table-list-action">
                          @if (!$film->submit)
                            <a class="btn btn-edit btn-table-secondary btn-edit--secondary" href="{{ route('f.films.edit', ['id' => $film->id, 'step' => 'general']) }}">Edit</a>
                          @endif
                          <a class="btn btn-edit btn-table-secondary" data-modal="preview-film-modal" data-action="{{ route('f.films.preview', $film->id) }}">Preview</a>
                          <button class="btn btn-del btn-table-secondary" type="button" data-show-modal="delete-film-modal" data-title="{{ $film->title }}" data-action="{{ route('f.films.delete', $film->id) }}">Delete</button>
                        </div>
                    </li>
                  @endforeach
                </ul>
            </div>
        </form>
      @endif
  </div>
@stop

@section('modals')
  <div class="modal" id="delete-film-modal">
    <div class="modal-dialog animated">
      <div class="modal-dialog animated">
        <div class="modal-content modal-content--secondary">
          <img class="img-responsive" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABgCAYAAAC+EjQcAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAA81JREFUeJztmztoFFEUhr9dA1qIaIxYiFqJCCJqETHT2GgXfBAtrAS1ErSxER+gjQQsLFImYCOCwUpEIooKWXEbtdLCQhAURYskGl8bE4uZdZfN3HvmsY/ZueeDKfbevTNnfub8M+fOncJk/wAtZgLY14L9LgBjwMk0O/HKJWt/Mc3OI9IKcQAKwN4W7fs/7RCoq1GBBHoafq+gu0QrAivT7KC0y2tsqnjl0mz1RyEw6dPABWBNmoPliPfAWa9cGi9M9g8MAeOdjiiDzAO7i8DRTkeSUYrAkSLQ2+lIMkxfNxlyR1CBBFQgARVIQAUSUIEEVCABFUigB7gBPOlsGJnlVVUgZ8nCjGJXowIJqEACKpBAwfDa5zgw2OZYOs2YVy7dbWxsnJOusgnY39p4Msf9sEZTis0a2vNM6DmbBPrWwkCyyvewRpNAMy0MJKtMhzVqitWIlWIqUIBJoNB8zDmxBArNx5wzFdaoKVZDPchCxSuXKmEdKpCP8XxNAoXmY44xeq6tmv/ZgkCyivGubRPIpTT7YeowVfPgC9QX80APgBFqtVwB2A5cAZYbxiwAw8AjYC5oWwoMAScsx/oMXATe1rX1AueBnTHjNl4MNoGmgI0xDvIVOMDi1HyMf6VeM4y7CZwLaZ8AtgCL1sgFnALuhLQ/Az4QbzIwkQfFTbE3mH3rpWWcre9Fgr5P+ALFoS0eNN/mvoWE48KIfZu3DsohiQRyqR4zzn/ZBHKpojfOoGqK+agHCSQSyKV56UQp5pIHJTJpl1LMWIupQD7qQQKJPMilt6vqQQL6HGThr1cu/TZ1aooJjzNq0kJRbhNoHvjV3FgyidVKpGlJF3wolUAulBupBHLBh6wvSTXFLHUYqECgHiSSSiAXJu7VgwT0OUhABRJIJZALC6kS12LgxhWUuJoHNwRSDxLQ5yABa72pV5B6kIh6kIUFr1yyLnd23YPE+S7Xq3nxzY0k0BzwJ+LBCl3SV49oIVHWEkf1oc34C8DD2GoZZ+vblmDcamCdZVw94rnZFpJXmQFWRfjfWuAWcJ1abheAHcBly7hj+KvlH1Jbab8MOAzssYwbCf5Xv9J+DXAJWBIhXoiQYlEEivOG9WCwxaEIXA22OGwAbscc00hqk4Z83+rb6kHdSFMEyvMiBvExxnWB1IME1IME1IMEmuJBeV7AIBbjmmICUQT60oRAsop4blEEeo7988duZRp4Lf0pikAfgdHU4WSPYcC4/LdK1E+nzwD3UoWTLUbxBRKJUs2D/7n3YLAdAtYTfUohK1SAd/jf6T+NOugf1jjlKdr4E9kAAAAASUVORK5CYII=" width="36">
          <h2 class="modal-title">Deleting film</h2>
          <p class="modal-descr modal-descr--secondary"> Do you really want to delete
            <b class="js-film-title">The Song Remains the Same: Part 2</b> from the list?</p>
          <div>
            <button class="btn btn-del btn-del--mod js-film-delete" data-hide-modal> yes, delete</button>
            <button class="btn btn-not-del-mod" data-hide-modal> No, don’t delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="modal" id="delete-film-modal">
      <div class="modal-dialog animated">
          <div class="modal-content modal-content--secondary">
              <img class="img-responsive" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABgCAYAAAC+EjQcAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAA81JREFUeJztmztoFFEUhr9dA1qIaIxYiFqJCCJqETHT2GgXfBAtrAS1ErSxER+gjQQsLFImYCOCwUpEIooKWXEbtdLCQhAURYskGl8bE4uZdZfN3HvmsY/ZueeDKfbevTNnfub8M+fOncJk/wAtZgLY14L9LgBjwMk0O/HKJWt/Mc3OI9IKcQAKwN4W7fs/7RCoq1GBBHoafq+gu0QrAivT7KC0y2tsqnjl0mz1RyEw6dPABWBNmoPliPfAWa9cGi9M9g8MAeOdjiiDzAO7i8DRTkeSUYrAkSLQ2+lIMkxfNxlyR1CBBFQgARVIQAUSUIEEVCABFUigB7gBPOlsGJnlVVUgZ8nCjGJXowIJqEACKpBAwfDa5zgw2OZYOs2YVy7dbWxsnJOusgnY39p4Msf9sEZTis0a2vNM6DmbBPrWwkCyyvewRpNAMy0MJKtMhzVqitWIlWIqUIBJoNB8zDmxBArNx5wzFdaoKVZDPchCxSuXKmEdKpCP8XxNAoXmY44xeq6tmv/ZgkCyivGubRPIpTT7YeowVfPgC9QX80APgBFqtVwB2A5cAZYbxiwAw8AjYC5oWwoMAScsx/oMXATe1rX1AueBnTHjNl4MNoGmgI0xDvIVOMDi1HyMf6VeM4y7CZwLaZ8AtgCL1sgFnALuhLQ/Az4QbzIwkQfFTbE3mH3rpWWcre9Fgr5P+ALFoS0eNN/mvoWE48KIfZu3DsohiQRyqR4zzn/ZBHKpojfOoGqK+agHCSQSyKV56UQp5pIHJTJpl1LMWIupQD7qQQKJPMilt6vqQQL6HGThr1cu/TZ1aooJjzNq0kJRbhNoHvjV3FgyidVKpGlJF3wolUAulBupBHLBh6wvSTXFLHUYqECgHiSSSiAXJu7VgwT0OUhABRJIJZALC6kS12LgxhWUuJoHNwRSDxLQ5yABa72pV5B6kIh6kIUFr1yyLnd23YPE+S7Xq3nxzY0k0BzwJ+LBCl3SV49oIVHWEkf1oc34C8DD2GoZZ+vblmDcamCdZVw94rnZFpJXmQFWRfjfWuAWcJ1abheAHcBly7hj+KvlH1Jbab8MOAzssYwbCf5Xv9J+DXAJWBIhXoiQYlEEivOG9WCwxaEIXA22OGwAbscc00hqk4Z83+rb6kHdSFMEyvMiBvExxnWB1IME1IME1IMEmuJBeV7AIBbjmmICUQT60oRAsop4blEEeo7988duZRp4Lf0pikAfgdHU4WSPYcC4/LdK1E+nzwD3UoWTLUbxBRKJUs2D/7n3YLAdAtYTfUohK1SAd/jf6T+NOugf1jjlKdr4E9kAAAAASUVORK5CYII=" width="36">
              <h2 class="modal-title">Deleting film</h2>
              <p class="modal-descr modal-descr--secondary"> Do you really want to delete <b>The Song Remains
                  the Same: Part 2</b> from the list?</p>
              <div>
                  <button class="btn btn-del btn-del--mod" > yes, delete</button>
                  <button class="btn btn-not-del-mod" data-hide-modal> No, don’t delete</button>
              </div>
          </div>
      </div>
  </div> --}}

  <div class="modal" id="preview-film-modal">
    <div class="modal-dialog animated">
      <div class="modal-content modal-content--preview">
        <div class="modal-content-inner">
        </div>
        <div class="flex btn-wrap-preview"><button class="btn btn-primary" data-hide-modal>Close</button></div>
      </div>
    </div>
  </div>
@stop
