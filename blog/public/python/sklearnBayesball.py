#!/usr/bin/env python

import csv
import mysql.connector
from mysql.connector import errorcode
import pandas as pd
import numpy as np
import time
from sklearn.model_selection import train_test_split
#Naive Bayes
from sklearn.naive_bayes import GaussianNB
#Support Vector Machine
from sklearn import svm
#import matplotlib.pyplot as plt
#Linear Regression
from sklearn.linear_model import LinearRegression
from sklearn.linear_model import LogisticRegression
from sklearn.tree import DecisionTreeClassifier as DTC
#import tensorflow as tf
#from tensorflow.keras import layers
import random
import sys
import json


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
    game_data = None

    team1=""
    team2=""
    
    #***********************************************
    #Hypothetical Order of Arguments ***************
    #param1 -> file
    #param2 -> Team1:String
    #param3 -> Team2:String   ---------------> Argv>=3 -> Run Prediction for 2 teams
    #param4 -> PlayerDataIncluded:Boolean ---> Argv>=4 -> Run Prediction w/ PLayer Data
    #param5 -> DateInclude:Date -------------> Argv==5 -> Run Prediction w/ Specific Date
    #***********************************************
    
    game_data=None
    with_players = False
    result = None
    if(len(sys.argv)>=3):
        #The next chain of logic predicts a single game's outcome
        #Away is first parameter, home is second parameter
        home_team=sys.argv[2]
        away_team=sys.argv[1]
        if(len(sys.argv)>=4 and sys.argv[3]=="1"):
            with_players = True
            #Get prediction including player data
            if(len(sys.argv)>=5):
                #Try and get past game by game date, home team vs away team.
                #Called Most Often
                game_date = sys.argv[4]
                m.callproc('getPlayerWithDate', (home_team, away_team, game_date))
                for temp in m.stored_results():
                    result = temp.fetchall()
                if not result:
                    print("Invalid Game Date")
                    sys.exit()
                game_data = getPDPlayerWithDate(result)
            else:
                #predicted_home_game_query = GetPlayerGameDataWithoutDateHomeTeam(team1)
                #predicted_opponent_game_query = GetPlayerGameDataWithoutDateOpponentTeam(team2)
                
               # m.execute(predicted_home_game_query)
                m.callproc('getPlayerHomeTeam', (home_team,))
                for temp in m.stored_results():
                    predicted_home_game_dataset = temp.fetchall()
                m.callproc('getPlayerOpponentTeam',(away_team,))
                for temp in m.stored_results():
                    predicted_opponent_game_dataset = temp.fetchall()
                game_data = getPDPlayerWithoutDate(predicted_home_game_dataset,predicted_opponent_game_dataset)
        else:
            #Just game prediction with no player data
            #predicted_home_game_query = GetGameDataHomeTeam(team1)
            #predicted_opponent_game_query = GetGameDataOpponentTeam(team2)
            
            #m.execute(predicted_home_game_query)
            m.callproc('getGameHomeTeam', (home_team,))
            for temp in m.stored_results():
                predicted_home_game_dataset = temp.fetchall()
            #m.execute(predicted_opponent_game_query)
            m.callproc('getGameOpponentTeam', (away_team,))
            for temp in m.stored_results():
                predicted_opponent_game_dataset = temp.fetchall()
            game_data = getPDGame(predicted_home_game_dataset, predicted_opponent_game_dataset)
    
    
    #yearBreakdownWithPlayerStats_dataset = "SELECT id,Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP, pos_4_TB,  opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, opponent_pos_1_age, opponent_pos_1_R, opponent_pos_1_H, opponent_pos_1_RBI, opponent_pos_1_BB, opponent_pos_1_OPSP, opponent_pos_1_TB, opponent_pos_2_age, opponent_pos_2_R, opponent_pos_2_H, opponent_pos_2_RBI, opponent_pos_2_BB, opponent_pos_2_OPSP, opponent_pos_2_TB, opponent_pos_3_age, opponent_pos_3_R, opponent_pos_3_H, opponent_pos_3_RBI, opponent_pos_3_BB, opponent_pos_3_OPSP, opponent_pos_3_TB, opponent_pos_4_age, opponent_pos_4_R, opponent_pos_4_H, opponent_pos_4_RBI, opponent_pos_4_BB, opponent_pos_4_OPSP, opponent_pos_4_TB,  Outcome FROM yearBreakdownWithPlayerStats;"
    #yearBreakdown_dataset = GetModelData(with_players)     
    #m.execute(yearBreakdown_dataset)
    if(with_players):
        m.callproc('getModelWithPlayers')
    else:
        m.callproc('getModelWithoutPlayers')


    for temp in m.stored_results():
        result= temp.fetchall()
    
        
    data = getPDModel(result, with_players)
    used_features = GetFeatures(with_players)
    used_features.remove('id')
    used_features.remove('Outcome')
    
    #Testing removing team based features
    
    #Do further feature selection here -> used_features.remove('___')
    #                                  -> del used_features[index]
    #****************************************************************
    
    #Removing team stats to weight changing player stats more heavily
    #used_features.remove('R_G')
    #used_features.remove('R')
    #used_features.remove('OBP')
    #used_features.remove('RBI')
    #used_features.remove('RA')
    #used_features.remove('ERA')
    #used_features.remove('SV')
    #used_features.remove('HA')
    #used_features.remove('ER')
    
    naive = runNaiveBayes(data, game_data, used_features)
    logR = runLogisticRegression(data, game_data, used_features)
    svc = runSVM(data,game_data,used_features)
    dec = runDecisionTree(data, game_data, used_features)
    results =[]
    results.append(naive)
    results.append(logR)
    results.append(svc)
    results.append(dec)
    maximum = max(json.dumps(naive),json.dumps(logR),json.dumps(svc),json.dumps(dec))
    results.append(eval(maximum))
    print(json.dumps(results))
    
    #runNeuralNetwork(data, game_data, used_features)
    

