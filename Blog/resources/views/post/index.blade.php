<!DOCTYPE html>

<html>

<head>

    <title>Laravel 6 Ajax CRUD tutorial using Datatable - ItSolutionStuff.com</title>

    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>
   <div class="container">
        <h3 class="text-primary"> Blog post Crud</h3>
        <form id="formData" name="formData">
           <input type="hidden" value="{{csrf_token()}}" name="token" id="token">
          <div class="form-group"> <label for="title">Title</label>
             <input class="form-control" name="title" id="title">
          </div>
          <div class="form-group"> <label for="detail">Detail</label>           
             <textarea id="detail" name="detail" class="form-control"></textarea>
          </div>          
             <input type="button" class="btn btn-primary" name="create" id="create" value="create">
          </div>

        </form>  
        <div class="alert alert-danger" id="ibibazo"></div> 
   </div>
</body>
<script>

$(document).ready(function(){
         $('#ibibazo').hide();         
        $.ajaxSetup({
        headers: {
            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              'X-CSRF-TOKEN': $('#token').val()
                }
        }); 
   
    $('#create').click(function(event){
     event.preventDefault();
      var formData = {
          title: $('#title').val(),
          detail: $('#detail').val()
      }          
     $.ajax({
         type:'POST',
         url:'/ajaxPosts',
         data: { title: formData.title, detail: formData.detail},                             
         success: function(data) {              
              if(data.errors){
                  $.each(data.errors, function(key, ikibazo) {
                  $('#ibibazo').show();
                  $('#ibibazo').append('<p>'+ikibazo+ '</p>');                  
                  });               
              } else {
                  $('#ibibazo').attr('class','alert alert-success');
                  $('#ibibazo').show();
                  $('#ibibazo').append('<p>'+data.byabaye+ '</p>');                 
              }              
                                        
             
         },
         error:function(xhr,result, errorMsg){
             console.log(errorMsg);
         }
     });
 });
});
</script>
</html>