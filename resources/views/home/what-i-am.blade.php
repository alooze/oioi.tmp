<div class="what-i-am-wrapper section">
  <section class="what-i-am what-i-am_for-producers active">
    <div class="section-header">
      <h2 class="section-header__title">What I Am</h2>
      <i class="dash section-header__dash"></i>
      <p class="section-header__lead section-header__lead_big">For Producers</p>
    </div>
    <div class="what-i-am__container">
      <div class="what-i-am__your-steps">Your steps to money</div>
      <div class="what-i-am__push-button">Push button. Make film.</div>
      <ul class="what-i-am__steps">
        <li class="active">1. Register</li>
        <li>
          2. Upload Producer's pack
          <i class="icon icon_info-green" data-tippy-html="#producer-2">?</i>
        </li>
        <li>3. Submit for financing</li>
      </ul>
      <a href="{{ route('f.films.add', 'general') }}" class="btn btn_primary what-i-am__submit">Submit Film</a>
      <div class="what-i-am__bg-text">Producers</div>
    </div>
    <div class="what-i-am__bg">
      <img src="/media/for-producers-bg.png" srcset="/media/for-producers-bg@2x.png 2x">
    </div>
  </section>

  <section class="what-i-am what-i-am_for-financiers">
    <div class="section-header">
      <h2 class="section-header__title">What I Am</h2>
      <i class="dash section-header__dash"></i>
      <p class="section-header__lead section-header__lead_big">For Financiers</p>
    </div>
    <div class="what-i-am__container">
      <div class="what-i-am__your-steps">Your steps to project</div>
      <div class="what-i-am__push-button">Push button. Make money.</div>
      <ul class="what-i-am__steps">
        <li>1. Register</li>
        <li>
          2. Share your investment goals
          <i class="icon icon_info-green" data-tippy-html="#financier-2">?</i>
        </li>
        <li>3. Receive shortlisted films</li>
      </ul>
      {{-- <a href="{{ route('f.auth.register') }}" class="btn btn_primary what-i-am__submit">Register</a> --}}
      <div class="what-i-am__bg-text">Financiers</div>
    </div>
    <div class="what-i-am__bg">
      <img src="/media/for-financiers-bg.png" srcset="/media/for-financiers-bg@2x.png 2x">
    </div>
  </section>

  <section class="what-i-am what-i-am_for-distributors">
    <div class="section-header">
      <h2 class="section-header__title">What I Am</h2>
      <i class="dash section-header__dash"></i>
      <p class="section-header__lead section-header__lead_big">For Distributors</p>
    </div>
    <div class="what-i-am__container">
      <div class="what-i-am__your-steps">Your steps to films</div>
      <div class="what-i-am__push-button">Push button. Get film.</div>
      <ul class="what-i-am__steps">
        <li>1. Register</li>
        <li>2. Browse approved projects</li>
        <li>3. Secure rights</li>
      </ul>
      {{-- <a href="{{ route('f.auth.register') }}" class="btn btn_primary what-i-am__submit">Register</a> --}}
      <div class="what-i-am__bg-text">Distributors</div>
    </div>
    <div class="what-i-am__bg">
      <img src="/media/for-distributors-bg.png" srcset="/media/for-distributors-bg@2x.png 2x">
    </div>
  </section>

  <div class="what-i-am-indicators-wrapper">
    <ul class="what-i-am-indicators">
      <li class="active" data-scroll-to-slide="0"></li>
      <li data-scroll-to-slide="1"></li>
      <li data-scroll-to-slide="2"></li>
    </ul>
  </div>

  <template id="producer-2">
    <p class="tooltip-title">What info is needed<br/>to submit a film?</p>
    <p class="tooltip-text">General info such as; logline, artwork, link on the sizzle reel or the producers and directors pitch. Production info about director, producer, writer, DOP. Financial info such as; budget; script, financing plan.</p>
    <a class="tooltip-link" href="#faq">Find out more in FAQ</a>
    <button class="tooltip-close">
      <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
      </svg>
    </button>
  </template>
  <template id="financier-2">
    <p class="tooltip-title"></p>
    <p class="tooltip-text">You can invest in any stage of production, as well as P&A</p>
    <a class="tooltip-link" href="#faq">Find out more in FAQ</a>
    <button class="tooltip-close">
      <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
      </svg>
    </button>
  </template>
</div>
