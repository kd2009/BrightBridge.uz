
@extends("admin.main")

@section("content")
    <div class="col-sm-4">

        <form action="" method="post" enctype="multipart/form-data">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="form_group">

                <div class="form_group">
                    <label for="exampleInputEmail1">Name</label><br />
                    <input type="text" name="name"  class="form-control"   value="<?=$users[0]['name']?>"/>
                </div>  <div class="form_group">
                    <label for="exampleInputEmail1">Surname</label><br />
                    <input type="text" name="surname"  class="form-control"   value="<?=$users[0]['surname']?>"/>
                </div>  <div class="form_group">
                    <label for="exampleInputEmail1">Phone</label><br />
                    <input type="text" name="phone"  class="form-control"   value="<?=$users[0]['phone']?>"/>
                    <label for="exampleInputEmail1">img</label><br />
                    <input type="file" name="img"  class="form-control"/>
                </div>
                </div><div class="form_group">
                    <label for="exampleInputEmail1">Status</label><br />
                    <select name="status">

                        <option value="0"<?if ($users[0]['status'] == 0) {
                           ?>selected<?
                        }?>><strong>User</strong></option>
                    <option value="1" <?if ($users[0]['status'] == 1) {
                           ?>selected<?
                        }?>><strong>Admin</strong></option></select>
                </div> <div class="form_group">


                <button type="submit" class="btn btn-default" style="margin-top: 5px;">Submit</button>
            </div>
        </form>





@endsection
