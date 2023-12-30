<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Cart List</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            <form action="{{ route('order') }}" method="post">
                                @csrf
                            @foreach ($cart as $cart)
                            <tr>
                                <td>
                                    <input type="hidden" name="foodname[]"value='{{ $cart->rel_to_food->title }}' >
                                    {{  $cart->rel_to_food->title }}
                                </td>
                                <td>
                                    <input type="hidden" name="price[]"value='{{ $cart->rel_to_food->price }}' >
                                    {{ $cart->rel_to_food->price }}
                                </td>
                                <td>
                                    <input type="hidden" name="quantity[]" value='{{ $cart->quantity }}' >
                                    {{ $cart->quantity }}
                                </td>
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 but" align='center'>
            <button class="btn btn-success btn1" type="button"  style="padding: 10px;">Order Now</button>
        </div>
        <div align='center' class="mt-3 text-center p" id="appear" style="display: none;">
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" id="name" >
            </div>
            <div class="mb-3">
                <label for="">Phone</label>
                <input type="text" name="phone" id="p" >
            </div>
            <div class="mb-3">
                <label for="">Address</label>
                <input type="text" name="address" id="address">
            </div>
            <div class="mx-auto mb-3 text-center">

                <input type="submit" class="text-center btn btn-primary" value="Order Confirm">
                <button class="btn btn-danger btn2 " type="button">Cancel</button>
            </div>
        </div>
    </form>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
      $(".btn1").click(function(){
        $("#appear").slideToggle();
      });
      $(".btn2").click(function(){
        $("#appear").hide();
      });

    });
    </script>
</body>
</html>
