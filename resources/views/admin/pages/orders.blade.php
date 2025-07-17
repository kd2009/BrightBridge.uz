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
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Surname</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Raqam</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">ID</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Quantity</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Price</th>
                 
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Sell</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Cancel</th>

                    </thead>
                    <tbody>

                    <?php foreach ($orders as $item){?>
                    <? if ($item['status'] == "1"){
                    ?>






                    <tr class="odd" bgcolor="#90ee90">
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['name']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['surname']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['phone']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>
                       
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['qty']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['price']?></td>
                        <td class="dtr-control sorting_1" tabindex="0" colspan="3">Sold</td>






                    </tr><?php }  if ($item['status'] == "2"){
                    ?>






                    <tr class="odd" bgcolor="#cd5c5c">
                         <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['name']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['surname']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['phone']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>
                       
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['qty']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['price']?></td>
                        <td class="dtr-control sorting_1" tabindex="0" colspan="3">Canceled</td>






                    </tr><?php } if ($item['status'] == "0"){
                    ?>






                    <tr class="odd">
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['name']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['surname']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['phone']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>
                       
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['qty']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['price']?></td>
                        <td class="dtr-control sorting_1" tabindex="0">Waiting</td>





                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("finishord",['id'=>$item['id']])}}"><font color="blue">Sell</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("cancelord",['id'=>$item['id'],'user_id'=>$item['user_id']])}}"><font color="blue">Cancel</font></a></td>

                    </tr><?php }




                    }?>






                    </tbody>

                </table>


            </div>





        </div><!--/category-tab-->




    </div>

@endsection