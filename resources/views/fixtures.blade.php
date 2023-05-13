<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5">
    <div class="table-responsive">
        <h4 class="text-center">Fixtures</h4>

        @if (!empty($weeks))
            <div class="row">
                @foreach($weeks as $week)
                    <div class="col-md-4">
                        <table class="table table-hover">
                            <tbody id="table-body">
                            <tr>
                                <td style="background-color: black; color: white" colspan="100%">{{$week->title}} Week</td>
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

                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        @endif
        <a href="/simulation" class="btn btn-success">Start Simulation</a>
    </div>
</div>
</body>
</html>
