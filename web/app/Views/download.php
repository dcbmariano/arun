<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>

<!-- linha -->
<div class="my-5">
    <h1 class="mb-4">Download</h1>

    <table class="table table-hover table-striped">

        <tr>
            <th>Description</th>
            <th>Format</th>
            <th>Lenght</th>
            <th>Download ZIP/text</th>
        </tr>
        <tr>
            <td>Sequences</td>
            <td>FASTA</td>
            <td>276 KB</td>
            <td><a href="<?=base_url('/data/download/fasta.zip')?>">Download</a></td>
        </tr>

        <tr>
            <td>3D structures (modeled by Alphafold)</td>
            <td>PDB</td>
            <td>26 MB</td>
            <td><a href="<?=base_url('/data/download/pdb.zip')?>">Download</a></td>
        </tr>

        <tr>
            <td>List of non-redundant proteins (separated by "<code>;</code>")</td>
            <td>CSV</td>
            <td>31 KB</td>
            <td><a href="<?=base_url('/data/download/proteins_list.csv')?>">Download</a></td>
        </tr>

    </table>
</div>

<?= $this->endSection() ?>
