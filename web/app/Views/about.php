<?= $this->extend('template') ?>
<?= $this->section('conteudo') ?>

<!-- linha -->
<div class="my-5 container text-muted">
    <h1 class="mb-4">About GITPdb</h1>

    <p>
        <strong>GITPdb</strong> is a database of modeled 3D structures of proteins of the genome of <em>Treponema pallidum</em>. <em>Treponema pallidum</em> (Tp) is a bacteria, which causes diseases such as syphilis. 
    </p>
    <p>
        GITPdb includes a set of models of three-dimensional structures of proteins extracted from genomic islands of Treponema pallidum. Modeling was performed using two methodologies: (1) comparative modeling using <a href="https://salilab.org/modeller/" target="_blank">Modeller</a>; and (2) modeling <em>de novo</em> using Alphafold (<a href="https://colab.research.google.com/github/sokrypton/ColabFold/blob/main/AlphaFold2.ipynb" target="_blank">Colabfold</a>). Both Modeller and Alphafold were executed using default parameters. For Modeller, templates were selected using BLAST web interface (we selected the sequence with higher identity). Details about modeling results can be found in each model's page.
    </p>

    <p>
    "<strong>Genomic islands (GIs)</strong> are gene clusters, usually >8 kb in size, likely acquired via horizontal gene transfers (HGT), and often playing a role in the environmental or host adaptation of bacteria" (Jaiswal et al., 2017). </p>
    
    <p>These genes are often flanked by transposases (insertion elements), have altered G + C content.

    Pathogenicity islands (PAIs) present high concentrations of virulence factors. Virulence is the characteristic of a pathogen responsible for causing severe human diseases. 

    </p>
    <p class="text-center">
        <img src="<?=base_url('/img/gi.png')?>">
            <br>
        <code class="small">Kumar Jaiswal A, Tiwari S, Jamal SB, Barh D, Azevedo V, Soares SC. An In Silico Identification of Common Putative Vaccine Candidates against Treponema pallidum: A Reverse Vaccinology and Subtractive Genomics Based Approach. Int J Mol Sci. 2017 Feb 14;18(2):402. doi: 10.3390/ijms18020402. PMID: 28216574; PMCID: PMC5343936.</code>
    </p>

    <p class="mt-4">
        GITPdb interface presents 482 non-redundant proteins extracted from 12 genomic islands (four pathogenicity islands) of three genomes of <em>Treponema pallidum</em> strains: Nichols, SamoaD, and BosniaD. From these proteins, 173 were classified as hypothetical proteins; hence, they are potential targets for more analyses. Additionally, GITPdb interface presents interactive visualizations for each modelled structure performed by <a href="https://3dmol.csb.pitt.edu/" target="_blank">3Dmol.js</a>.
        
        <img src="<?=base_url('/img/viz.jpg')?>" class="img-fluid px-5">
    </p>


</div>

<?= $this->endSection() ?>