def runNaiveBayes(data, game_data, used_features):
    #print("Running Naive Bayes on Dataset<br>")
    
    #Establish what features are to be used, based off of player inclusion
    #Features either include players or they don't
    #No in between. Base Model to make prediction must have the exact
    #same features as prediction data model
    
    X_train, X_test = train_test_split(data, test_size=0.33, random_state=int(time.time()))
    gnb = GaussianNB()
    gnb.fit(
            X_train[used_features].values,
            X_train["Outcome"]
    )
    y_pred = gnb.predict(X_test[used_features])
    
    game_prediction=[]
    if(game_data is not None):
        game_prediction = gnb.predict(game_data[used_features])
    
    total_tested = X_test.shape[0]
    total_correct = (X_test["Outcome"] == y_pred).sum()
    accuracy = 100*float((float(total_correct)/float(total_tested) )) 
    
    jsonVal = {'Percentage': accuracy,'Prediction':str(int(not game_prediction[0]))}
    #print(json.dumps(jsonVal))
    return(jsonVal)
    
    
def runLogisticRegression(data, game_data, used_features):
    #print("Running Logistic Regression on Dataset<br>")  
    #Solver = Limited Memory BFGS - optimizes problem of mismatched # of features in Hessian matrix
    logR = LogisticRegression(max_iter=15000, random_state=0, solver='lbfgs',multi_class="ovr",class_weight={1:1.082, 0:0.918})
    
    #Edit LogisticRegression() to have class weights attached to features
    X_train, X_test = train_test_split(data, test_size=0.33, random_state=int(time.time()))
    
    logR.fit(X_train[used_features].values, X_train["Outcome"])
    #print(logR.coef_[0])
    prediction = logR.predict(X_test[used_features])
    game_prediction = []
    if(game_data is not None):
        game_prediction = logR.predict(game_data[used_features])
    
    total_tested = prediction.size
    total_correct = (X_test["Outcome"] == prediction).sum()
    accuracy = 100*float((float(total_correct)/float(total_tested) ))

    jsonVal = {'Percentage': accuracy, 'Prediction': str(int(not game_prediction[0]))}
    #print(json.dumps(jsonVal))
    return(jsonVal)
    
    
