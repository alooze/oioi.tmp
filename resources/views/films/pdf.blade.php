<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="{{ url('/') }}">
    {{-- <link href="{{ ltrim(elixir('/css/dashboard.css'), '/') }}" rel="stylesheet" media="all"> --}}
    <style>
      .preview__person-list li:nth-child(2n) {
        border-left: none;
        padding-left: 0;
      }
      .preview__person-list li {
        width: 100%;
      }
      .preview__person-table td {
        width: auto;
      }
      .preview__person-list li:nth-child(odd) {
        padding-right: 0;
        border-bottom: 1px solid #e0e0e0;
      }
    </style>
  </head>
  <body>
    <div class="dashboard">
      <div class="dashboard-content">
          <div class="dashboard-content__inner dashboard-content__inner--preview-page">
              <div class="modal-content modal-content--preview modal-content--preview-page">
                  <div class="modal-content-inner">
                      <div class="preview__top-wrap flex">
                          <h2 class="preview__title">{{ $user->firstname ? : '-' }} {{ $user->lastname ? : '-' }}</h2>
                          <table class="preview__top-table">
                              <tr>
                                  <td><b>E-mail:</b></td>
                                  <td>{{ $user->email ? : '-' }}</td>
                              </tr>
                              <tr>
                                  <td><b>Phone:</b></td>
                                  <td>{{ $user->phone ? : '-' }}</td>
                              </tr>
                              <tr>
                                  <td><b>Country:</b></td>
                                  <td>{{ $user->countryName ? : '-' }}</td>
                              </tr>
                              <tr>
                                  <td><b>City:</b></td>
                                  <td>{{ $user->cityName ? : '-' }}</td>
                              </tr>
                              <tr>
                                  <td><b>Company:</b></td>
                                  <td>{{ $user->company ? : '-' }}</td>
                              </tr>
                              <tr>
                                  <td><b>IMDB link:</b></td>
                                  <td>{{ $user->imdb_link ? : '-' }}</td>
                              </tr>
                          </table>
                          <div class="preview__img-wrap">
                              <img src="{{ $film->thumbnail }}" alt="Preview" class="img-responsive" width="250">
                          </div>
                          <div class="preview__top-content">
                              <h2 class="preview__title">{{ $film->title ? : '-' }}</h2>
                              <table class="preview__top-table">
                                  <tr>
                                      <td><b>Screenplay based on:</b></td>
                                      <td>{{ $film->based_on ? : '-' }}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Project status:</b></td>
                                      <td>{{ $film->project_status ? : '-' }}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Country of production:</b></td>
                                      <td>{{ $film->countryName() ? : '-' }}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Genre:</b></td>
                                      <td>{{ $film->genre ? : '-' }}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Pitch link:</b></td>
                                      <td>{{ $film->pitch_link ? : '-' }}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Pitch pass:</b></td>
                                      <td>{{ $film->pitch_pass ? : '-' }}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Total budget:</b></td>
                                      <td>$ {{ $film->total_budget ? : '-' }}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Finansion required:</b></td>
                                      <td>$ {{ $film->fin_required ? : '-' }}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Finansion secured:</b></td>
                                      <td>$ {{ $film->fin_secured ? : '-' }}</td>
                                  </tr>
                              </table>
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

                      <div class="preview__about-wrap">
                          <h3 class="preview__title-secondary">Producer</h3>
                          <table class="preview__person-table">
                            <tr>
                              <td><h4 class="preview-small__title">Name</h4></td>
                              <td><h4 class="preview-small__title">Location</h4></td>
                              <td><h4 class="preview-small__title">Contacts</h4></td>
                            </tr>
                            @if (!empty($film->personnel('producer')))
                              @foreach ($film->personnel('producer') as $P)
                                <tr>
                                    <td><p>{{ $P->firstname }} {{$P->lastname }}</p></td>
                                    <td><p>{{ $P->cityName() }}<br/>{{$P->countryName() }}</p></td>
                                    <td>
                                      <p>
                                        <b>Email:</b> <i>{{ $P->email ?: '-'}}</i><br/>
                                        <b>Phone:</b> <i>{{ $P->phone ?: '-'}}</i><br/>
                                        <b>Company:</b> <i>{{ $P->Company ?: '-'}}</i><br/>
                                        <b>Website:</b> <i>{{ $P->website ?: '-'}}</i><br/>
                                        <b>IMDB:</b> <i>{{ $P->imdb_link ?: '-'}}</i>
                                      </p>
                                    </td>
                                </tr>
                              @endforeach
                            @endif
                          </table>
                          <h3 class="preview__title-secondary">Director</h3>
                          <table class="preview__person-table">
                            <tr>
                              <td><h4 class="preview-small__title">Name</h4></td>
                              <td><h4 class="preview-small__title">Links</h4></td>
                            </tr>
                            @if (!empty($film->personnel('director')))
                              @foreach ($film->personnel('director') as $D)
                                <tr>
                                    <td><p>{{ $D->firstname }} {{$D->lastname }}</p></td>
                                    <td><p>
                                      <b>Email:</b> <i>{{ $D->email ?: '-'}}</i><br/>
                                      <b>Phone:</b> <i>{{ $D->phone ?: '-'}}</i><br/>
                                      <b>Company:</b> <i>{{ $D->Company ?: '-'}}</i><br/>
                                      <b>Website:</b> <i>{{ $D->website ?: '-'}}</i><br/>
                                      <b>IMDB:</b> <i>{{ $D->imdb_link ?: '-'}}</i>
                                      <!-- <b>IMDB:</b> <i>{{ $D->imdb_link }}</i><br/>
                                      <b>Showreel:</b> <i>{{ $D->imdb_link }}</i> -->
                                    </p></td>
                                </tr>
                              @endforeach
                            @endif
                          </table>
                          <h3 class="preview__title-secondary">Writer</h3>
                          <table class="preview__person-table">
                            <tr>
                              <td><h4 class="preview-small__title">Name</h4></td>
                              <td><h4 class="preview-small__title">Info</h4></td>
                            </tr>
                            @if (!empty($film->personnel('writer')))
                              @foreach ($film->personnel('writer') as $W)
                                <tr>
                                    <td><p>{{ $W->firstname }} {{$W->lastname }}</p></td>
                                    <td><p>
                                      <b>Email:</b> <i>{{ $W->email ?: '-'}}</i><br/>
                                      <b>IMDB:</b> <i>{{ $W->imdb_link ?: '-'}}</i>
                                    </p></td>
                                </tr>
                              @endforeach
                            @endif
                          </table>
                          <h3 class="preview__title-secondary">DOP (Director of Photography)</h3>
                          <table class="preview__person-table">
                            <tr>
                              <td><h4 class="preview-small__title">Name</h4></td>
                              <td><h4 class="preview-small__title">Location</h4></td>
                              <td><h4 class="preview-small__title">Info</h4></td>
                            </tr>
                            @if (!empty($film->personnel('dop')))
                              @foreach ($film->personnel('dop') as $DP)
                                <tr>
                                    <td><p>{{ $DP->firstname }} {{$DP->lastname }}</p></td>
                                    <td><p>{{ $DP->countryName($DP->production_location) }}</p></td>
                                    <td><p>
                                      <b>Email:</b> <i>{{ $DP->email ?: '-'}}</i><br/>
                                      <b>IMDB:</b> <i>{{ $DP->imdb_link ?: '-'}}</i>
                                    </p></td>
                                </tr>
                              @endforeach
                            @endif
                          </table>
                      </div>
                  </div>

              </div>
          </div>
      </div>
    </div>
  </body>
</html>
