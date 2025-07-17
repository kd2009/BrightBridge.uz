@extends("admin.main")


@section('content')


    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">

                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    <thead>
                    <tr><th class="sorting sorting_asc"
                            tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="">Id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Author</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Text</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Product id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Edit</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Delete</th>

                    </thead>
                    <tbody>

                    <?php foreach ($commentary as $item){

                        if ($item['comment_id'] == "0"){
                        ?>




                                  <tr class="odd" >
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['fullname']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['review']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['prod_id']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("permitcom",['id'=>$item['id']])}}"><font color="black">Permit</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("dpermitcom",['id'=>$item['id']])}}"><font color="black">Don't permit</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("dellcom",['id'=>$item['id']])}}"><font color="black">Delete</font></a></td>

                    </tr><?php } if ($item['comment_id'] == "1"){
                        ?>




                                  <tr class="odd" bgcolor="#90ee90">
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['fullname']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['review']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['prod_id']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("permitcom",['id'=>$item['id']])}}"><font color="white">Permit</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("dpermitcom",['id'=>$item['id']])}}"><font color="white">Don't permit</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("dellcom",['id'=>$item['id']])}}"><font color="white">Delete</font></a></td>

                    </tr><?php }
if ($item['comment_id'] == "2"){?>

                    <tr class="odd" bgcolor="#cd5c5c">
                    <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                    <td class="dtr-control sorting_1" tabindex="0"><?=$item['fullname']?></td>
                    <td class="dtr-control sorting_1" tabindex="0"><?=$item['review']?></td>
                    <td class="dtr-control sorting_1" tabindex="0"><?=$item['prod_id']?></td>
<td class="dtr-control sorting_1" tabindex="0"><a href="{{route("permitcom",['id'=>$item['id']])}}"><font color="white">Permit</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("dpermitcom",['id'=>$item['id']])}}"><font color="white">Don't permit</font></a></td>
                                            <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("dellcom",['id'=>$item['id']])}}"><font color="white">Delete</font></a></td>

                    </tr>
<?php }





                    }?>
                    </tbody>

                </table>

            </div>





        </div><!--/category-tab-->




    </div>

@endsection 