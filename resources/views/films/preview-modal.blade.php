<div class="modal-content-inner">
  <div class="modal-close" data-hide-modal>
    <svg width="18" height="18" viewBox="0 0 13.25 13.25">
      <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
      <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
    </svg>
  </div>
  <div class="preview__top-wrap flex">
    <div class="preview__img-wrap">
      @if ($film->thumbnail)
          <img src="{{ $film->thumbnail }}" alt="Preview" class="img-responsive" width="250">
      @else
          <img src="/media/no-image.jpg" alt="Preview" class="img-responsive" width="250">
      @endif
    </div>
    <div class="preview__top-content">
      <h2 class="preview__title">{{ $film->title ? : '-' }}</h2>
      <p class="preview__subtitle">{{ $film->genre ? : '-' }}</p>
      <h3 class="preview__title-secondary">General Info</h3>
      <table class="preview__top-table">
        <tr>
          <td>Screenplay based on</td>
          <td>{{ $film->based_on ? : '-' }}</td>
        </tr>
        <tr>
          <td>Project status</td>
          <td>{{ $film->project_status ? : '-' }}</td>
        </tr>
        <tr>
          <td>Country of production</td>
          <td>{{ $film->countryName() ? : '-' }}</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="preview__budget-wrap flex">
    <h3 class="preview__title-secondary preview__title-secondary--budget">Budget</h3>
    <div class="preview__budget">
      <ul class="preview__budget-list flex">
        <li>
          <div>
            <p>Total budget</p>
            <p>$ {{ $film->totalBeauty ? : '-' }}</p>
          </div>
        </li>
        <li>
          <div>
            <p>Financing secured</p>
            <p>$ {{ $film->securedBeauty ? : '-' }}</p>
          </div>
        </li>
        <li>
          <div>
            <p>Financing required</p>
            <p>$ {{ $film->requiredBeauty ? : '-' }}</p>
          </div>
        </li>
      </ul>
      <div class="preview__budget-graph">
        <p>Total budget <span>$ {{ $film->totalBeauty ? : '-' }}</span></p>
        <ul class="preview__budget-graph-list flex-align-center">
          <li></li>
          <li style="width:{{ $film->secured_percent }}%"></li>
          <li style="width:{{ $film->required_percent }}%"></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="preview__about-wrap">
    <h3 class="preview__title-secondary">About Film</h3>
    <div class="preview__about">
      <h4 class="preview-small__title">Logline</h4>
      <p>{{ $film->logline ? : '-' }}</p>
    </div>
    <div class="preview__about">
      <h4 class="preview-small__title">Synopsis</h4>
      <p>{{ $film->synopsis ? : '-' }}</p>
    </div>
    <div class="preview__about">
      <h4 class="preview-small__title">Additional info</h4>
      <p>{{ $film->additional ? : '-' }}</p>
    </div>
  </div>

  <ul class="preview__person-list flex">
    <li>
      <h3 class="preview__title-secondary">Producer</h3>
      <table class="preview__person-table">
        <tr>
          <td><h4 class="preview-small__title">Name</h4></td>
          <td><h4 class="preview-small__title">IMDB link</h4></td>
        </tr>
        @foreach ($film->personnel('producer') as $P)
          <tr>
              <td>
                <p>
                  {{ $P->firstname }} {{$P->lastname }}
                  @if ($P->email_confirmed)
                    <span class="icon-verified" data-title="Email is verified by producer"></span>
                  @endif
                </p>
              </td>
              <td>
                <p>
                  @if ($P->imdb_link)
                    <button class="copy" data-clipboard-text="{{ $P->imdb_link }}">Copy</button>
                  @else
                    <button class="copy">No link</button>
                  @endif
                </p>
              </td>
          </tr>
        @endforeach
      </table>
    </li>
    <li>
      <h3 class="preview__title-secondary">Director</h3>
      <table class="preview__person-table">
        <tr>
          <td><h4 class="preview-small__title">Name</h4></td>
          <td><h4 class="preview-small__title">IMDB link</h4></td>
        </tr>
        @foreach ($film->personnel('director') as $D)
          <tr>
              <td>
                <p>
                  {{ $D->firstname }} {{$D->lastname }}
                  @if ($D->email_confirmed)
                    <span class="icon-verified" data-title="Email is verified by director"></span>
                  @endif
                </p>
              </td>
              <td>
                <p>
                  @if ($D->imdb_link)
                    <button class="copy" data-clipboard-text="{{ $D->imdb_link }}">Copy</button>
                  @else
                    <button class="copy">No link</button>
                  @endif
                </p>
              </td>
            </tr>
        @endforeach
      </table>
    </li>
    <li>
      <h3 class="preview__title-secondary">Writer</h3>
      <table class="preview__person-table">
        <tr>
          <td><h4 class="preview-small__title">Name</h4></td>
          <td><h4 class="preview-small__title">IMDB link</h4></td>
        </tr>
        @foreach ($film->personnel('writer') as $W)
          <tr>
              <td>
                <p>
                  {{ $W->firstname }} {{$W->lastname }}
                  @if ($W->email_confirmed)
                    <span class="icon-verified" data-title="Email is verified by writer"></span>
                  @endif
                </p>
              </td>
              <td>
                <p>
                  @if ($W->imdb_link)
                    <button class="copy" data-clipboard-text="{{ $W->imdb_link }}">Copy</button>
                  @else
                    <button class="copy">No link</button>
                  @endif
                </p>
              </td>
            </tr>
        @endforeach
      </table>
    </li>
    <li>
      <h3 class="preview__title-secondary">DOP</h3>
      <table class="preview__person-table">
        <tr>
          <td><h4 class="preview-small__title">Name</h4></td>
          <td><h4 class="preview-small__title">IMDB link</h4></td>
        </tr>
        @foreach ($film->personnel('dop') as $DP)
          <tr>
              <td>
                <p>
                  {{ $DP->firstname }} {{$DP->lastname }}
                  @if ($DP->email_confirmed)
                    <span class="icon-verified" data-title="Email is verified by DOP"></span>
                  @endif
                </p>
              </td>
              <td>
                <p>
                  @if ($DP->imdb_link)
                    <button class="copy" data-clipboard-text="{{ $DP->imdb_link }}">Copy</button>
                  @else
                    <button class="copy">No link</button>
                  @endif
                </p>
              </td>
            </tr>
        @endforeach
      </table>
    </li>
  </ul>
</div>
