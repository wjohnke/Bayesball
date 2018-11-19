#sklearnBayesball.py Unit Tests

import unittest
import skLearnBayesball as sklearnBayesball


class KnownValues(unittest.TestCase):
	#should return sql query for DB so check if not null
	def test_GetPDArrayPlayerData(self):
		result = 0
		outcome  = sklearnBayesball.GetPDArrayPlayerData()
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null	
	def test_GetPDArrayPlayerDataHome(self):
		result = 0
		outcome  = sklearnBayesball.GetPDArrayPlayerDataHome()
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
	
	#should return sql query for DB so check if not null	
	def test_GetPDArrayPlayerDataOpponent(self):
		result = 0
		outcome  = sklearnBayesball.GetPDArrayPlayerDataOpponent()
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
	
	#should return sql query for DB so check if not null	
	def test_GetPDArrayNoPlayerDataHome(self):
		result = 0
		outcome  = sklearnBayesball.GetPDArrayNoPlayerDataHome()
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
	
	#should return sql query for DB so check if not null	
	def test_GetPDArrayNoPlayerDataOpponent(self):
		result = 0
		outcome  = sklearnBayesball.GetPDArrayNoPlayerDataOpponent()
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null		
	def test_GetPDArrayNoPlayerData(self):
		result = 0
		outcome  = sklearnBayesball.GetPDArrayNoPlayerData()
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null
	def test_GetGameDataHomeTeam(self):
		result = 0
		outcome = sklearnBayesball.GetGameDataHomeTeam('SLN')
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null
	def test_GetGameDataOpponentTeam(self):
		result = 0
		outcome = sklearnBayesball.GetGameDataOpponentTeam('SLN')
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null	
	def test_GetPlayerGameDataWithoutDateHomeTeam(self):
		result = 0
		outcome = sklearnBayesball.GetPlayerGameDataWithoutDateHomeTeam('SLN')
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null	
	def test_GetPlayerGameDataWithoutDateOpponentTeam(self):
		result = 0
		outcome = sklearnBayesball.GetPlayerGameDataWithoutDateOpponentTeam('SLN')
		if outcome is not None:
			result = 1
		expected = 1
		self.assertEqual(expected, result)
		
	#should return sql query for DB so check if not null	
	def test_GetPlayerGameDataWithDate(self):
		result = 0
		outcome = sklearnBayesball.GetPlayerGameDataWithDate('SLN', 'CHN', '2017-04-02')
		if outcome is not None:
			result = 1
		expected = 1
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
		result = sklearnBayesball.runNaiveBayes(None, None, None)
		expected = 0
		self.assertEqual(expected, result)
		
	def test_RunNaiveBayes_features_None(self):
		#Capture the results of the function
		#Check for expected Output
		result = sklearnBayesball.runNaiveBayes(None, None, None)
		expected = 0
		self.assertEqual(expected, result)
        
	def test_runLogisticRegression_data_None(self):
		#Capture the results of the function
		#Check for expected Output
		result = sklearnBayesball.runLogisticRegression(None, None, None)
		expected = 0
		self.assertEqual(expected, result)
        
	def test_runLogisticRegression_features_None(self):
		#Capture the results of the function
		#Check for expected Output
		result = sklearnBayesball.runLogisticRegression(None, None, None)
		expected = 0
		self.assertEqual(expected, result)        
'''		
	def test_randomPredictor_error(self):
		result = sklearnBayesball.randomPredictor()
		expected = 0
		self.assertEqual(expected, result)
	
	def test_randomPredictor(self):
		result = sklearnBayesball.randomPredictor(data)
		expected = 1
		self.assertEqual(expected, result)
	'''	
#Run Tests
if __name__ == '__main__':
    unittest.main()