#!/usr/bin/env python

import csv
import mysql.connector
from mysql.connector import errorcode
import pandas as pd
import numpy as np
import time
from sklearn.model_selection import train_test_split
from sklearn.naive_bayes import GaussianNB
#import matplotlib.pyplot as plt
#Linear Regression
from sklearn.linear_model import LinearRegression
from sklearn.linear_model import LogisticRegression
import random
import sys
import json
import os

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
    
    
    
    '''
    if(len(sys.argv)==3):
        team1=sys.argv[1]
        team2=sys.argv[2]
        predicted_home_game_query = "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP FROM yearBreakdown WHERE home_team='" + team1 +"';"
        predicted_opponent_game_query = "SELECT id as opponent_id, Rdiff as opponent_Rdiff, SRS as opponent_SRS, R_G as opponent_R_G, R as opponent_R, RBI as opponent_RBI, OBP as opponent_OBP, OPSP as opponent_OPSP, RA as opponent_RA, ERA as opponent_ERA, SV as opponent_SV, HA as opponent_HA, ER as opponent_ER, ERAP as opponent_ERAP, WHIP as opponent_WHIP, 0 FROM yearBreakdown WHERE home_team='"+ team2+"';"
       
        m.execute(predicted_home_game_query)
        predicted_home_game_dataset = m.fetchall()
        
        
        m.execute(predicted_opponent_game_query)
        predicted_opponent_game_dataset = m.fetchall()
        fprh = open("predictYearBreakdownHome.csv","w")
        pFile = csv.writer(fprh, lineterminator='\n')
        pFile.writerow(['id','Rdiff','SRS','R_G','R','RBI','OBP','OPSP','RA','ERA','SV','HA','ER','ERAP','WHIP'])
        pFile.writerows(predicted_home_game_dataset)
        fprh.close
        
        fpro = open("predictYearBreakdownOpponent.csv","w")
        pFile = csv.writer(fpro, lineterminator='\n')
        pFile.writerow(['opponent_id','opponent_Rdiff','opponent_SRS','opponent_R_G','opponent_R','opponent_RBI','opponent_OBP','opponent_OPSP','opponent_RA','opponent_ERA','opponent_SV','opponent_HA','opponent_ER','opponent_ERAP','opponent_WHIP', 'Outcome'])
        pFile.writerows(predicted_opponent_game_dataset)
        fpro.close
        
        predicted_data_home = pd.read_csv("predictYearBreakdownHome.csv")
        predicted_data_opponent = pd.read_csv("predictYearBreakdownOpponent.csv")
    
        home_team = predicted_data_home.head(1)
        away_team = predicted_data_opponent.head(1)
        
        #print(home_team)
        #print(away_team)
    
        #print(home_team + away_team)
        game_data = pd.concat([home_team, away_team], axis=1)
        game_data=game_data[["Rdiff",
          "SRS","R_G","R","RBI","OBP","OPSP","RA","ERA","SV","HA","ER","ERAP","WHIP",'opponent_Rdiff', 'opponent_SRS' ,'opponent_R_G' ,'opponent_R' ,'opponent_RBI', 'opponent_OBP' ,'opponent_OPSP' ,'opponent_RA','opponent_ERA' ,'opponent_SV' ,'opponent_HA', 'opponent_ER', 'opponent_ERAP','opponent_WHIP',"Outcome"]].dropna(axis=0, how='any')
    
    
    
    
    yearBreakdown_dataset = "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, Outcome FROM yearBreakdown;"
    m.execute(yearBreakdown_dataset)
    result = m.fetchall()
    
    fp = open("yearBreakdown.csv","w")
    myFile = csv.writer(fp, lineterminator='\n')
    myFile.writerow(['id','Rdiff','SRS','R_G','R','RBI','OBP','OPSP','RA','ERA','SV','HA','ER','ERAP','WHIP', 'opponent_Rdiff', 'opponent_SRS' ,'opponent_R_G' ,'opponent_R' ,'opponent_RBI', 'opponent_OBP' ,'opponent_OPSP' ,'opponent_RA','opponent_ERA' ,'opponent_SV' ,'opponent_HA', 'opponent_ER', 'opponent_ERAP','opponent_WHIP','Outcome'])
    myFile.writerows(result)
    data = pd.read_csv("yearBreakdown.csv")
        
        
    data=data[["Rdiff",
          "SRS","R_G","R","RBI","OBP","OPSP","RA","ERA","SV","HA","ER","ERAP","WHIP",'opponent_Rdiff', 'opponent_SRS' ,'opponent_R_G' ,'opponent_R' ,'opponent_RBI', 'opponent_OBP' ,'opponent_OPSP' ,'opponent_RA','opponent_ERA' ,'opponent_SV' ,'opponent_HA', 'opponent_ER', 'opponent_ERAP','opponent_WHIP', 'Outcome']].dropna(axis=0, how='any')
    
    # Split dataset in training and test datasets
    RunNaiveBayes(data, game_data)
    
    #RunLinearRegression(data)
    
    #RunLogisticRegression(data, game_data)
    
    #RandomPredictor(data)
    ***********************************************
    '''
    #***********************************************
    #Hypothetical Order of Arguments ***************
    #param1 -> file
    #param2 -> Team1:String
    #param3 -> Team2:String   ---------------> Argv>=3 -> Run Prediction for 2 teams
    #param4 -> PlayerDataIncluded:Boolean ---> Argv>=4 -> Run Prediction w/ PLayer Data
    #param5 -> DateInclude ------------------> Argv==5 -> Run Prediction w/ Specific Date
    #***********************************************
    
    game_data=None
    with_players = False
    if(len(sys.argv)>=3):
        #The next chain of logic predicts a single game's outcome
        team1=sys.argv[1]
        team2=sys.argv[2]
        if(len(sys.argv)>=4 and sys.argv[3]=="1"):
            with_players = True
            #Get prediction including player data
            if(len(sys.argv)>=5):
                #Try and get past game by game date, home team vs away team.
                
                game_date = sys.argv[4]
                predicted_date_game_query = GetPlayerGameDataWithDate(team1,team2,game_date)
                m.execute(predicted_date_game_query)
                result = m.fetchall()
                game_data = getPDPlayerWithDate(result)
            else:
                predicted_home_game_query = GetPlayerGameDataWithoutDateHomeTeam(team1)
                predicted_opponent_game_query = GetPlayerGameDataWithoutDateOpponentTeam(team2)
                
                m.execute(predicted_home_game_query)
                predicted_home_game_dataset = m.fetchall()
                m.execute(predicted_opponent_game_query)
                predicted_opponent_game_dataset = m.fetchall()
                
                game_data = getPDPlayerWithoutDate(predicted_home_game_dataset,predicted_opponent_game_dataset)
        else:
            #Just game prediction with no player data
            predicted_home_game_query = GetGameDataHomeTeam(team1)
            predicted_opponent_game_query = GetGameDataOpponentTeam(team2)
            
            m.execute(predicted_home_game_query)
            predicted_home_game_dataset = m.fetchall()
            m.execute(predicted_opponent_game_query)
            predicted_opponent_game_dataset = m.fetchall()
            
            game_data = getPDGame(predicted_home_game_dataset, predicted_opponent_game_dataset)
    
    
    yearBreakdownWithPlayerStats_dataset = "SELECT id,Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP, pos_4_TB,  opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, opponent_pos_1_age, opponent_pos_1_R, opponent_pos_1_H, opponent_pos_1_RBI, opponent_pos_1_BB, opponent_pos_1_OPSP, opponent_pos_1_TB, opponent_pos_2_age, opponent_pos_2_R, opponent_pos_2_H, opponent_pos_2_RBI, opponent_pos_2_BB, opponent_pos_2_OPSP, opponent_pos_2_TB, opponent_pos_3_age, opponent_pos_3_R, opponent_pos_3_H, opponent_pos_3_RBI, opponent_pos_3_BB, opponent_pos_3_OPSP, opponent_pos_3_TB, opponent_pos_4_age, opponent_pos_4_R, opponent_pos_4_H, opponent_pos_4_RBI, opponent_pos_4_BB, opponent_pos_4_OPSP, opponent_pos_4_TB,  Outcome FROM yearBreakdownWithPlayerStats;"
    m.execute(yearBreakdownWithPlayerStats_dataset)
    result = m.fetchall()
    data = getPDModel(result, with_players)
    used_features = GetPDArrayPlayerData() if with_players else GetPDArrayNoPlayerData()
    used_features.remove('id')
    used_features.remove('Outcome')
    
    #Do further feature selection here -> used_features.remove('___')
    #                                  -> del used_features[index]
    #****************************************************************
    #del used_features[13]
    #del used_features[18]
    #del used_features[12]
    #del used_features[19]
    #del used_features[17]
    
    runNaiveBayes(data, game_data, used_features)
    runLogisticRegression(data, game_data, used_features)
    #runLinearRegression(data, game_data, used_features)
    '''vvv Only for testing features
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
    '''
    
    #RandomPredictor(data)
    

