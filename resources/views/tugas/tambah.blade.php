<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="form-group"> 
        <label class="col-sm-2 control-label">Buat Tugas</label>  
               
        @if ($errors->any())     
        <div class="alert alert-danger">         
         <ul>             
          @foreach ($errors->all() as $error)                 
             <li>{{ $error }}</li>            
          @endforeach         
         </ul>     
       </div>  
       @endif 

       <form action="/simpan" method="POST">
        @csrf
      <div class="col-sm-5">   
        <input type="text" name="nama_tugas">
     </div>
       <div class="col-sm-5">   
        </div>
         <div class="form-group row mb-0">
           <div class="col-md-8 offset-md-4">
             <button type="submit" class="btn btn-primary">
               tambah
             </button>
           </div>
         </div>
        </form>
       </div>
</body>
</html>