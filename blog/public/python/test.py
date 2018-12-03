

import json
import random

per =random.uniform(57.000000, 61.0000)
pre=random.randint(0,1)
per1 =random.uniform(57.000000, 61.0000)
pre1=random.randint(0,1)
per2 =random.uniform(57.000000, 61.0000)
pre2=random.randint(0,1)
per3 =random.uniform(57.000000, 61.0000)
pre3=random.randint(0,1)

jsonVal = [{'Prediction':pre, 'Percentage': per},{'Prediction':pre1, 'Percentage': per1},{'Prediction':pre2, 'Percentage': per2},
{'Prediction':pre3, 'Percentage': per3},{'Prediction':pre, 'Percentage': per}]
print(json.dumps(jsonVal))