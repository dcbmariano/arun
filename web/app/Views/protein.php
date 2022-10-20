<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>

<!-- linha -->
<div class="row">
  <!-- coluna de  -->
  <div class="col-12">
    
    
	<span class="badge bg-success" id=""><?=$id?></span>			
	
    <div class="row">
    
        <div class="col-9">
            <h1>
                <?=@$info[0]['protein_name']?>
                <a href="#summary" class="sub_menu" data-bs-toggle="modal" data-bs-target="#summary">
                    <i class="bi bi-file-text-fill" title="summary"></i>
                </a>
            </h1>
        </div>

        <div class="col-3">
            <div class="dropdown text-end">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Download
                </button>
                <ul class="dropdown-menu">
                    <li><a target="_blank" class="dropdown-item" href='<?=base_url("/data/fasta/$id.fasta")?>'>FASTA</a></li>
                    <li><a target="_blank" class="dropdown-item" href='<?=base_url("/data/modeller/$id_modeller.pdb")?>'>PDB model (Modeller)</a></li>
                    <li><a target="_blank" class="dropdown-item" href='<?=base_url("/data/alphafold/pdb/$id_aux.pdb")?>'>PDB model (Alphafold)</a></li>
                </ul>
            </div>
        </div>

        <!--MODAL summary -->
        <div style="color:#333" class="modal fade" id="summary" tabindex="-1" role="dialog" aria-labelledby="summary">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">						      	
                        <h3>Modeling details: <span class="name_organism"></span></h3>
                    </div>
        
                    <div id="summary_info">
                        <div class="modal-body">
                            <div id="coverage">
                                <img src="<?=base_url("/data/alphafold/coverage/$id_aux.png")?>" class="img-fluid">
                            </div>
                            <div id="iddt">
                                <img src="<?=base_url("/data/alphafold/iddt/$id_aux.png")?>" class="img-fluid">
                            </div>
                            <div id="pae">
                                <img src="<?=base_url("/data/alphafold/pae/$id_aux.png")?>" class="img-fluid">
                            </div>

                            <h5 class="mt-5 pb-2">Cite:</h5>
        
                            <div style="font-size: 12px;" class="text-muted">
                                <p>JUMPER, J. et al. Highly accurate protein structure prediction with AlphaFold. Nature, 2021. </p>
                                <p>MIRDITA, M. et al. Uniclust databases of clustered and deeply annotated protein sequences and alignments. Nucleic Acids Res., v. 45, n. D1, p. D170–D176, 2017. </p>
                                <p>MIRDITA, M. et al. ColabFold: Making Protein folding accessible to all. Nature Methods, 2022. </p>
                                <p>MIRDITA, M.; STEINEGGER, M.; S"ODING, J. MMseqs2 desktop and local web server app for fast, interactive sequence searches. Bioinformatics, v. 35, n. 16, p. 2856–2858, 2019.</p> 
                                <p>MITCHELL, A. L. et al. MGnify: the microbiome analysis resource in 2020. Nucleic Acids Res., 2019. </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary" aria-label="Close" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>						    
            </div>
        </div>
        <!-- FIM MODALS -->
    </div>
  </div>
</div>

<!-- linha -->
<div class="row">
  <!-- coluna de  -->
  <div class="col-8">

  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" onclick="readPDB('<?=$id_aux?>');">Alphafold</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" onclick="readPDB_MODELLER('<?=$id_aux?>');">Modeller</button>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

            <div id="pdb"></div>

        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div id="pdb2"></div>
        </div>
    </div>

    
  </div>

  <div class="col-4">
    <table>
        <tr>
            <td style="text-align:right; padding:12px 10px">
                <label class="badge bg-dark">Show as:</label>
            </td>
            <td>
                <button class="btn btn-success btn-sm" onclick="glviewer.setStyle({},{line:{}}); glviewer.render();">Lines</button>
                <button class="btn btn-success btn-sm" onclick="glviewer.setStyle({},{stick:{}}); glviewer.render();">Sticks</button>
                <button class="btn btn-success btn-sm" onclick="glviewer.setStyle({},{cartoon:{}}); glviewer.render();">Cartoon</button>
                <button class="btn btn-success btn-sm" onclick="glviewer.setStyle({},{sphere:{}}); glviewer.render();">Sphere</button>
            </td>
        </tr>
        <tr>
            <td style="text-align:right; padding:12px 10px">
                <label class="badge bg-dark" title="Surface opacity">Surface:</label>
            </td>
            <td>
                <button class="btn btn-light btn-sm" onclick="glviewer.removeAllSurfaces();">0%</button>
                <button class="btn btn-light btn-sm" onclick="glviewer.removeAllSurfaces();glviewer.addSurface($3Dmol.SurfaceType, {opacity:0.25});">25%</button>
                <button class="btn btn-light btn-sm" onclick="glviewer.removeAllSurfaces();glviewer.addSurface($3Dmol.SurfaceType, {opacity:0.50});">50%</button>
                <button class="btn btn-light btn-sm" onclick="glviewer.removeAllSurfaces();glviewer.addSurface($3Dmol.SurfaceType, {opacity:0.75});">75%</button>
                <button class="btn btn-light btn-sm" onclick="glviewer.removeAllSurfaces();glviewer.addSurface($3Dmol.SurfaceType, {opacity:1.00});">100%</button>
            </td>
        </tr>
        <tr>
            <td style="text-align:right; padding:12px 10px">
                <label class="badge bg-dark">Color:</label>
            </td>
            <td>
                <button class="btn btn-light btn-sm" onclick="colorGray(glviewer);">Gray</button>
                <button class="btn btn-light btn-sm" onclick="colorSpectrum(glviewer);">Spectrum</button>
                <button class="btn btn-light btn-sm" onclick="colorSS(glviewer);">SS</button>
            </td>
        </tr>
        <tr>
            <td style="text-align:right; padding:12px 10px">
                <label class="badge bg-dark">Select:</label>
            </td>
            <td>
                <div class="row" style="padding-top:5px" > 
                    <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" placeholder="ID" id="sID" class="form-control input-sm" onform/>
                        <button class="btn btn-success btn-sm" type="button" onclick="selectID(glviewer)">Go!</button>
                    </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

                <div class="row" style="padding-top:5px" > 
                    <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" placeholder="resn" id="sresn" class="form-control input-sm" />
                        <button class="btn btn-success btn-sm" type="button" onclick="selectResn(glviewer)">Go!</button>
                    </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

                <button style="margin-top:5px" class="btn btn-light btn-sm" onclick="selectGLU(glviewer);">Show all GLU</button>
                    
            </td>
        </tr>
        
    </table>

    <hr>
    <p><b>GI:</b> <label class="badge bg-warning"><?=@$info[0]['gi']?></label></p>
    <!-- <p>Protein ID: <?=@$info[0]['protein_id']?></p> -->
    <p><b>Location:</b> <?=@$info[0]['location']?></p>
    <p><b>Reference:</b> <?=@$info[0]['reference']?></p>
    <code id="seq" class="text-muted" style="font-size: 0.7em;"></code>

  </div>
</div>

<script>
    const id = '<?=str_replace('.', '', $id)?>';
</script>
<?= $this->endSection() ?>
