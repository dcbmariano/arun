<?php
 
namespace App\Controllers;
 
use App\Models\ProteinsModel;
use CodeIgniter\I18n\Time;
 
class Protein extends BaseController
{
    public function index($id){
        $pm = new ProteinsModel();
        $dados['id'] = $id;
        $dados['id_aux'] = substr($id, 0, -2).'1';
        $dados['id_modeller'] = substr($id, 0, -2);
        $dados['info'] = $pm->where('protein_id', $id)->find();

        return view('protein',$dados);
    }
    public function inserir(){
        $proteinsModel = new ProteinsModel();

        // $proteinsModel->save(
        //     [
        //         'gi'=>'teste', 'protein_id'=>'teste','location'=>'teste', 'protein_name'=>'teste', 'reference'=>'teste'
        //     ]
        // );

        dd($proteinsModel->findAll());

    }
    
    public function show(){
        // exibe todas as proteínas
        $proteinsModel = new ProteinsModel();
        dd($proteinsModel->findAll());
    }

    public function povoar_banco(){
        /* 
        *  Função responsável por povoar os dados do banco. 
        *  Lê o arquivo "proteins.tsv"
        *  Separador \t
        */
        return 0; 
        // conectando ao banco
        $proteinsModel = new ProteinsModel();
        $agora = new Time('now');

        // lendo arquivo CSV
        if (($arquivo = fopen("proteins.tsv", "r")) !== FALSE) {

            echo '<table border=1>'; // imprime uma tabela no HTML

            $id_linha = 1;
            // para cada linha do arquivo CSV
            while(($linha = fgetcsv($arquivo, 4096, "\t")) !== FALSE){

                // para cada coluna da linha
                for ($i=0; $i < count($linha); $i++) {

                    switch($i){
                        case 0: $gi = $linha[$i]; break;
                        case 1: $protein_id = $linha[$i]; break;
                        case 2: $location = $linha[$i]; break;
                        case 3: $protein_name = $linha[$i]; break;
                        case 4: $reference = $linha[$i]; break;
                    }
                }

                // grava dados no banco
                if($id_linha != 1){
                    $proteinsModel->save([
                        'gi'=>$gi,
                        'protein_id'=>$protein_id,
                        'location'=>$location,
                        'protein_name'=>$protein_name,
                        'reference'=>$reference,
                        'created_at'=>$agora,
                        'updated_at'=>$agora
                    ]);
                }
                $id_linha++;

            }

            fclose($arquivo); // fecha o arquivo
        }
        
        d($proteinsModel->findAll()); // imprime dados na tela

        echo "Para limpar a base de dados, execute: ";
        echo "php spark migrate:refresh";
    }
}

