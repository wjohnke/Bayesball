#sklearnBayesball.py Unit Tests

import unittest
import sklearnBayesball

class KnownValues(unittest.TestCase):
	#should return sql query for DB so check if not null
	def test_GetPDArrayPlayerData():
		result  = sklearnBayesball.GetPDArrayPlayerData()
		expected = not None
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null	
	def test_GetPDArrayPlayerDataHome():
		result  = sklearnBayesball.GetPDArrayPlayerDataHome()
		expected = not None
		self.assertEqual(expected, result)
	
	#should return sql query for DB so check if not null	
	def test_GetPDArrayPlayerDataOpponent():
		result  = sklearnBayesball.GetPDArrayPlayerDataOpponent()
		expected = not None
		self.assertEqual(expected, result)
	
	#should return sql query for DB so check if not null	
	def test_GetPDArrayNoPlayerDataHome():
		result  = sklearnBayesball.GetPDArrayNoPlayerDataHome()
		expected = not None
		self.assertEqual(expected, result)
	
	#should return sql query for DB so check if not null	
	def test_GetPDArrayNoPlayerDataOpponent():
		result  = sklearnBayesball.GetPDArrayNoPlayerDataOpponent()
		expected = not None
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null		
	def test_GetPDArrayNoPlayerData():
		result  = sklearnBayesball.GetPDArrayNoPlayerData()
		expected = not None
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null
	def test_GetGameDataHomeTeam(self):
		result = sklearnBayesball.GetGameDataHomeTeam('SLN')
		expected = not None
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null
	def test_GetGameDataOpponentTeam(self):
		result = sklearnBayesball.GetGameDataOpponentTeam('SLN')
		expected = not None
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null	
	def test_GetPlayerGameDataWithoutDateHomeTeam(self):
		result = sklearnBayesball.GetPlayerGameDataWithoutDateHomeTeam('SLN')
		expected = not None
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null	
	def test_GetPlayerGameDataWithoutDateOpponentTeam(self):
		result = sklearnBayesball.GetPlayerGameDataWithoutDateOpponentTeam('SLN')
		expected = not None
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null	
	def test_GetPlayerGameDataWithDate(self):
		result = sklearnBayesball.GetPlayerGameDataWithDate('SLN', 'CHN', '2017-04-02')
		expected = not None
		self.assertEqual(expected, result)
		
	#should return sql query for DB for true	
	def test_GetModelData_true(self):
		result = sklearnBayesball.GetModelData(True)
		expected = "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, pos_1_age, pos_1_R, pos_1_H, pos_1_RBI, pos_1_BB, pos_1_OPSP, pos_1_TB, pos_2_age, pos_2_R, pos_2_H, pos_2_RBI, pos_2_BB, pos_2_OPSP, pos_2_TB, pos_3_age, pos_3_R, pos_3_H, pos_3_RBI, pos_3_BB, pos_3_OPSP, pos_3_TB, pos_4_age, pos_4_R, pos_4_H, pos_4_RBI, pos_4_BB, pos_4_OPSP,  pos_4_TB,  opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, opponent_pos_1_age, opponent_pos_1_R, opponent_pos_1_H, opponent_pos_1_RBI, opponent_pos_1_BB, opponent_pos_1_OPSP, opponent_pos_1_TB, opponent_pos_2_age, opponent_pos_2_R, opponent_pos_2_H, opponent_pos_2_RBI, opponent_pos_2_BB, opponent_pos_2_OPSP, opponent_pos_2_TB, opponent_pos_3_age, opponent_pos_3_R, opponent_pos_3_H, opponent_pos_3_RBI, opponent_pos_3_BB, opponent_pos_3_OPSP, opponent_pos_3_TB, opponent_pos_4_age, opponent_pos_4_R, opponent_pos_4_H, opponent_pos_4_RBI, opponent_pos_4_BB, opponent_pos_4_OPSP, opponent_pos_4_TB, Outcome FROM yearBreakdownWithPlayerStats;"
		self.assertEqual(expected, result)
	
	#should return sql query for DB for false
	def test_GetModelData_false(self):
		result = sklearnBayesball.GetModelData(False)
		expected = "SELECT id, Rdiff, SRS, R_G, R, RBI, OBP, OPSP, RA, ERA, SV, HA, ER, ERAP, WHIP, opponent_Rdiff, opponent_SRS ,opponent_R_G ,opponent_R ,opponent_RBI, opponent_OBP ,opponent_OPSP ,opponent_RA,opponent_ERA ,opponent_SV ,opponent_HA, opponent_ER, opponent_ERAP,opponent_WHIP, Outcome FROM yearBreakdown;"
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null
	def test_RunNaiveBayes_data_None(self):
		#Capture the results of the function
		#Check for expected Output
		result = sklearnBayesball.RunNaiveBayes()
		expected = 0
		self.assertEqual(expected, result)
		
	def test_RunNaiveBayes_features_None(self):
		#Capture the results of the function
		#Check for expected Output
		result = sklearnBayesball.RunNaiveBayes()
		expected = 0
		self.assertEqual(expected, result)
		
	def test_randomPredictor_error(self):
		result = sklearnBayesball.randomPredictor()
		expected = 0
		self.assertEqual(expected, result)
	
	def test_randomPredictor(self):
		result = sklearnBayesball.randomPredictor(data)
		expected = 1
		self.assertEqual(expected, result)
		
#Run Tests
	if _name_ == '_main_':
		unittest.main()