def runNaiveBayes(data, game_data, used_features):
    #print("Running Naive Bayes on Dataset<br>")
    final_pred = "0"
    
    #Establish what features are to be used, based off of player inclusion
    #Features either include players or they don't
    #No in between. Base Model to make prediction must have the exact
    #same features as prediction data model
    if data is None:
        return 0
    if used_features is None:
        return 0
		
    if(game_data is not None):    
        X_train = data
        X_test = game_data
        
        gnb1 = GaussianNB()
        
        gnb1.fit(
                X_train[used_features].values,
                X_train["Outcome"]
        )
        y_pred1 = gnb1.predict(X_test[used_features])
    
    X_train, X_test = train_test_split(data, test_size=0.33, random_state=int(time.time()))
    gnb = GaussianNB()
    gnb.fit(
            X_train[used_features].values,
            X_train["Outcome"]
    )
    y_pred = gnb.predict(X_test[used_features])
    
    total_tested = X_test.shape[0]
    total_correct = (X_test["Outcome"] == y_pred).sum()
    percentage_correct = 100*float((float(total_correct)/float(total_tested) ))

    # Print results
    #print("Total Predicted: {}<br>Predicted Correctly: {}<br>Percentage Correct: {:05.2f}%<br>"
    #     .format(
    #          total_tested,
    #          total_correct,
    #          percentage_correct)
    #)
          
    if(game_data is not None):
        #print(y_pred1[0])    
        amount_correct = int(percentage_correct)
        probability_array = [100]    
        for i in range(0,amount_correct):
            probability_array.append(y_pred1[0])
        for i in range(amount_correct+1, 100):
            probability_array.append(not y_pred1[0])
        random.shuffle(probability_array)
        choice = random.randint(0,100)
        final_pred = ("1" if probability_array[choice] else "0")
        #print("Final Prediction: " + final_pred)
    
    jsonVal = {'Prediction':final_pred, 'Percentage': percentage_correct}
    print(json.dumps(jsonVal))
    if(jsonVal is not None):
        return 1
    else :
        return 0
    
    
