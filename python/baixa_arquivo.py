import requests

url = 'http://niblle.kinghost.net/image/'
diretorio = 'image/'
imagem = "logo.png"
f = open( diretorio + imagem ,'wb')
response = requests.get(url + imagem )
f.write(response.content)
f.close()

print("download successful")