<header class="home-header section">
  <div class="navbar">
    <a class="logo navbar__logo" href="/"></a>
    <nav class="nav navbar__nav">
      <a class="nav__link" href="#what-i-am" data-menuanchor="what-i-am">What I am</a>
      <a class="nav__link" href="#how-i-work" data-menuanchor="how-i-work">How I work</a>
      <a class="nav__link" href="#benefits" data-menuanchor="benefits">Benefits</a>
      <a class="nav__link" href="#faq" data-menuanchor="faq">Faq</a>
      <a class="nav__link" href="#contact" data-menuanchor="contact">Contact</a>
      <i class="nav__divider"></i>
      @include('auth.nav')
    </nav>
  </div>

  <div class="hero">
    <div class="hero__inner">
      <h1 class="hero__title">Access. Assess. Success.</h1>
      <p class="hero__lead">I'm an industry hub that intelligently evaluates
        <br/>and commercially estimates creative projects.
        <br/> I'm the link between Producers, Financiers and Buyers.</p>
      <i class="hero__dash"></i>

      <div class="hero__timer">
        <i class="icon icon_info hero__info" data-tippy-html="#cycle-tooltip">?</i>

        <ul class="timer" id="countdown">
          <li>
            <div class="timer__num days">{{ $endPeriod->d }}</div>
            <div class="timer__label">days</div>
          </li>
          <li>
            <div class="timer__num hours">{{ $endPeriod->h }}</div>
            <div class="timer__label">hours</div>
          </li>
          <li>
            <div class="timer__num minutes">{{ $endPeriod->m }}</div>
            <div class="timer__label">minutes</div>
          </li>
          <li>
            <div class="timer__num seconds">{{ $endPeriod->s }}</div>
            <div class="timer__label">seconds</div>
          </li>
        </ul>
      </div>
      <br>
      <a class="hero__scroll-down-btn" href="#what-i-am">Scroll down</a>
    </div>
  </div>

  <template id="cycle-tooltip">
    <p class="tooltip-title">Submission deadline</p>
    <p class="tooltip-text">Submission deadline is the date, while we register producers' applications and then, we submit the AI estimations and shortlist to the stakeholders.</p>
    <a class="tooltip-link" href="#faq">Find out more in FAQ</a>
    <button class="tooltip-close">
      <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
      </svg>
    </button>
  </template>
</header>