def runLogisticRegression(data, game_data, used_features):
    #print("Running Logistic Regression on Dataset<br>")
    if data is None:
        return 0
    if used_features is None:
        return 0

    final_pred="0"

    
    if(game_data is not None):    
        X_train = data
        X_test = game_data
        logR1 = LogisticRegression(max_iter=10000, random_state=0, solver='lbfgs',multi_class="multinomial")
        
        logR1.fit(
                X_train[used_features].values,
                X_train["Outcome"]
        )
        y_pred1 = logR1.predict(X_test[used_features])
    
    #Solver = Limited Memory BFGS - optimizes problem of mismatched # of features in Hessian matrix
    logR = LogisticRegression(max_iter=10000, random_state=0, solver='lbfgs',multi_class="multinomial", class_weight='balanced')
    
    #Edit LogisticRegression() to have class weights attached to features
    X_train, X_test = train_test_split(data, test_size=0.33, random_state=int(time.time()))
    
    logR.fit(X_train[used_features].values, X_train["Outcome"])
    #print(logR.coef_[0])
    prediction = logR.predict(X_test[used_features])
    
    total_tested = prediction.size
    total_correct = (X_test["Outcome"] == prediction).sum()
    percentage_correct = 100*float((float(total_correct)/float(total_tested) ))

    # Print resultss
    #print("Total Predicted: {}<br>Predicted Correctly: {}<br>Percentage Correct: {:05.2f}%<br>"
          #.format(
              #total_tested,
              #total_correct,
              #percentage_correct)
    #)
    if(game_data is not None):
        #print(y_pred1[0])    
        amount_correct = int(percentage_correct)
        probability_array = [100]    
        for i in range(0,amount_correct):
            probability_array.append(y_pred1[0])
        for i in range(amount_correct+1, 100):
            probability_array.append(not y_pred1[0])
        random.shuffle(probability_array)
        choice = random.randint(0,99)
        final_pred = ("1" if probability_array[choice] else "0")
        #print("Final Prediction: " + final_pred)
    
    jsonVal = {'Prediction':final_pred, 'Percentage': percentage_correct}
    print(json.dumps(jsonVal))
    #return percentage_correct -> Use for testing features
    if(jsonVal is not None):
        return 1
    else :
        return 0
    
    