def runSVM(data, game_data, used_features):
    vector = svm.SVC(class_weight={1:1.082, 0:0.918}, gamma='scale', kernel='rbf', max_iter = 15000)
    X_train, X_test = train_test_split(data, test_size=0.33, random_state=int(time.time()))
    
    vector.fit(
            X_train[used_features].values,
            X_train['Outcome']
            )
    prediction = vector.predict(X_test[used_features])
    
    game_prediction=[]
    if(game_data is not None):
        game_prediction = vector.predict(game_data[used_features])
    
    total_tested = prediction.size
    total_correct = (X_test["Outcome"] == prediction).sum()
    accuracy = 100*float((float(total_correct)/float(total_tested) ))
    
    jsonVal = {'Percentage': accuracy, 'Prediction': str(game_prediction[0])}
    #print(json.dumps(jsonVal))
    return ((jsonVal))

def runDecisionTree(data, game_data, used_features):
    dec_tree = DTC(random_state=0, class_weight={1:1.082,0:0.918})
    X_train, X_test = train_test_split(data, test_size=0.33, random_state=int(time.time()))
    dec_tree.fit(X_train[used_features].values,
                 X_train["Outcome"])

    
    prediction = dec_tree.predict(X_test[used_features])
    
    game_prediction=[]
    if(game_data is not None):
        game_prediction = dec_tree.predict(game_data[used_features])
        #print(dec_tree.decision_path(game_data[used_features]))

    total_tested = prediction.size
    total_correct = (X_test["Outcome"] == prediction).sum()
    accuracy = 100*float((float(total_correct)/float(total_tested) ))
    
    jsonVal = {'Percentage': accuracy, 'Prediction': str(game_prediction[0])}
    #print((json.dumps(jsonVal)))
    return ((jsonVal))


#Currently Unused
def runNeuralNetwork(data, game_data, used_features):
    X_train, X_test = train_test_split(data, test_size=0.33, random_state=int(time.time()))
    
    model = tf.keras.Sequential([
            layers.Dense(64, activation=tf.sigmoid),
            layers.Dense(64, activation=tf.sigmoid),
            layers.Dense(10, activation='softmax')
            ])
    
    model.compile(optimizer=tf.train.GradientDescentOptimizer(0.01),
                  loss = tf.keras.losses.binary_crossentropy,
                  metrics=[tf.keras.metrics.binary_accuracy]
                  )
    model.fit(X_train[used_features].values, 
              X_train["Outcome"].values, 
              epochs=10, 
              batch_size = 32 
              #validation_data = (X_test[used_features].values, X_test["Outcome"])
              )
    
    
    
    
def optimizeFeatures(used_features):
    max_percentage=0
    best_used_features=[]
    copy_of_used_features = used_features.copy()
    
    for i in range(0,50):
        k = 0
        for j in reversed(used_features):
            k+=1
            n = random.randint(1,5)
            if(k%n==0):
                #used_features.remove(j)
                continue
        percentage = runLogisticRegression(data, game_data, used_features)
        if percentage>max_percentage:
            max_percentage=percentage
            best_used_features = used_features
        used_features = copy_of_used_features.copy()
        print(str(percentage))
    
    print("Max percentage reached:" + str(max_percentage))
    print("Best used features")
    print(best_used_features)
    
def randomPredictor(data):
    randomArray = []
    for i in range(data.size):
        randomArray.append(random.randint(0,1))
    
    print(randomArray)
    print("\nNumber correct of random algorithm: {:05.2f}%".format((100*(randomArray == data["Outcome"].values).sum())/randomArray.size) )

