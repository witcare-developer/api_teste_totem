import json
import requests

# 
# 
# 
# 
# 
# 

# print("download successful")

url_json = 'http://niblle.kinghost.net/banco.php?path=produtos'
url_imagem = 'http://niblle.kinghost.net/image/'
diretorio = 'image/'
imagem = "logo.png"

response = requests.get(url_json)
array = response.content.decode('utf-8')
array = json.loads(array)

for dado in array:
    print(str(dado['id']))
    print(dado['nome_produto'])
    print(dado['valor_produto'])
    print(dado['link_imagem']+"\n")


# print(array[1]['link_imagem'])

# f = open( diretorio + imagem ,'wb')
# response = requests.get(url_imagem + imagem )
# f.write(response.content)
# f.close()