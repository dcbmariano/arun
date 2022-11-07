<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>

<div class="container-fluid">
  <!-- linha -->
  <div class="row">
    <!-- coluna de  -->
    <div class="row g-2 mb-4">
      <!-- coluna 2, linha 2 -->
      <div class="col-6 col-md-3">
        <div class="card btn btn-outline-secondary p-0 text-start">
          <div class="card-body ">
            <h6 class="card-subtitle mb-3 small">Genes/Proteins (non-redundant)
              <a href="#" class="card-link" data-bs-toggle="tooltip" title="482 non-redundant proteins. The table below can present redundant proteins ID."><i class="bi bi-question-circle-fill text-secondary" style="text-shadow: 0px 0px 5px #FFF;"></i></a>
            </h6>
            <div class="d-flex align-items-end justify-content-between mt-2">
              <div>
                <h5 class="card-title" id="total_licitacoes">482
                  <!-- <div class="spinner-grow  spinner-grow-sm text-secondary" role="status"><span class="visually-hidden">3</span></div> -->
                </h5>
              </div>
              <div>
                <h5><i class="bi bi-file-earmark-text bg-secondary rounded p-2 text-light"></i></h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card btn btn-outline-secondary p-0 text-start">
          <div class="card-body">
            <h6 class="card-subtitle mb-3 small">Hypothetical proteins
              <a href="#" class="card-link" data-bs-toggle="tooltip" title="173 non-redundant. Total: 282 hypothetical proteins (redundant)"><i class="bi bi-question-circle-fill text-secondary" style="text-shadow: 0px 0px 5px #FFF;"></i></a>
            </h6>
            <div class="d-flex align-items-end justify-content-between mt-2">
              <div>
                <h5 class="card-title" id="licitacoes_com_alertas">173
                  <!-- <div class="spinner-grow  spinner-grow-sm text-secondary" role="status"><span class="visually-hidden">3</span></div> -->
                </h5>
              </div>
              <div>
                <h5><i class="bi bi-file-earmark-x bg-secondary text-light rounded p-2"></i></h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card btn btn-outline-secondary p-0 text-start">
          <div class="card-body">
            <h6 class="card-subtitle mb-3 small">Genomic islands
              <a href="#" class="card-link" data-bs-toggle="tooltip" aria-label="" title="8 GENOMIC ISLAND + 4 PATHOGENICITY ISLAND"><i class="bi bi-question-circle-fill text-secondary" style="text-shadow: 0px 0px 5px #FFF;"></i></a>
            </h6>
            <div class="d-flex align-items-end justify-content-between mt-2">

              <div>
                <h5 class="card-title" id="total_alertas">12
                  <!-- <div class="spinner-grow spinner-grow-sm text-secondary" role="status"><span class="visually-hidden"></span></div> -->
                </h5>
              </div>
              <div>
                <h5><i class="bi bi-exclamation-circle bg-secondary text-light rounded p-2"></i></h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card btn btn-outline-secondary p-0 text-start">
          <div class="card-body">
            <h6 class="card-subtitle mb-3 small">Genomes
              <a href="#" class="card-link" data-bs-toggle="tooltip" title="Three genomes of Treponema pallidum strains: Nichols, SamoaD, and BosniaD"><i class="bi bi-question-circle-fill text-secondary" style="text-shadow: 0px 0px 5px #FFF;"></i></a>
            </h6>
            <div class="d-flex align-items-end justify-content-between mt-2">

              <div>
                <h5 class="card-title" id="media">3
                  <!-- <div class="spinner-grow  spinner-grow-sm text-secondary" role="status"><span class="visually-hidden"></span></div> -->
                </h5>
              </div>

              <div>
                <h5><i class="bi bi-bar-chart bg-secondary text-light rounded p-2"></i></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- linha -->
<div class="row">
  <!-- coluna de  -->
  <div class="col-12">
    <table class="table table-hover small table-striped" id="protein_table">
      <thead>
        <tr>
          <th>ID</th>
          <th>GI</th>
          <th>Protein ID</th>
          <th>Location</th>
          <th>Protein name</th>
          <th>Reference</th>
        </tr>
      </thead>
      <?php foreach ($proteins as $protein) : ?>
        <tr>
          <td><?= $protein['id'] ?></td>
          <td><?= $protein['gi'] ?></td>
          <td>
            <a href="<?= base_url('/index.php/protein/' . $protein['protein_id']) ?>">
              <?= $protein['protein_id'] ?>
            </a>
          </td>
          <td><?= $protein['location'] ?></td>
          <td><?= $protein['protein_name'] ?></td>
          <td><?= $protein['reference'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>

<?= $this->endSection() ?>