def randomPredictor(data):
	if data is not None:
		randomArray = []
		for i in range(data.size):
			randomArray.append(random.randint(0,1))
		
		print(randomArray)
		print("\nNumber correct of random algorithm: {:05.2f}%".format((100*(randomArray == data["Outcome"].values).sum())/randomArray.size) )
		return 1
	else:
		return 0

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
    
def GetGameDataHomeTeam(team1):
    return "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP FROM yearBreakdown WHERE home_team='" + team1 +"';"
def GetGameDataOpponentTeam(team2):
    return "SELECT id as opponent_id, Rdiff as opponent_Rdiff, SRS as opponent_SRS, R_G as opponent_R_G, R as opponent_R, RBI as opponent_RBI, OBP as opponent_OBP, OPSP as opponent_OPSP, RA as opponent_RA, ERA as opponent_ERA, SV as opponent_SV, HA as opponent_HA, ER as opponent_ER, ERAP as opponent_ERAP, WHIP as opponent_WHIP, 0 FROM yearBreakdown WHERE home_team='"+ team2+"';"   
def GetPlayerGameDataWithoutDateHomeTeam(team1):
    return  "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP,  pos_4_TB FROM yearBreakdownWithPlayerStats WHERE home_team='" + team1 +"';"
def GetPlayerGameDataWithoutDateOpponentTeam(team2):
    return "SELECT id as opponent_id, Rdiff as opponent_Rdiff, SRS as opponent_SRS, R_G as opponent_R_G, R as opponent_R, RBI as opponent_RBI, OBP as opponent_OBP, OPSP as opponent_OPSP, RA as opponent_RA, ERA as opponent_ERA, SV as opponent_SV, HA as opponent_HA, ER as opponent_ER, ERAP as opponent_ERAP, WHIP as opponent_WHIP, pos_1_age as opponent_pos_1_age, pos_1_R as opponent_pos_1_R, pos_1_H as opponent_pos_1_H, pos_1_RBI as opponent_pos_1_RBI, pos_1_BB as opponent_pos_1_BB, pos_1_OPSP as opponent_pos_1_OPSP, pos_1_TB as opponent_pos_1_TB, pos_2_age as opponent_pos_2_age, pos_2_R as opponent_pos_2_R, pos_2_H as opponent_pos_2_H, pos_2_RBI as opponent_pos_2_RBI, pos_2_BB as opponent_pos_2_BB, pos_2_OPSP as opponent_pos_2_OPSP, pos_2_TB as opponent_pos_2_TB, pos_3_age as opponent_pos_3_age, pos_3_R as opponent_pos_3_R, pos_3_H as opponent_pos_3_H, pos_3_RBI as opponent_pos_3_RBI, pos_3_BB as opponent_pos_3_BB, pos_3_OPSP as opponent_pos_3_OPSP, pos_3_TB as opponent_pos_3_TB, pos_4_age as opponent_pos_4_age, pos_4_R as opponent_pos_4_R, pos_4_H as opponent_pos_4_H, pos_4_RBI as opponent_pos_4_RBI, pos_4_BB as opponent_pos_4_BB, pos_4_OPSP as opponent_pos_4_OPSP,  pos_4_TB as opponent_pos_4_TB,  0 FROM yearBreakdownWithPlayerStats WHERE home_team='"+ team2+"';"
