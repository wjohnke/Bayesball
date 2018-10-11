import csv
import mysql.connector
from mysql.connector import errorcode
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import time
from sklearn.model_selection import train_test_split
from sklearn.naive_bayes import GaussianNB, BernoulliNB, MultinomialNB




def main():
    data = pd.read_csv("yearBreakdown.csv")
    # Convert categorical variable to numeric
    #print(data.iloc[:,3])
    #data=data.iloc[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15].dropna(axis=1, how='any')
    #data=data.ix[1,2,3].dropna(axis=0, how='any')
    # Split dataset in training and test datasets
    X_train, X_test = train_test_split(data, test_size=0.33, random_state=int(time.time()))
    # Instantiate the classifier
    gnb = GaussianNB()
    used_features =[
          "Rdiff"
          ]
    
    gnb.fit(
    X_train[used_features].values,
    X_train[data.iloc[15]]
    )
    
    y_pred = gnb.predict(X_test[used_features])
    
    
    # Print results
    print("Number of mislabeled points out of a total {} points : {}, performance {:05.2f}%"
          .format(
              X_test.shape[0],
              (X_test[data.iloc[15]] != y_pred).sum(),
              100*(1-(X_test[data.iloc[15]] != y_pred).sum()/X_test.shape[0])
    ))
    
main()
