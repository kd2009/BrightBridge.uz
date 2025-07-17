@extends("admin.main")


@section('content')


    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">
                <button style="background-color: grey;margin-bottom: 5px;  border-color: grey"><a href="{{route('addtov')}}"><font color="white">Add user</font></a></button>
                <br>

                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    <thead>
                    <tr><th class="sorting sorting_asc"
                            tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="">Id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Surname</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Image</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Phone</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Login</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Password</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="3" aria-label="">Actions</th>


                    </thead>
                    <tbody>

                    <?php foreach ($users as $item){?>






                    <tr class="odd" >
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['id']?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['name']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['surname']?></td>
                        <td width="100" class="dtr-control sorting_1" tabindex="0">

                            <img style="width: 100%;height: 80px;object-fit: contain;" src="/public/uploaded/<?=$item['img']?>" alt="">
                        </td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['phone']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['login']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item['password']?></td>
                        <td class="dtr-control sorting_1" tabindex="0"><?if ($item['status'] == 1) {
                        ?>Admin<?
                        }elseif ($item['status'] == 0) {
                        ?>User<?
                        }?></td>





                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("ordersuser",['id'=>$item['id']])}}"><font color="blue">Orders</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("edituser",['id'=>$item['id']])}}"><font color="blue">Edit</font></a></td>
                        <td class="dtr-control sorting_1" tabindex="0"><a href="{{route("delluser",['id'=>$item['id']])}}"><font color="blue">Delete</font></a></td>

                    </tr><?php }?>






                    </tbody>

                </table>


            </div>





        </div><!--/category-tab-->




    </div>

@endsection