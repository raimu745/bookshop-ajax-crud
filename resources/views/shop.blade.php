<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center text-primary">Bookshop Crud with Ajax</h1>

    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <form action="{{url('store')}}" method="POST" id="form">
                    <div class="mb-3">
                        <label class="form-label">Online Shop</label>
                        <input type="text" class="form-control" placeholder="Online Shop" id="name" name="name">
                    </div>
                    <input type="hidden" id="id" value="" />
                    <div class="mb-3">
                        <label class="form-label">Your City</label>
                        <input type="text" class="form-control" placeholder="Your City" id="city" name="city">
                    </div>
                   <span id="ok"> <input type="submit" class="btn btn-primary"></span>

                </form>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <table class="table table-bordered border-primary" id="table">
                    <tr>
                        <th>#id</th>
                        <th>Online Shop</th>
                        <th>city</th>
                        <th>action</th>
                    </tr>
                    <tbody id="test">
                    </tbody>
                </table>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script>
 function shop(){

$.ajax({
  
    url : "{{url('show')}}",
    type : 'Get',
    dataType : 'Json',
     success : function (result){

        $('#test').html(result.fetch);
         
        //  console.log(result.fetch);
        // alert(result.shop);
    //     $.each(result.fetch, function(key, item) {
    //             $('tbody').append('<tr>\
    //             <td>' + item.id + '</td>\
    //             <td>' + item.name + '</td>\
    //             <td>' + item.city + '</td>\
                
    //             </tr>');
    //         });      
     }
     
});
}
        $(document).on('click','#update',function(e){
         e.preventDefault();
         var id = $('#id').val();
         var name = $('#name').val();
         var city = $('#city').val();
        //  alert(id);
        // alert(editid);

         $.ajax({
             url : "{{url('update')}}",
             type : 'POST',
             headers: {
                    'X-CSRF-TOKEN': "<?= Session::token() ?>"
                },
             data : {
                 id : id,
                 name : name,
                 city : city
             },
             dataType: 'Json',

             success : function(result){
                console.log(result.update);
                if(result.update){
                shop();
                }
                else{
                    alert('error');
                }
             }

         });
        

        });

        $(document).on('click','.edit',function(e){
            e.preventDefault();
            var editid = $(this).val();


            
            // alert(editid);
            $.ajax({
            
            url :  "{{url('edit')}}", 
            type : 'Get',
            headers: {
                    'X-CSRF-TOKEN': "<?= Session::token() ?>"
                },
            data : {
                id :  editid
            },
            dataType : 'Json',
            success: function (result){
                $('#name').val(result.edit['name']);
                $('#city').val(result.edit['city']);
                $('#id').val(result.edit['id']);
                $('#ok').html(`<input type="submit" value="update" id="update" class="btn btn-success"/>`);
            }    


            });
        })

        $(document).on('click','.delete',function(e){
            e.preventDefault();
            var shopid = $(this).val();
            $.ajax({
             url: "{{url('destroy')}}",
             type : 'Post',
             data :{
                 id  : shopid
             },
             headers: {
                    'X-CSRF-TOKEN': "<?= Session::token() ?>"
                },
            success : function(result){
                //  console.log(result.delete);
                 shop();
            }    
          

            });

        });

    
     shop();

      $('#form').submit(function(e){
          e.preventDefault();

          let name = $('#name').val();
          let city = $('#city').val();
        //   console.log(city);

        $.ajax({

            url : '{{url("store")}}',
            type : 'Post',
            headers: {
                    'X-CSRF-TOKEN': "<?= Session::token() ?>"
                },
            dataType: 'Json',
            data : {
                name  : name,
                city : city
            },
            success : function(result){
                // console.log(result.shop);
                if(result.success){
                    $('#form').trigger("reset");
                    shop();
                    
                }
                else{
                    alert('error');
                }
            }
        });

      });

  


    
        
    </script>

</body>

</html>