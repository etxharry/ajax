<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.slim.min.js" integrity="sha512-jxwTCbLJmXPnV277CvAjAcWAjURzpephk0f0nO2lwsvcoDMqBdy1rh1jEwWWTabX1+Grdmj9GFAgtN22zrV0KQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    <title>Ajax</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="{{ route('user.update',$add->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <br><br><br>
                        <div>
                            <label class="mb-2" for="username">Enter usename</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Name" value="{{$add->username}}">
                        </div>
                        <div>
                            <label class="mb-2" for="email">Enter Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{$add->email}}">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3" id="submit">
                            Update
                        </button>
                        <a href="/show" class="btn btn-secondary mt-3">
                            Show
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#submit').click(function(){
            $.ajax({
                url: 'update->id',
                data: $('form').serialize(),
                type: 'post',
                success: function(result){
                    alert(result);
                }
            });
           });
    </script>

</body>

</html>
