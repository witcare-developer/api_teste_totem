import requests

f = open('imagem.jpg','wb')
url = 'http://niblle.kinghost.net/image/'
imagem = 'gallery1.jpg'
response = requests.get(url + imagem)
f.write(response.content)
f.close()

print("download successful")