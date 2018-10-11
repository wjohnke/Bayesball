import csv
import mysql.connector
from mysql.connector import errorcode
from sklearn.naive_bayes import GaussianNB
import numpy as np




def main():
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

    yearBreakdown_dataset = "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP FROM yearBreakdown;"
    m.execute(yearBreakdown_dataset)
    result = m.fetchall()
    
    fp = open("yearBreakdown.csv","w")
    myFile = csv.writer(fp)
    myFile.writerows(result)
    
    dataset = []
    with open("yearBreakdown.csv") as csvfile:
        reader = csv.reader(csvfile, quoting=csv.QUOTE_NONNUMERIC) # change contents to floats
        for row in reader: # each row is a list
            dataset.append(row) 
            
      
    yearBreakdown_dataset = "SELECT Outcome FROM yearBreakdown;"
    m.execute(yearBreakdown_dataset)
    result2 = m.fetchall()
    
    fp2 = open("yearBreakdown2.csv","w")
    myFile = csv.writer(fp2)
    myFile.writerows(result2)
    
    outcomeDataset = []
    with open("yearBreakdown2.csv") as csvfile:
        reader = csv.reader(csvfile, quoting=csv.QUOTE_NONNUMERIC) # change contents to floats
        for row in reader: # each row is a list
            outcomeDataset.append((row))    
        
    
    #bayseball = result
    
    #bayseball = result2
    #bayseball. = result3
    #gnb = GaussianNB()
    #y_pred = gnb.fit(result2, result3).predict(result2)
    #print("%d", y_pred)
    #print("Number of mislabeled points out of a total %d points : %d"
    #  % (result2,(result3 != y_pred).sum()))
    
    
main()
