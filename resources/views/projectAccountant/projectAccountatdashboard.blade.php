@extends('projectAccountant.head')
@section('content')
        <!-- Start Row -->
<div class="row">

    <!-- Start Project view -->
    <div class="col-md-12 col-lg-6" style="width: 100%" id="div1-wrapper">
        <div class="panel panel-widget">
            <div class="panel-title">
                Project Stats <span class="label label-warning">{{$number}}</span>
                <ul class="panel-tools">
                    <li><a class="icon search-tool"><i class="fa fa-search"></i></a></li>
                    <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                    <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="panel-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search...">
                    <i class="fa fa-search icon"></i>
                </form>
            </div>


            <div class="panel-body table-responsive" id="mydiv">

                <table class="table table-hover table-striped" id="table">
                    <thead>
                    <tr>

                        <td>Project ID</td>
                        <td>Name</td>
                        <td>#user stories</td>
                        <td>#completd Userstories</td>
                        <td>Accountant ID</td>
                        <td>Manger ID</td>
                        <td>Architecture ID</td>
                        <td>Qa Team</td>
                        <td>Dev team</td>


                    </tr>
                    </thead>
                    <tbody id="show">

 @foreach($project as $projects)
    <tr class="rowid" id="tr">
        <td>#{{$projects->project_id}}</td>
        <td>{{$projects->project_name}}</td>
        <td>{{$projects->no_of_user_stories}}</td>
        <td>{{$projects->no_of_compl_user_stories}}</td>
        <td>{{$projects->accountant_id}}</td>
        <td>{{$projects->manager_id}}</td>
        <td>{{$projects->consultant_architect_id}}</td>
        <td>{{$projects->qa_team_name}}</td>
        <td>{{$projects->dev_team_name}}</td>

    </tr>
@endforeach


</tbody>
</table>

</div>
</div>
</div>
<!-- End Project view -->

</div>
<script type="text/javascript">
$('document').ready(function(){
$('#tr td').each(function() {
var cat_id = this.cells['3'].innerHTML;

//alert(cat_id);
$.get('ajax-subcat4?cat_id='+cat_id,function(data){
//  $('#qateamsub').empty();
$(data,function(index,subcatObj){
$('#td').append('<td value="'+subcatObj.id+'">'+subcatObj.first_name+'</td>');

});

});
});

});
</script>
<!-- End Row -->
@stop