def runLinearRegression(data):
    
    plt.scatter(data.Rdiff, data.Outcome)
    plt.xlabel("Rdiff")
    plt.ylabel("Outcome")
    plt.show()
    
    
    print("Running Linear Regressions on Dataset\n")
    used_features = [
            "Rdiff",
            "SRS",
            "R_G",
            "R",
            "RBI",
            "OBP",
            "OPSP",
            "RA",
            "ERA",
            "SV",
            "HA",
            "ER",
            "ERAP",
            "WHIP",
            'opponent_Rdiff', 
            'opponent_SRS' ,
            'opponent_R_G' ,
            'opponent_R' ,
            'opponent_RBI', 
            'opponent_OBP' ,
            'opponent_OPSP' ,
            'opponent_RA',
            'opponent_ERA' ,
            'opponent_SV' ,
            'opponent_HA', 
            'opponent_ER', 
            'opponent_ERAP',
            'opponent_WHIP'
    ]
    
    F_train, F_test, C_train, C_test = train_test_split(data[used_features], data["Outcome"], test_size=0.33, random_state=int(time.time()))
    
    
    model = LinearRegression()
    model.fit(
            F_train,
            C_train
            )
    print(model.score(F_test, C_test))
    train_pred = model.predict(F_train)
    test_pred = model.predict(F_test)
    
    print("Results train: {:05.2f}".format((np.mean( (C_train - train_pred) **2) *100) ) ) 
    print("\n")
    print(F_train.shape)
    print(F_test.shape)
    print(C_train.shape)
    print(C_test.shape)
    
    #plt.scatter(model.predict(F_train), model.predict(F_train) - C_train, c='red', s=40, alpha=0.5)
    #plt.scatter(model.predict(F_train), (model.predict(F_test)) - C_test, c='green', s=40)
    
    #plt.scatter(model.predict(F_train), model.predict(F_train) - C_train, c='red', s=30, alpha=0.5)
    #plt.scatter((model.predict(F_train)[:,0]), model.predict(F_test) - C_test, c='green')
    #plt.scatter(C_test, model.predict(F_test))
    #plt.hlines(y=0, xmin=0,xmax=5)
    #plt.title("Training = Blue, Test - Green")
    #plt.ylabel('Residuals')
        
#*****************************************************************
#*********Queries and Functions for Building Pandas Dataframe*****
#*****************************************************************

def GetFeaturesHome(with_players):
    if(with_players):
        return ['id','Rdiff','SRS','R_G','R','RBI','OBP','OPSP','RA','ERA','SV','HA','ER','ERAP','WHIP', 'pos_1_age', 'pos_1_R', 'pos_1_H', 'pos_1_RBI', 'pos_1_BB', 'pos_1_OPSP', 'pos_1_TB', 'pos_2_age', 'pos_2_R', 'pos_2_H', 'pos_2_RBI', 'pos_2_BB', 'pos_2_OPSP', 'pos_2_TB', 'pos_3_age', 'pos_3_R', 'pos_3_H', 'pos_3_RBI', 'pos_3_BB', 'pos_3_OPSP', 'pos_3_TB', 'pos_4_age', 'pos_4_R', 'pos_4_H', 'pos_4_RBI', 'pos_4_BB', 'pos_4_OPSP', 'pos_4_TB','starting_pitcher_age','starting_pitcher_W_L_Percentage','starting_pitcher_ERA','starting_pitcher_IP','starting_pitcher_ER','starting_pitcher_SO','starting_pitcher_ERAP','starting_pitcher_FIP','starting_pitcher_WHIP','starting_pitcher_HR9','starting_pitcher_BB9','starting_pitcher_SO9']
    else:
        return ['id','Rdiff','SRS','R_G','R','RBI','OBP','OPSP','RA','ERA','SV','HA','ER','ERAP','WHIP']

def GetFeaturesOpponent(with_players):
    if(with_players):
        return ['opponent_id','opponent_Rdiff', 'opponent_SRS' ,'opponent_R_G' ,'opponent_R' ,'opponent_RBI', 'opponent_OBP' ,'opponent_OPSP' ,'opponent_RA','opponent_ERA' ,'opponent_SV' ,'opponent_HA', 'opponent_ER', 'opponent_ERAP','opponent_WHIP', 'opponent_pos_1_age', 'opponent_pos_1_R', 'opponent_pos_1_H', 'opponent_pos_1_RBI', 'opponent_pos_1_BB', 'opponent_pos_1_OPSP', 'opponent_pos_1_TB', 'opponent_pos_2_age', 'opponent_pos_2_R', 'opponent_pos_2_H', 'opponent_pos_2_RBI', 'opponent_pos_2_BB', 'opponent_pos_2_OPSP', 'opponent_pos_2_TB', 'opponent_pos_3_age', 'opponent_pos_3_R', 'opponent_pos_3_H', 'opponent_pos_3_RBI', 'opponent_pos_3_BB', 'opponent_pos_3_OPSP', 'opponent_pos_3_TB', 'opponent_pos_4_age', 'opponent_pos_4_R', 'opponent_pos_4_H', 'opponent_pos_4_RBI', 'opponent_pos_4_BB', 'opponent_pos_4_OPSP', 'opponent_pos_4_TB','opponent_starting_pitcher_age','opponent_starting_pitcher_W_L_Percentage','opponent_starting_pitcher_ERA','opponent_starting_pitcher_IP','opponent_starting_pitcher_ER','opponent_starting_pitcher_SO','opponent_starting_pitcher_ERAP','opponent_starting_pitcher_FIP','opponent_starting_pitcher_WHIP','opponent_starting_pitcher_HR9','opponent_starting_pitcher_BB9','opponent_starting_pitcher_SO9', 'Outcome']
    else:
        return ['opponent_id','opponent_Rdiff','opponent_SRS','opponent_R_G','opponent_R','opponent_RBI','opponent_OBP','opponent_OPSP','opponent_RA','opponent_ERA','opponent_SV','opponent_HA','opponent_ER','opponent_ERAP','opponent_WHIP', 'Outcome']
    
