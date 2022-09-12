import os

# entrada
pasta = '../3_fasta'  # '.' = diretorio atual, '..' => anterior
extensoes = ['fasta'] # deixe em branco para todos

# lê arquivos na pasta
arquivos = os.listdir(pasta)
filtrado = []

# para cada arquivo na pasta
for i in arquivos:
	
	# se vazio, exibir todos
	if extensoes == []:
		print(i)
	
	else:
		extensao = i.split('.')[-1]
		if extensao in extensoes:
			filtrado.append(i)

tamanho = len(filtrado)
cont = 0
w = open('saida.tsv','a')
w.write('sequencia\treferencia\tidentidade\tcobertura\n')
for i in filtrado:
	os.system('echo "" > tmp.txt')
	cont+=1
	# if cont == 3:
	# 	exit()
	print(cont, '/', tamanho)

	formato = ' -outfmt="6 qseqid sseqid pident send sstart qlen" ' 
	comando = 'blastp -db ../2_download_todo_pdb/pdb.db -query ../3_fasta/'+i+formato
	comando += ' > tmp.txt ' #2>/dev/null'
	os.system(comando)
	
	with open('tmp.txt') as tmp:
		linhas = tmp.readlines()

		for linha in linhas:

			try:
				celulas = linha.strip().split('\t')
				qseqid=celulas[0]
				sseqid=celulas[1]
				identidade=int(float(celulas[2]))
				send=int(celulas[3])
				sstart=int(celulas[4])
				qlen=int(celulas[5])

				cobertura = int(100*(send - sstart)/qlen)

				w.write(qseqid + '\t' + sseqid + '\t' + str(identidade) + '\t' + str(cobertura) + '\n')
				continue
			except:
				ignorar = True




