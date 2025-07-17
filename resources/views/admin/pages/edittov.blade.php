@extends("admin.main")


@section('content')


    <div class="container-fluid">

        <form action="" method="post" enctype="multipart/form-data">

           
          
                
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  



                       Title  <br><input style="width: 300px" type="text" value="<?=$tov[0]['title']?>" name="title" id=""><br>
                        Info <br><input style="width: 300px" type="text" value="<?=$tov[0]['description']?>" name="description" id=""><br>
                        Starting date <br><input style="width: 300px" type="date" value="<?=$tov[0]['stdate']?>" name="stdate" id=""><br>
                        Ending date <br><input style="width: 300px" type="date" value="<?=$tov[0]['endate']?>" name="endate" id=""><br>
                        Location  <br><input style="width: 300px" type="text" value="<?=$tov[0]['location']?>" name="location" id=""><br>
                      

                 



                  


           

            <div class="form_group">
                <label for="exampleInputEmail1">img</label><br />
                <input type="file" name="img"  class=""/>
            </div>
            Estimated price <br>
            <input style="width: 300px" type="text" value="<?=$tov[0]['price']?>" name="price" id=""><br>
           

 
    


         <br> 






            <input style="position: relative;left: 100px" type="submit" ><br>
        </form>

    </div>

@endsection