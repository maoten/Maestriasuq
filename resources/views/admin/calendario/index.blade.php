@extends('layouts.app')

@section('title', 'Calendario')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/component2.css') }}">
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endsection

@section('content')

    <div class="container">
        @include('layouts.general.nav_admin')
        </br>

        <div class="row">

            <div class="col-md-12">
                @include('flash::message')

                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-calendar iconoizq"></i>Calendario
                        </h4></div>
                    <div class="panel-body text-justify">
                        <div class="row">

                            <div class="page-header">

                                <div class="pull-right form-inline">
                                    <div class="btn-group">
                                        <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                                        <button class="btn" data-calendar-nav="today">Hoy</button>
                                        <button class="btn btn-primary" data-calendar-nav="next">Sig >></button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                        <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                        <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                       
                                    </div>
                                </div>

                                <h3></h3>
                            </div>

                            <div class="span9">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>

                    <br>

                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{ asset('js/nav_estudiante.js') }}"></script>
    <script src="{{ asset('js/underscore-min.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script type="text/javascript">
        <?php
                $eventos = $calendario;

                if (count($eventos) == 0) {
                    $result[] = array();
                } else {

                    foreach ($eventos as $e) {

                        $inicio = strtotime($e->fecha_inicio) * 1000;
                        $fin    = strtotime($e->fecha_fin) * 1000;

                        $result[] = array(
                                'id'    => $e->id,
                                'title' => $e->asunto,
                                'lugar' => $e->lugar,
                                'descripcion'   => $e->descripcion,
                                'class' => "event-warning",
                                'start' => $inicio,
                                'end'   => $fin
                        );
                    }
                }
                ?>
        (function ($) {

            "use strict";

            var options = {
                events_source:<?php echo json_encode($result);?>,
                view: 'month',
                tmpl_path: '../tmpls/',
                tmpl_cache: false,
                onAfterEventsLoad: function (events) {
                    if (!events) {
                        return;
                    }
                    var list = $('#eventlist');
                    list.html('');

                    $.each(events, function (key, val) {
                        $(document.createElement('li'))
                                .html('<a href="">' + val.title + '</a>')
                                .appendTo(list);
                    });
                },
                onAfterViewLoad: function (view) {
                    $('.page-header h3').text(this.getTitle());
                    $('.btn-group button').removeClass('active');
                    $('button[data-calendar-view="' + view + '"]').addClass('active');
                },
                classes: {
                    months: {
                        general: 'label'
                    }
                }
            };
            var calendar = $('#calendar').calendar(options);

            $('.btn-group button[data-calendar-nav]').each(function () {
                var $this = $(this);
                $this.click(function () {
                    calendar.navigate($this.data('calendar-nav'));
                });
            });

            $('.btn-group button[data-calendar-view]').each(function () {
                var $this = $(this);
                $this.click(function () {
                    calendar.view($this.data('calendar-view'));
                });
            });
        }(jQuery));
    </script>
@endsection