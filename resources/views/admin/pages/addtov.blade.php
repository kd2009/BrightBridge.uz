@extends("admin.main")


@section('content')
<?php    $lang= App::getLocale();?>


    <div class="container-fluid">
        <form style="" action="" method="post" enctype="multipart/form-data">

            @csrf
           



                        <input  style="width:300px;" type="text" placeholder="Title" name="title" id="" ><br>
                        <input  style="width:300px;" type="text" placeholder="Info" name="info" id=""><br>
                        Auction start date <br> 
                        <input  style="width:300px;" type="date" placeholder="Date" name="stdate" id=""><br>
                        Auction end date <br>
                        <input  style="width:300px;" type="date" placeholder="Date" name="endate" id=""><br>
                        Picture
                        <input style="width:300px;" type="file" name="img" />
                      
            <input style="width:300px;" type="text" placeholder="Price" name="price" id=""><br>
            <input style="width:300px;" type="text" placeholder="Location" name="location" id=""><br>
<select style="width: 24%;" name="cat_id">  
   
  <option value="0">Not mentioned</option>
  <option value="1">Drawings</option>
  <option value="2">Paintings</option>
  <option value="3">Photographic Images</option>
  <option value="4">Sculptures</option>
  <option value="5">Carvings</option>
  <option value="6">Digital Art (NEW)</option>


</select>
        <br>

            <input  style="width:300px;" type="submit" class="button" value="Submit">

        </form>










    </div>

@endsection