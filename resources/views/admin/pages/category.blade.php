@extends("admin.main")


@section('content')


    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">
You can add new types of fine-art as soon as the news comes up. <br><br>
                <table  id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    <thead>
                    <tr><th class="sorting sorting_asc"
                            tabindex="0" aria-controls="example2" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="">Id</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Title</th>
                       

                    </thead>
                    <tbody>

                    <?php foreach ($category as $item){?>
                






                    <tr class="odd">
                        <td class="dtr-control sorting_1" tabindex="0"><?=$item->id?></td>


                        <td class="dtr-control sorting_1" tabindex="0"><?=$item->title?></td>
                    </tr><?php }




                    ?>






                    </tbody>

                </table>


            </div>





        </div><!--/category-tab-->




    </div>

@endsection