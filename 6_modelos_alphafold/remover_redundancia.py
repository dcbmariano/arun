import glob
import os

pastas = glob.glob('./validacoes/*')

tam = len(pastas)
cont = 1
for pasta in pastas:
    nome = pasta.replace('../validacoes/','')
    nome = nome.replace('.','')

    print(nome, ':' , cont, '/', tam)
    cont += 1

    # pega o arquivo pdb
    try: 
        os.system('rm -rf '+pasta+'/*.json')
        
    except:
        print('Erro em: '+nome)


