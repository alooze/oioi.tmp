<div class="modal" id="add-comment-modal">
  <div class="modal-dialog animated">
    <div class="modal-close" data-hide-modal>
      <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
      </svg>
    </div>
    <div class="modal-content">
      <section class="add-comment">
        <div class="add-comment__title">Adding comment</div>
        <div class="add-comment__tabs" role="tablist">
          <a class="tab-link active" data-toggle="tab" href="#add-comment-no-account">I don't have account</a>
          <a class="tab-link" data-toggle="tab" href="#comment-login-form">I'm registered user</a>
        </div>
        <div class="add-comment__content">
          @include('forms.comment')
          @include('forms.login-comment')
        </div>
      </section>
    </div>
  </div>
</div>


<div class="modal" id="add-comment-loggedin-modal">
  <div class="modal-dialog animated">
    <div class="modal-close" data-hide-modal>
      <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
      </svg>
    </div>
    <div class="modal-content">
      <section class="add-comment">
        <div class="add-comment__title">Adding comment</div>
        <div class="add-comment__content">
          @include('forms.comment2')
        </div>
      </section>
    </div>
  </div>
</div>


<div class="modal" id="comment-success-modal">
  <div class="modal-dialog animated">
    <div class="modal-close" data-hide-modal>
      <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
      </svg>
    </div>
    <div class="modal-content">
      <section class="comment-success">
        <img class="comment-success__img" src="data:image/png;base64,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"
          srcset="data:image/png;base64,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 2x">
        <div class="comment-success__title">Thank you!</div>
        <div class="comment-success__text">Your comment will be added
          <br>after moderators’ revision</div>
        <button class="btn btn_primary btn_sm" data-hide-modal>Close</button>
      </section>
    </div>
  </div>
</div>


<div class="modal" id="contact-success-modal">
  <div class="modal-dialog animated">
    <div class="modal-close" data-hide-modal>
      <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
      </svg>
    </div>
    <div class="modal-content">
      <section class="comment-success">
        <img class="comment-success__img" src="data:image/png;base64,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"
          srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAABxCAMAAAAziXemAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAAARnQU1BAACxjwv8YQUAAAABc1JHQgCuzhzpAAACfFBMVEUAAABWqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy9Wqy87OvRJAAAA03RSTlMAsDBA4CQgoPBwUAFggP0DCg8M/EkG+hwR9tnx5Hv33BbNQtc8BD8Q2777+ZfsjgLTFfQlUvKseHQ5LLmilcCesuZepYhNDu3ONphvWytuhyMSHcvlk7w96bhWGTe2q2HGTihmGkOdnIzvLdJqWHrYyQnr6DKKT2lfKuGoSCH+R2UUg/N8G2wF4xPabVWZRDMphkXRyGT49UuLecUXyj5aobV1kN9+JjF2wee9On233konj8eRwkxxkhiaCB/i1V1GXKY4c6k7Bw2bfzXPw4UeC92j+1w10AAABOhJREFUaN7F2uVj20YUAPBzw3VjSuwkbsChpmFukjacNm0D3dIkZVqZVmbuVtyKY2YoDEvDwphR/9DuncxSmjvd9Pq+2LLv3c+ST6e7kwj53+Kn2h8PHzj823ErQYvKHpuixtCvTiw0VQnFUAwS2huGKp5HcNAkaqXcGcxXD3LGcjQ0lr66FkwEtRUVJaR7GahzcVHydTZ9vxoZJWvo+w5s9AU4vmnI6EJAJ3AmFhW8viJJLHqfqtSiVkAf5RG/aJhxSDEQZVqUJNKNcaOTzmvZirHI1kFjudBVVxSjMdEoeiRwhUhJFIx112caRJ9VxdxZewsNt963QjvNhU5g+xk7TeqUmUqr2MKP/pwJ5vx0ufN0Cq3Dwo8+BOYUt5zpeJxWsokbPV1DS+yT3E/SGdEJjYrOguJ1kmahl1aSWcmN/kELVMmO4LLglycTXtTuoQUaJc28FFrJuiJudAB+4w4587vxUMlGEoGWx0aG9+ba1wLfz4byX0mZdRms/VsjUb3YkKd+fxDGbjKka5jVlx/e/vNH7KnX2uH7OPouka96354Pk0ORVMCa7d3brLKc2Zp2pR+/iKFnaqLyFzu6d+f4u+2VUS2rV3O5z/rheVb0iAh6waP51ZsD1+A1W3lqSG+DsvVHBdCKEY/YPu5LBetxHxNALbRgTegMyAyQ5Q0O7kZn/50m/COIJoQ241XS2+gSaep9kPO3HHqjSbD/9EHWcTl0jPBZDf1lPDLqVsf+uGg/ZJ1GRusg6yQyeowmnSLI6L80aQ42mkuThrFRGDOeQEbZiCEPGT3nn6KjojDcrSfIaAvNGcRGi2lOMzY6RHOykNHuwAwGE50JOf3I6B5YYHAjozAue4Igo1BFOzYKs42dyOjJEpqyFBldDikfIKNjISUdGX2JZswjyOgbNOMyNvoqzTiLjcLKxGfy6PsiZhpkpMqjqcKNN14e3SmCdtGE7UQenV7Eb06G5YM2A2j7mGB8wubEk7jnpwNPQ/kCQXSJ7nqD5SifmfqOos4oxNBG/VWO8T19q2LuH9PGVXhZ2ZpaUdSVo0iGJ9jY+RevVlpsEXWc6kyyiZjbQzfCBJbpiCs+LBbSNtQ0g5vMeHuAGEK1Yb3X5i0ZzSuZt6G5M+KJADnUYDwQ9GH/RAo1/oKjbkdGqwGtRUbZGtZShL/Rsizs/kUV3Ggz3bTCGT05uPmnErFpUrDnaXYFN2vhTnhrpbmmYzNFnvOFPtjvX+M28+AmgNES9slBtvx/zETTXsaGGb7wz06og4BXTGu4xYrOgw+r2Yf1L+4148ieLytl1U+N3v1m//WgY86ShGAk6466mloSBGL/1XJ/1Z9rRlPWd/Uuxx/pmH02Q4OG0o26Cx+5OtdBbbEVxszW/hGO/a7FKdFlNYWeNLSX397v4TrnrU09gT+jWA9tUG/mifypFZdi+G9QjdVBLzLzTYdp57MWtap3+CxugodaWa+idJl5vY9G7V3M/NLUMUYU6p7EzGFzn2iNRLe26/ZkpqIOtcfOIoio82Vmfk8Q0eotzNxNENFqGLkptm8IIprGnpz1LCCIaBybCpfiPJnsR99jTxZk5BFEdP02tqxQQBDRRWysMX0RwUTZs03b1hNUFCLzU4KOfhxH0NGcNIKOVvlQ58oHwBysxp2guzoU5RknQQ7n3B2FZtX9H7hSXr5urMaqAAAAAElFTkSuQmCC 2x">
        <div class="comment-success__title">Thank you!</div>
        <div class="comment-success__text"></div>
        <button class="btn btn_primary btn_sm" data-hide-modal>Close</button>
      </section>
    </div>
  </div>
</div>