def GetPlayerGameDataWithDate(team1,team2,game_date):
    return "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP,  pos_4_TB,  opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, opponent_pos_1_age, opponent_pos_1_R, opponent_pos_1_H, opponent_pos_1_RBI, opponent_pos_1_BB, opponent_pos_1_OPSP, opponent_pos_1_TB, opponent_pos_2_age, opponent_pos_2_R, opponent_pos_2_H, opponent_pos_2_RBI, opponent_pos_2_BB, opponent_pos_2_OPSP, opponent_pos_2_TB, opponent_pos_3_age, opponent_pos_3_R, opponent_pos_3_H, opponent_pos_3_RBI, opponent_pos_3_BB, opponent_pos_3_OPSP, opponent_pos_3_TB, opponent_pos_4_age, opponent_pos_4_R, opponent_pos_4_H, opponent_pos_4_RBI, opponent_pos_4_BB, opponent_pos_4_OPSP, opponent_pos_4_TB, 0 FROM yearBreakdownWithPlayerStats WHERE home_team='" + team1 +"' AND opponent_team='" + team2 + "' AND home_game_date LIKE '" + game_date + "';" 

def GetModelData(with_players):
    if(with_players):
        return "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP,  pos_4_TB,  opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, opponent_pos_1_age, opponent_pos_1_R, opponent_pos_1_H, opponent_pos_1_RBI, opponent_pos_1_BB, opponent_pos_1_OPSP, opponent_pos_1_TB, opponent_pos_2_age, opponent_pos_2_R, opponent_pos_2_H, opponent_pos_2_RBI, opponent_pos_2_BB, opponent_pos_2_OPSP, opponent_pos_2_TB, opponent_pos_3_age, opponent_pos_3_R, opponent_pos_3_H, opponent_pos_3_RBI, opponent_pos_3_BB, opponent_pos_3_OPSP, opponent_pos_3_TB, opponent_pos_4_age, opponent_pos_4_R, opponent_pos_4_H, opponent_pos_4_RBI, opponent_pos_4_BB, opponent_pos_4_OPSP, opponent_pos_4_TB, Outcome FROM yearBreakdownWithPlayerStats;"
    else:
        return "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, Outcome FROM yearBreakdown;"

def GetPDArrayPlayerData():
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
    'Outcome'
      ]

def GetPDArrayPlayerDataHome():
    return ['id','Rdiff','SRS','R_G','R','RBI','OBP','OPSP','RA','ERA','SV','HA','ER','ERAP','WHIP', 'pos_1_age', 'pos_1_R', 'pos_1_H', 'pos_1_RBI', 'pos_1_BB', 'pos_1_OPSP', 'pos_1_TB', 'pos_2_age', 'pos_2_R', 'pos_2_H', 'pos_2_RBI', 'pos_2_BB', 'pos_2_OPSP', 'pos_2_TB', 'pos_3_age', 'pos_3_R', 'pos_3_H', 'pos_3_RBI', 'pos_3_BB', 'pos_3_OPSP', 'pos_3_TB', 'pos_4_age', 'pos_4_R', 'pos_4_H', 'pos_4_RBI', 'pos_4_BB', 'pos_4_OPSP', 'pos_4_TB']    

def GetPDArrayPlayerDataOpponent():
    return ['opponent_id','opponent_Rdiff', 'opponent_SRS' ,'opponent_R_G' ,'opponent_R' ,'opponent_RBI', 'opponent_OBP' ,'opponent_OPSP' ,'opponent_RA','opponent_ERA' ,'opponent_SV' ,'opponent_HA', 'opponent_ER', 'opponent_ERAP','opponent_WHIP', 'opponent_pos_1_age', 'opponent_pos_1_R', 'opponent_pos_1_H', 'opponent_pos_1_RBI', 'opponent_pos_1_BB', 'opponent_pos_1_OPSP', 'opponent_pos_1_TB', 'opponent_pos_2_age', 'opponent_pos_2_R', 'opponent_pos_2_H', 'opponent_pos_2_RBI', 'opponent_pos_2_BB', 'opponent_pos_2_OPSP', 'opponent_pos_2_TB', 'opponent_pos_3_age', 'opponent_pos_3_R', 'opponent_pos_3_H', 'opponent_pos_3_RBI', 'opponent_pos_3_BB', 'opponent_pos_3_OPSP', 'opponent_pos_3_TB', 'opponent_pos_4_age', 'opponent_pos_4_R', 'opponent_pos_4_H', 'opponent_pos_4_RBI', 'opponent_pos_4_BB', 'opponent_pos_4_OPSP', 'opponent_pos_4_TB','Outcome']

