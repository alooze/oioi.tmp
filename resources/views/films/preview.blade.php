@extends('layouts.cabinet')

@section('title', $title)

@section('custom_css')
@stop

@section('main_container')
    <div class="dashboard-content">
        <h1 class="dashboard-title">{{ $title }}</h1>
        <div class="dashboard-content__inner dashboard-content__inner--preview-page">
            <div class="modal-content modal-content--preview modal-content--preview-page">
                <div class="modal-content-inner">
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
                                {{--<p>Total budget <span>$ {{ $film->totalBeauty ? : '-' }}</span></p>--}}
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
                                <td><p>{{ $P->firstname }} {{$P->lastname }}</p></td>
                                <td><p><button class="copy" data-clipboard-text="{{ $P->imdb_link }}">Copy</button></p></td>
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
                                <td><p>{{ $D->firstname }} {{$D->lastname }}</p></td>
                                <td><p><button class="copy" data-clipboard-text="{{ $D->imdb_link }}">Copy</button></p></td>
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
                                <td><p>{{ $W->firstname }} {{$W->lastname }}</p></td>
                                <td><p><button class="copy" data-clipboard-text="{{ $W->imdb_link }}">Copy</button></p></td>
                            </tr>
                          @endforeach
                        </table>
                      </li>
                      <li>
                        <h3 class="preview__title-secondary">DOP (Director of Photography)</h3>
                        <table class="preview__person-table">
                          <tr>
                            <td><h4 class="preview-small__title">Name</h4></td>
                            <td><h4 class="preview-small__title">IMDB link</h4></td>
                          </tr>
                          @foreach ($film->personnel('dop') as $DP)
                            <tr>
                                <td><p>{{ $DP->firstname }} {{$DP->lastname }}</p></td>
                                <td><p><button class="copy" data-clipboard-text="{{ $DP->imdb_link }}">Copy</button></p></td>
                            </tr>
                          @endforeach
                        </table>
                      </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@stop
