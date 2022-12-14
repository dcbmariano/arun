<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Genomic island of Treponema pallidum database</title>

  <link rel="shortcut icon" href="<?=base_url('/img/favicon.png')?>">

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="<?=base_url('/css/buttons.datatables.min.css')?>">

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
  <header class="">
    <div class="container-fluid d-flex flex-wrap justify-content-center">
      <a href="<?=base_url()?>" title="Home" class="d-flex align-items-center mb-md-0 me-md-auto text-decoration-none">
        <img src="<?=base_url('/img/gitpdb_w.svg')?>" width="300">
      </a>

      <ul class="nav nav-pills pt-4">
      <li class="nav-item px-3"><a href="<?=base_url('/about')?>" class="nav-link link-light">About</a></li>
        <li class="nav-item px-3"><a href="<?=base_url()?>" class="nav-link link-light">Proteins</a></li>
        <li class="nav-item px-3"><a href="<?=base_url('/download')?>" class="nav-link link-light">Download</a></li>
      </ul>
    </div>
  </header>

    <!-- loading -->
    <div class="progress mb-1" style="height:2px;">
        <div id="carrega-tabela" class="progress-bar" role="progressbar" style="width: 0%;"></div>
    </div><!-- FIM loading -->
  
  <main class="container-fluid py-4">
    <?= $this->renderSection('conteudo') ?> 
  </main>

  <footer class="bg-dark py-4 mt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 text-start col-12">

          <div class="row">
            <div style="width: 100px;" class="me-2">
              <img src="<?=base_url('/img/lbs.svg')?>" class="opacity-50" style="width:100px">
            </div>
            <div class="col">
              <!-- descrição -->
              <h5 class="py-2"><strong>Laboratório de Bioinformática e Sistemas (LBS)</strong></h5>
              <p>
                <strong>Universidade Federal de Minas Gerais (UFMG), Brazil</strong><br>
                <span class="small">Av. Pres. Antônio Carlos, 6627 - Pampulha, Belo Horizonte - MG, 31270-901 | Instituto de Ciências Exatas (ICEx), Departamento de Ciência da Computação (DCC)</span> 
              </p>
              <p class="small">Anexo U, 4º andar, Sala: 4340 | +55 31 3409-5896 | bioinfo.dcc.ufmg[at]gmail.com</p>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-12 text-end">
          <a target="_blank" alt="UFMG" href="http://ufmg.br">
            <img src="<?=base_url('/img/ufmg_w.svg');?>" class="pt-4" width="250">
          </a>
        </div>

        <div class="col-md-3 col-12">
          <a target="_blank" alt="DCC" href="http://dcc.ufmg.br">
            <img src="<?=base_url('/img/dcc_w.svg');?>" class="p-4" width="250">
          </a>
        </div>
        
        
      </div>
    </div>
  </footer>

  <div id="pos_footer" class="text-center small text-dark py-1 px-4" style="position: relative; background: #a23737; font-size:0.6em">
    <b>©<?php echo date('Y'); ?> LBS</b> | Created by <a target="_blank" href="http://diegomariano.com" class="text-dark"><b>Diego Mariano</b></a> and
    <a target="_blank" href="http://dcc.ufmg.br/~pmartins" class="text-dark"><b>Pedro Martins</b></a> | Maintained by <a href="#" data-bs-toggle="modal" 
    data-bs-target="#lbs_team" class="text-dark"><b>LBS I.T. team</b></a>.
  </div>

  <!-- MODAL -->
  <div class="modal fade" tabindex="-1" id="lbs_team" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid
  den="true">&times;</span></button>
          <h4 class="modal-title"><strong>LBS I.T. Team</strong></h4>
        </div>
              
        <div class="modal-body">
          <p style="text-align:center; padding:20px"><img src="<?=base_url();?>app/img/logo3.svg"></
  p>
          <h1 style="text-align:center">LBS I.T. TEAM</h1>						
          <strong>Admin: </strong>Pedro Martins<br><br>

          <h4>LBS website</h4>
          <strong>Back-end: </strong>Pedro Martins<br>
          <strong>Front-end/design: </strong>Diego Mariano<br>
          <strong>Traducción (Español): </strong>Susana Medina<br>
          <strong>Translation (English): </strong><br>

        </div>
              
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>


    <script src="<?=base_url('/js/3dmol.js')?>"></script><!-- principal script -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="<?=base_url('/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?=base_url('/js/buttons.html5.min.js')?>"></script>
    <script src="<?=base_url('/js/buttons.print.min.js')?>"></script>
    <script src="<?=base_url('/js/jszip.min.js')?>"></script>
    <script src="<?=base_url('/js/pdfmake.min.js')?>"></script>
    <script src="<?=base_url('/js/vfs_fonts.js')?>"></script>



    <script src="<?=base_url('/js/main.js')?>"></script><!-- principal script -->
    <!-- FIM Scripts -->

</body>
</html>