def GetFeatures(with_players):
    if(with_players):
        return [
            "id",
            "Rdiff",
            "SRS",
            "R_G",
            "R",
            "RBI",
            "OBP",
            "OPSP",
            "RA",
            "ERA",
            "SV",
            "HA",
            "ER",
            "ERAP",
            "WHIP",
            "pos_1_age",
            "pos_1_R",
            "pos_1_H",
            "pos_1_RBI",
            "pos_1_BB",
            "pos_1_OPSP",
            "pos_1_TB",
            "pos_2_age", 
            "pos_2_R", 
            "pos_2_H", 
            "pos_2_RBI",
            "pos_2_BB", 
            "pos_2_OPSP",
            "pos_2_TB",
            "pos_3_age",
            "pos_3_R",
            "pos_3_H",
            "pos_3_RBI",
            "pos_3_BB",
            "pos_3_OPSP",
            "pos_3_TB", 
            "pos_4_age", 
            "pos_4_R", 
            "pos_4_H",
            "pos_4_RBI",
            "pos_4_BB",
            "pos_4_OPSP",
            "pos_4_TB",
            'starting_pitcher_age',
            'starting_pitcher_W_L_Percentage',
            'starting_pitcher_ERA',
            'starting_pitcher_IP',
            'starting_pitcher_ER',
            'starting_pitcher_SO',
            'starting_pitcher_ERAP',
            'starting_pitcher_FIP',
            'starting_pitcher_WHIP',
            'starting_pitcher_HR9',
            'starting_pitcher_BB9',
            'starting_pitcher_SO9',
            "opponent_Rdiff", 
            'opponent_SRS' ,
            'opponent_R_G' ,
            'opponent_R' ,
            'opponent_RBI',
            'opponent_OBP' ,
            'opponent_OPSP' ,
            'opponent_RA',
            'opponent_ERA' ,
            'opponent_SV' ,
            'opponent_HA', 
            'opponent_ER', 
            'opponent_ERAP',
            'opponent_WHIP',
            'opponent_pos_1_age', 
            'opponent_pos_1_R', 
            'opponent_pos_1_H',
            'opponent_pos_1_RBI', 
            'opponent_pos_1_BB',
            'opponent_pos_1_OPSP', 
            'opponent_pos_1_TB', 
            'opponent_pos_2_age', 
            'opponent_pos_2_R', 
            'opponent_pos_2_H', 
            'opponent_pos_2_RBI', 
            'opponent_pos_2_BB', 
            'opponent_pos_2_OPSP', 
            'opponent_pos_2_TB', 
            'opponent_pos_3_age',
            'opponent_pos_3_R',
            'opponent_pos_3_H',
            'opponent_pos_3_RBI', 
            'opponent_pos_3_BB', 
            'opponent_pos_3_OPSP', 
            'opponent_pos_3_TB', 
            'opponent_pos_4_age', 
            'opponent_pos_4_R', 
            'opponent_pos_4_H',
            'opponent_pos_4_RBI', 
            'opponent_pos_4_BB', 
            'opponent_pos_4_OPSP', 
            'opponent_pos_4_TB',
            'opponent_starting_pitcher_age',
            'opponent_starting_pitcher_W_L_Percentage',
            'opponent_starting_pitcher_ERA',
            'opponent_starting_pitcher_IP',
            'opponent_starting_pitcher_ER',
            'opponent_starting_pitcher_SO',
            'opponent_starting_pitcher_ERAP',
            'opponent_starting_pitcher_FIP',
            'opponent_starting_pitcher_WHIP',
            'opponent_starting_pitcher_HR9',
            'opponent_starting_pitcher_BB9',
            'opponent_starting_pitcher_SO9',   
            'Outcome'
              ]
    else:
        return ["id","Rdiff","SRS","R_G","R","RBI","OBP","OPSP","RA","ERA","SV","HA","ER","ERAP","WHIP",'opponent_Rdiff', 'opponent_SRS' ,'opponent_R_G' ,'opponent_R' ,'opponent_RBI', 'opponent_OBP' ,'opponent_OPSP' ,'opponent_RA','opponent_ERA' ,'opponent_SV' ,'opponent_HA', 'opponent_ER', 'opponent_ERAP','opponent_WHIP',"Outcome"]