def GetPDArrayNoPlayerDataHome():
    return ['id','Rdiff','SRS','R_G','R','RBI','OBP','OPSP','RA','ERA','SV','HA','ER','ERAP','WHIP']

def GetPDArrayNoPlayerDataOpponent():
    return ['opponent_id','opponent_Rdiff','opponent_SRS','opponent_R_G','opponent_R','opponent_RBI','opponent_OBP','opponent_OPSP','opponent_RA','opponent_ERA','opponent_SV','opponent_HA','opponent_ER','opponent_ERAP','opponent_WHIP', 'Outcome']

def GetPDArrayNoPlayerData():
    return ["id","Rdiff","SRS","R_G","R","RBI","OBP","OPSP","RA","ERA","SV","HA","ER","ERAP","WHIP",'opponent_Rdiff', 'opponent_SRS' ,'opponent_R_G' ,'opponent_R' ,'opponent_RBI', 'opponent_OBP' ,'opponent_OPSP' ,'opponent_RA','opponent_ERA' ,'opponent_SV' ,'opponent_HA', 'opponent_ER', 'opponent_ERAP','opponent_WHIP',"Outcome"]

def getPDModel(result, with_players):
    #All encompassing pandas dataframe. Called regardless
    with open("yearBreakdown.csv","w") as fp:
        myFile = csv.writer(fp, lineterminator='\n')
        myFile.writerow(GetPDArrayPlayerData() if with_players else GetPDArrayNoPlayerData())
        myFile.writerows(result)
    data = pd.read_csv("yearBreakdown.csv")
    data = data[GetPDArrayPlayerData() if with_players else GetPDArrayNoPlayerData()].dropna(axis=0, how="any")
    return data

def getPDGame(home, away):
    #Get Prediction of Single Game, NO Player Data
    with open("predictYearBreakdownHome.csv","w") as fprh:
        pFile = csv.writer(fprh, lineterminator='\n')
        pFile.writerow(GetPDArrayNoPlayerDataHome())
        pFile.writerows(home)
    
    with open("predictYearBreakdownOpponent.csv","w") as fpro:
        pFile = csv.writer(fpro, lineterminator='\n')
        pFile.writerow(GetPDArrayNoPlayerDataOpponent())
        pFile.writerows(away)
    
    predicted_data_home = pd.read_csv("predictYearBreakdownHome.csv")
    predicted_data_opponent = pd.read_csv("predictYearBreakdownOpponent.csv")
    home_team = predicted_data_home.head(1)
    away_team = predicted_data_opponent.head(1)
    data = pd.concat([home_team, away_team], axis=1)
    data=data[GetPDArrayNoPlayerData()].dropna(axis=0, how='any')
    return data
    
    
def getPDPlayerWithoutDate(home, away):
    #Get Prediction of Single Game, WITH Player Data
    with open("predictYearBreakdownHomeWithPlayerStats.csv","w") as fprh:
        pFile = csv.writer(fprh, lineterminator='\n')
        pFile.writerow(GetPDArrayPlayerDataHome())
        pFile.writerows(home)
    
    with open("predictYearBreakdownOpponentWithPlayerStats.csv","w") as fpro:
        pFile = csv.writer(fpro, lineterminator='\n')
        pFile.writerow(GetPDArrayPlayerDataOpponent())
        pFile.writerows(away)
    
    predicted_data_home = pd.read_csv("predictYearBreakdownHomeWithPlayerStats.csv")
    predicted_data_opponent = pd.read_csv("predictYearBreakdownOpponentWithPlayerStats.csv")
    home_team = predicted_data_home.head(1)
    away_team = predicted_data_opponent.head(1)
    data = pd.concat([home_team, away_team], axis=1)
    data=data[GetPDArrayPlayerData()].dropna(axis=0, how='any')
    return data

def getPDPlayerWithDate(result):
    #Get Prediction of Single Game, WITH Player Data, AND Date
    with open("predictYearBreakdownWithPlayerStatsDate.csv","w") as fp:
        myFile = csv.writer(fp, lineterminator='\n')
        myFile.writerow(GetPDArrayPlayerData())
        myFile.writerows(result)
    data = pd.read_csv("predictYearBreakdownWithPlayerStatsDate.csv")
    data = data[GetPDArrayPlayerData()].dropna(axis=0, how="any")
    return data

main()
