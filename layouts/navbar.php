
<html>
<title>SiBank</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- TAILWIND -->
<script src="https://cdn.tailwindcss.com"></script>
    <!-- FONT AWESOME -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>

<body class="">

<!-- nav bar -->
<div class="d-flex bg-dark justify-content-between px-5 pt-2">

    <div class="my-2.5">
     <a href="homepage.php" class="text-end">
        <b class="text-2xl text-lime-300" >Si
            <span class="text-4xl bg-lime-500 text-white">Bank</span>
        </b>
     </a>
    </div>
    <div class="dropdown text-white my-2 h-4">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Operazioni
      </a>

      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="ricarica-tel.php">Ricarica Telefonica</a></li>
        <li><a class="dropdown-item" href="bonifico.php">Bonifici</a></li>
      </ul>
    </div>
    <div class="dropdown text-white my-2 h-4">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Ricerche avanzate
      </a>

      <ul class="dropdown-menu">
        <li><a href="ricerca.php">Ricerca per categoria</a></li>
        <li><a href="ricerca2.php">Ricerca per date</a> </li>
      </ul>
    </div>
    <div class="text-xl text-lime-300 my-2 h-4">
       <a href="login.php" class="text-end">
       <i class="fa-solid fa-right-from-bracket"></i>Logout
       </a>
    </div>
</div>

</div>
