@extends("admin.main")


@section('content')


    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">

                <table  id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    <thead>
                    <tr><th class="sorting sorting_asc"
                            tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="">Id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Title</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Image</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Quantity</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Price</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Country</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">City</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Zip code</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Finish</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Cancel</th>

                    </thead>
                    <tbody>

                    <?php foreach ($tovari as $item){?>
                    <? if ($item['status'] == "1"){
                    ?>






                    <tr class="odd" bgcolor="#90ee90">
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['title']?></td>
                        <td width="100" class="dtr-control sorting_1" tabindex="0">

                            <img width="100" height="100" src="/public/uploaded/<?=$item['img']?>" alt="">
                        </td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['qty']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['price']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['country']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['city']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['zipcode']?></td>
                        <td class="dtr-control sorting_1" tabindex="0" colspan="3">Ordered</td>






                    </tr><?php }  if ($item['status'] == "2"){
                    ?>






                    <tr class="odd" bgcolor="#cd5c5c">
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['title']?></td>
                        <td width="100" class="dtr-control sorting_1" tabindex="0">

                            <img width="100" height="100" src="/public/uploaded/<?=$item['img']?>" alt="">
                        </td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['qty']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['price']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['country']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['city']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['zipcode']?></td>
                        <td class="dtr-control sorting_1" tabindex="0" colspan="3">Canceled</td>






                    </tr><?php } if ($item['status'] == "0"){
                    ?>






                    <tr class="odd">
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['title']?></td>
                        <td width="100" class="dtr-control sorting_1" tabindex="0">

                            <img width="100" height="100" src="/public/uploaded/<?=$item['img']?>" alt="">
                        </td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['qty']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['price']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['country']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['city']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['zipcode']?></td>
                        <td class="dtr-control sorting_1" tabindex="0">Waiting</td>





                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("finishord",['id'=>$item['id'],'user_id'=>$item['user_id']])}}"><font color="blue">Finish</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("cancelord",['id'=>$item['id'],'user_id'=>$item['user_id']])}}"><font color="blue">Cancel</font></a></td>

                    </tr><?php }




                    }?>






                    </tbody>

                </table>


            </div>





        </div><!--/category-tab-->




    </div>

@endsection