import glob
import os

pastas = glob.glob('../validacoes/*')

os.system('mkdir pdb iddt pae coverage')

tam = len(pastas)
cont = 1
for pasta in pastas:
    nome = pasta.replace('../validacoes/','')
    nome = nome.replace('.','')

    print(nome, ':' , cont, '/', tam)
    cont += 1

    # pega o arquivo pdb
    try: 
        conteudo = glob.glob(pasta+'/*_model_1.pdb')
        os.system('cp '+conteudo[0]+' ./pdb/'+nome+'.pdb')

        # pega a IMAGEM de cobertura
        conteudo = glob.glob(pasta+'/*_coverage.png')
        os.system('cp '+conteudo[0]+' ./coverage/'+nome+'.png')

        # pega a IMAGEM de IDDT
        conteudo = glob.glob(pasta+'/*_plddt.png')
        os.system('cp '+conteudo[0]+' ./iddt/'+nome+'.png')

        # pega a IMAGEM de PAE
        conteudo = glob.glob(pasta+'/*_PAE.png')
        os.system('cp '+conteudo[0]+' ./pae/'+nome+'.png')
    except:
        print('Erro em: '+nome)



