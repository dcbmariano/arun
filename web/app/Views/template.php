<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pathogenic island</title>

  <link rel="shortcut icon" href="<?=base_url('/img/logo_v6.svg')?>">
  
  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?=base_url('/css/estilo.css')?>">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

  <script>
    // <!-- Variáveis importantes -->
    const frontend = "<?= base_url('/') ?>";  // endereço do front-end
    //const backend = "<?= '' #BACKEND_URL ?>";  // endereço do back-end
  </script>

</head>
<body>
  <header>

    <div class="container-fluid">
      <div class="row">
        
        <!-- logo -->
        <div class="col-auto pt-3">
          <a href="<?=base_url()?>" title="Home">
            <!-- <img src="<?=''//base_url('/img/')?>" style="max-width:200px"> -->

            <h3 class="mb-0">Genomic island</h3>
            <em class="small">Treponema pallidum</em></h3>

          </a>
        </div><!-- FIM logo -->
        
        <!-- buscar licitante -->
        <div class="col">
          
        </div><!-- FIM buscar licitante -->

      </div> <!-- FIM linha -->
    </div><!-- FIM container -->
  </header>

    <!-- loading -->
    <div class="progress mb-1" style="height:2px;">
        <div id="carrega-tabela" class="progress-bar" role="progressbar" style="width: 0%;"></div>
    </div><!-- FIM loading -->
  
  <main class="container-fluid my-3">
      <?= $this->renderSection('conteudo') ?> 
  </main>

  <footer>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>

    <script src="<?=base_url('/js/3dmol.js')?>"></script><!-- principal script -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script src="<?=base_url('/js/main.js')?>"></script><!-- principal script -->
    <!-- FIM Scripts -->
  </footer>
</body>
</html>