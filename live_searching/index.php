<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Progress Buku </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Poppins&display=swap" rel="stylesheet">
    <style>
        @media screen and (max-width: 768px) {
            .container{
                width: 100%;
            height: auto; 
            }
        }
    .text-small{
        font-size: 12px;
    }
    .navbar{
        font-family: poppins;
        font-size: 16px;
    }
    .hero-section{
        margin-top: 20px;
}

    </style>
</head>
<body>
<div class="container" style="max-width:50%;">

<div class="text-center mt-5 mb-4">
        <h2>Cek Progress Buku</h2>
</div>

<input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Cari Judul ...">
    <p class="text-center text-danger text-small text-style" >jika tidak bisa mencari ketika sudah mengetik, silakan refresh halaman webnya kembali</p>

</div>


<!-- SEARCH RESULT -->
<div id="searchresult">

</div>
<!-- ENDSEARCH RESULT -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#live_search").keyup(function(){
            
            var input = $(this).val();
            
            if(input != ""){
                $.ajax({

                    url:"liversearch.php",
                    method:"POST",
                    data:{input:input},
                    success:function(data){
                        $("#searchresult").html(data);
                    }
                });

            }else{
                $("#searchresult").css("display");
            }
        });

    });

        
    

</script>
</body>
</html>