def getPDModel(result, with_players):
    #All encompassing pandas dataframe. Called regardless
    with open("yearBreakdown.csv","w") as fp:
        myFile = csv.writer(fp, lineterminator='\n')
        myFile.writerow(GetFeatures(with_players))
        myFile.writerows(result)
    data = pd.read_csv("yearBreakdown.csv")
    data = data[GetFeatures(with_players)].dropna(axis=0, how="any")
    return data

def getPDGame(home, away):
    #Get Prediction of Single Game, NO Player Data
    with open("predictYearBreakdownHome.csv","w") as fprh:
        pFile = csv.writer(fprh, lineterminator='\n')
        pFile.writerow(GetFeaturesHome(False))
        pFile.writerows(home)
    
    with open("predictYearBreakdownOpponent.csv","w") as fpro:
        pFile = csv.writer(fpro, lineterminator='\n')
        pFile.writerow(GetFeaturesOpponent(False))
        pFile.writerows(away)
    
    predicted_data_home = pd.read_csv("predictYearBreakdownHome.csv")
    predicted_data_opponent = pd.read_csv("predictYearBreakdownOpponent.csv")
    home_team = predicted_data_home.head(1)
    away_team = predicted_data_opponent.head(1)
    data = pd.concat([home_team, away_team], axis=1)
    data=data[GetFeatures(False)].dropna(axis=0, how='any')
    return data
    
    
def getPDPlayerWithoutDate(home, away):
    #Get Prediction of Single Game, WITH Player Data
    with open("predictYearBreakdownHomeWithPlayerStats.csv","w") as fprh:
        pFile = csv.writer(fprh, lineterminator='\n')
        pFile.writerow(GetFeaturesHome(True))
        pFile.writerows(home)
    
    with open("predictYearBreakdownOpponentWithPlayerStats.csv","w") as fpro:
        pFile = csv.writer(fpro, lineterminator='\n')
        pFile.writerow(GetFeaturesOpponent(True))
        pFile.writerows(away)
    
    predicted_data_home = pd.read_csv("predictYearBreakdownHomeWithPlayerStats.csv")
    predicted_data_opponent = pd.read_csv("predictYearBreakdownOpponentWithPlayerStats.csv")
    home_team = predicted_data_home.head(1)
    away_team = predicted_data_opponent.head(1)
    data = pd.concat([home_team, away_team], axis=1)
    data=data[GetFeatures(True)].dropna(axis=0, how='any')
    return data

def getPDPlayerWithDate(result):
    #Get Prediction of Single Game, WITH Player Data, AND Date
    with open("predictYearBreakdownWithPlayerStatsDate.csv","w") as fp:
        myFile = csv.writer(fp, lineterminator='\n')
        myFile.writerow(GetFeatures(True))
        myFile.writerows(result)
    data = pd.read_csv("predictYearBreakdownWithPlayerStatsDate.csv")
    data = data[GetFeatures(True)].dropna(axis=0, how="any")
    return data

main()