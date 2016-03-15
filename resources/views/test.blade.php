<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Modal Example</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>

                <!--//////////////////////////// Popup Body /////////////////////////////////////////// -->
                <div class="modal-body">
                    <div class="container">
                        <h1>Projects and Developers AJAX</h1>

                        <div class="col-lg-4">
                            {!!Form::open(array('url'=>'', 'files'=>true))!!}
                            <div class="form-group">
                                <label for="">Projects</label>
                                <select class="form-control input-sm" name="project" id="project">
                                    @foreach($pro as $pr)
                                        <option value="{'values':[{{$pr->dev_team_name}},{{$pr->project_id}}]}">{{$pr->project_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Developers</label>
                                <select class="form-control input-sm" name="developers" id="developers">
                                    <option value=""></option>
                                </select>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
                <!--////////////////////////// End ofP opup Body /////////////////////////////////////// -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

        <script>
            $('#project').on('change',function(e){
                console.log(e);

                var dev_team_name = e.target.value;

                $.get('/ajax-dev_first_name?dev_team_name=' + dev_team_name, function (data) {
                    $('#developers').empty();
                    $.each(data, function(combo, dataSet){
                        $('#developers').append('<option value="'+ dataSet.id+'">'+dataSet.first_name+'</option>')
                    });
                });
            });
        </script>
    </div>

</div>

</body>
</html>