<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>

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
        <?php foreach($proteins as $protein): ?>
            <tr>
                <td><?=$protein['id']?></td>
                <td><?=$protein['gi']?></td>
                <td>
                    <a href="<?=base_url('/index.php/protein/'.$protein['protein_id'])?>">
                        <?=$protein['protein_id']?>
                    </a>
                </td>
                <td><?=$protein['location']?></td>
                <td><?=$protein['protein_name']?></td>
                <td><?=$protein['reference']?></td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
