<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="{{asset('script.js')}}"></script>
</head>
<body>
<div class="container">

    @if($standing)
        <h3 style="text-align: center">Simulation</h3>
        <div class="row standings-box">
            <div class="col-md-6">
                <div class="table-responsive">
                    <h4>Standings</h4>
                    <table id="standings-table" class="table table-bordered table-striped">
                        <thead>
                        <th>Teams</th>
                        <th>P</th>
                        <th>W</th>
                        <th>D</th>
                        <th>L</th>
                        <th>GD</th>
                        <th>PTS</th>
                        </thead>
                        <tbody>
                        @foreach($standing as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->played}}</td>
                                <td>{{$team->won}}</td>
                                <td>{{$team->draw}}</td>
                                <td>{{$team->lose}}</td>
                                <td>{{$team->goal_drawn}}</td>
                                <td>{{$team->points}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center make-full-width">Simulation Managements</h3>
                            </div>
                            <div class="col-md-4">
                                <button style="width: 165px;" class="btn btn-success play-all-weeks">
                                    Play All Weeks
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-danger reset-all">Reset All</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td class="text-center" colspan="3">
                            <h3>
                                Fixtures
                            </h3>
                        </td>
                    </tr>
                    </thead>
                    <tbody id="table-body">
                    @if (!empty($weeks))
                        @foreach($weeks as $week)
                            <tr>
                                <td colspan="3" class="fixtures-box_header">{{$week->title}} Week
                                    Matches
                                </td>
                            </tr>
                            @if($matches)
                                @foreach ($matches[$week->id] as $fixture)
                                    <tr>
                                        <td class="text-center">
                                            {{$fixture['home_team']}}
                                        </td>
                                        <td class="text-center">{{$fixture['home_team_goal']}}
                                            - {{$fixture['away_team_goal']}}</td>
                                        <td class="text-center">
                                            {{$fixture['away_team']}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                @if($fixture['status'] == 0)
                                    <td colspan="5" class="text-center weekly-simulate-button">
                                        <button data-week="{{$week->id}}" class="btn btn-primary play-week">
                                            Simulate {{$week->title}} Week
                                        </button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
{{--                    @if (!empty($weeks))--}}
{{--                        @foreach($weeks as $week)--}}
{{--                            <div class="card text-center">--}}
{{--                                <div class="card-header">--}}
{{--                                    {{$week->title}} Week--}}
{{--                                    Matches--}}
{{--                                </div>--}}
{{--                                @if($matches)--}}
{{--                                    <div id="fixture-card-body" class="card-body">--}}
{{--                                        @foreach ($matches[$week->id] as $fixture)--}}
{{--                                            <p class="card-text">{{$fixture['home_team']}} {{$fixture['home_team_goal']}}--}}
{{--                                                - {{$fixture['away_team_goal']}} {{$fixture['away_team']}}</p>--}}
{{--                                        @endforeach--}}
{{--                                            @if($fixture['status'] == 0)--}}
{{--                                                <button data-week="{{$week->id}}" class="btn btn-primary play-week weekly-simulate-button">--}}
{{--                                                    Simulate {{$week->title}} Week--}}
{{--                                                </button>--}}
{{--                                            @endif--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <div class="prediction-wrapper">
                    <h4 class="text-center">Champion Prediction</h4>
                    <table class='table make-full-width'>
                        <thead>
                        <tr>
                            <th scope='col'>Team</th>
                            <th scope='col'>Percentage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($predictions)
                            @foreach($predictions as $team => $percent)

                                <tr>
                                    <th scope='row'> {{ $team  }} </th>
                                    <td> {{ $percent }} %</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
</body>
</html>
