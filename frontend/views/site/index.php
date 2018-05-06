<?php

/* @var $this yii\web\View */

$this->title = 'Welcome';
?>



    <section class="search-holder">

        <div class="search-inner">
            <div class="display-table">
                <div class="table-cell">
                    <div class="search-description">
                        Bewertungen lesen. Das passende Produkt finden. Bewertungen schreiben.
                    </div>
                    <form action="?">
                        <div class="input-group">
                            <input type="text" value="<? echo implode(' ',$terms); ?>" name="term" class="form-control" placeholder="Suchen..." aria-describedby="inputGroupPrepend2" required>
                            <div class="input-group-prepend">
                                <button class="btn btn-success search-btn">
                                    <div class="display-table">
                                        <div class="table-cell">
                                            <svg>
                                                <use xlink:href="/img/sprite.svg#icon-search"></use>
                                            </svg>
                                        </div>
                                        <div class="table-cell">
                                            SUCHEN
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <section class="container-fluid filter-info">

        <div class="row">
            <? if(!empty($terms)): ?>
                <div class="col">
                    <? echo $count; ?> Ergebnisse fur
                    <span class="search-query">"<? echo implode(' ', $terms); ?>":</span>
                </div>
            <? endif; ?>
            <div class="col text-right">
                <div class="d-inline">
                    <svg class="active">
                        <use xlink:href="/img/sprite.svg#icon-order-list"></use>
                    </svg>
                </div>
                <div class="d-inline">
                    <svg>
                        <use xlink:href="/img/sprite.svg#icon-order-table"></use>
                    </svg>
                </div>
                <div class="d-inline">
                    Vergleichen
                </div>
            </div>
        </div>

    </section>

    <section class="container-fluid filter">
        <div class="row">
            <div class="col">
                <? if(!empty($terms)): ?>

                    Filtern nach:
                    <? foreach ($terms as $term) : ?>
                        <div class="d-inline query-term-part">
                            <? echo $term; ?>
                            <a href="?term=<? echo implode('+',array_diff($terms,[$term])); ?>" class="query-term-remove">×</a>
                        </div>
                    <? endforeach; ?>

                    <div class="d-inline query-term-part">
                        <a href="/" class="query-term-remove-all">
                            Alles entfernen
                        </a>
                    </div>
                <? endif; ?>
            </div>
            <div class="col text-right">
                <select name="order" class="order-options">
                    <option value="0">Relevanz</option>
                    <option value="1">Bewertung(Top)</option>
                    <option value="2">Bewertung(Flop)</option>
                    <option value="3">Anzahl an Bewertungen</option>
                </select>
            </div>
        </div>
    </section>

    <section class="container-fluid product-list">

        <? foreach ($list as $key => $item):  ?>
            <div class="row">
                <div class="col-sm-4">
                    <img src="<? echo $item['picture']; ?>" alt="Product picture">
                </div>
                <div class="col-sm-4">
                    <div class="product-title">
                        <? echo $item['title']; ?>
                    </div>
                    <div>
                        <? echo $item['brand'] ?>
                    </div>
                    <div class="rating-progress">
                        <span class="rating-bar"  style="width: 72%;"></span>
                        <span class="rating-mask"></span>
                    </div>
                    <div class="product-comment-counter">
                        <a href="#asdc">
                            767 Bawertungsanalysen
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-inline product-price-holder">
                        <div class="product-price sehr-gut">
                            <div class="top-text">Sehr Gut</div>
                            <span class="price">
                                    <? echo $item['price'] ?> €
                                </span>
                            <div class="bottom-text">ReviewScore</div>
                        </div>
                    </div>
                    <div class="d-inline comment-count-wrapper">
                        <div class="comment-count">
                                <span class="comments-total">
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#Capa_1"></use>
                                    </svg>
                                </span>
                            <span class="comments-about">
                                    Akku
                                </span>
                        </div>
                        <div class="comment-count">
                                <span class="comments-total">
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#icon-comment"></use>
                                    </svg>
                                </span>
                            <span class="comments-about">
                                    Akku
                                </span>
                        </div>
                        <div class="comment-count">
                                <span class="comments-total">
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#icon-comment"></use>
                                    </svg>
                                </span>
                            <span class="comments-about">
                                    Akku
                                </span>
                        </div>
                        <div class="comment-count">
                            <a href="#d" class="comments-read">
                                20 weitere Schlusselthemen
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>

        <ul class="pagination justify-content-center">
            <li>
                <a class="active" href="#page">1</a>
            </li>
            <li>
                <a href="#page">2</a>
            </li>
            <li>
                <a href="#page">3</a>
            </li>
            <li>
                <a href="#page">4</a>
            </li>
            <li>
                <a href="#gad">&gt;</a>
            </li>
            <li>
                <a href="#gad">&raquo;</a>
            </li>
        </ul>
    </section>



