# coding: UTF-8
"""
Script: tempVilles/tempVille
Création: admin, le 15/01/2021
"""


# Imports
import requests
import mysql.connector
import time
# Fonctions
def get_temperature(ville):
    url="http://api.openweathermap.org/data/2.5/weather?q="+ville+",fr&units=metric&lang= fr&appid=0a73790ec47f53b9e1f2e33088a0f7d0"
    return float(requests.get(url).json()['main']['temp'])

def set_bdd(val_1, val_2):
    cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='bdd_temperaturevilles')
    cursor = cnx.cursor()
    update_val = ("UPDATE temperaturevilles SET temperature = (%s) WHERE ville = (%s)")
    data = (val_1, val_2)
    cursor.execute(update_val, data)
    cnx.commit()
    cursor.close()
    cnx.close()

# Programme principal
def main():
    listeVille = ["nivolas-vermelle", "grenoble", "meylan", "frontonas"]

    while True:
        for x in listeVille:
            set_bdd(get_temperature(x), x)
        time.sleep(300)

if __name__ == '__main__':
    main()
    # Fin
