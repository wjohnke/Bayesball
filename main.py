import sys
import random
import math
import csv
from beautifultable import BeautifulTable
import mysql.connector
from mysql.connector import errorcode

#linear regression algorithm

#Connect to db
try:
    cnx = mysql.connector.connect(user='capstoneAdmin', password='12345678',
                                  host='ec2-52-6-86-207.compute-1.amazonaws.com',
                                  database='bayesball')

except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Something is wrong with your user name or password")
    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print("Database does not exist")
    else:
        print(err)

    
m = cnx.cursor()
#set first set of data to variable
bating_dataset = "SELECT * FROM Team_Bating;"
m.execute(bating_dataset)
result = m.fetchall()
#Write data to csv file
fp = open("BatingData.csv","w")
myFile = csv.writer(fp)
myFile.writerows(result)
fp.close()

games_dataset = "SELECT * FROM games;"

m.execute(games_dataset)
games_result = m.fetchall()


fp2 = open("GamesData.csv","w")
myFile = csv.writer(fp2)
myFile.writerows(games_result)
fp2.close()


print("Success")
    
    
    

cnx.close()