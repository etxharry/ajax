<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"
        integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.slim.min.js"
        integrity="sha512-jxwTCbLJmXPnV277CvAjAcWAjURzpephk0f0nO2lwsvcoDMqBdy1rh1jEwWWTabX1+Grdmj9GFAgtN22zrV0KQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    <title>Ajax</title>
</head>

<body>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">

                <a href="{{ route('user.add') }}" class="btn btn-secondary">
                    Add
                </a>
                <br><br><br>
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">username</th>
                            <th scope="col">email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($add as $item)
                        <tr>

                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>

                                <a href="{{ route('user.edit',$item->id) }}" class="btn btn-secondary">
                                    Edit
                                </a>
                                <form id="deleteform" class="d-inline-block"
                                    action="{{ route('user.delete', $item->id ) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" id="delete">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
