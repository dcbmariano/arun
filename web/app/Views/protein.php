<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>

<!-- linha -->
<div class="row">
  <!-- coluna de  -->
  <div class="col-12">
    
    
	<span class="badge bg-success" id=""><?=$id?></span>			
	
    <h1>
        <?=@$info[0]['protein_name']?>
        <a href="#summary" class="sub_menu" data-bs-toggle="modal" data-bs-target="#summary">
            <i class="bi bi-file-text-fill" title="summary"></i>
        </a>

        <p style="color:#434857;font-size:12px; text-align:right" id="idModel"></p>

        <!--MODAL summary -->
        <div style="color:#333" class="modal fade" id="summary" tabindex="-1" role="dialog" aria-labelledby="summary">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">						      	
                        <h3>Summary: <span class="name_organism"></span></h3>
                    </div>
        
                    <div id="summary_info">
                        <div class="modal-body">
                            <!-- <iframe src="" id="summary_report" style="width:100%;height:500px"></iframe> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary" aria-label="Close" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>						    
            </div>
        </div>
        <!-- FIM MODALS -->
    </h1>
  </div>
</div>

<!-- linha -->
<div class="row">
  <!-- coluna de  -->
  <div class="col-8">
    <div id="pdb"></div>
  </div>

  <div class="col-4">
  <table>
        <tr>
            <!-- <p>ID: <?=@$info[0]['id']?></p> -->
            <!-- <p>Protein name: <?=@$info[0]['protein_name']?></p> -->
            <p><b>GI:</b> <label class="badge bg-warning"><?=@$info[0]['gi']?></label></p>
            <!-- <p>Protein ID: <?=@$info[0]['protein_id']?></p> -->
            <p><b>Location:</b> <?=@$info[0]['location']?></p>
            <p><b>Reference:</b> <?=@$info[0]['reference']?></p>
            <hr>
        </tr>
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
  </div>
</div>

<script>
    const id = '<?=str_replace('.', '', $id)?>';
</script>
<?= $this->endSection() ?>
